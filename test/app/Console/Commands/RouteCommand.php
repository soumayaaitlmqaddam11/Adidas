<?php

namespace App\Console\Commands;

use App\Models\permission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
class RouteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:route-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(){$routes = Route::getRoutes();// dd($routes);
        foreach ($routes as $route) {$uri = $route->uri();// dump($uri);
  
              if (strstr($uri, '_')) continue;
              if (strstr($uri, 'api')) continue;
              if (strstr($uri, 'csrf')) continue;
  
              $route = new permission();
              $route->name_permission = $uri;
              $route->save();
          }
      }
  
}
