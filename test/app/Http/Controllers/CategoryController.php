<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function liste_category(){
        return view('category.category');
    } 
    
    public function ajouter_category(){
        return view('category.ajouter');
    }
    
    public function ajouter_category_traitement(Request $request){
         $request->validate([
            'name'=>'required',
         ]);
         $category = new Category();
         $category->name = $request->name;
         $category->save();
       return redirect('/ajouter')->with('status','category a bien été ajouté avec succés');
    }
}
