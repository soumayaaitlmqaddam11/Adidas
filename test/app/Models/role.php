<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    }

