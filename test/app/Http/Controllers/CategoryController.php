<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function liste_category(){
        $categorys = Category::paginate(4);
        return view('category.category', compact('categorys'));
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
       return redirect('/category')->with('status','category a bien été ajouté avec succés');
    }
    public function update_category($id){
        $category = Category::find($id);

        return view('category.update',compact('category'));
    }
    public function update_category_traitement(Request $request){
        $request->validate([
            'name'=>'required',
         ]);
         $category = Category::find($request->id);
         $category->name = $request->name;
         $category->update();
         return redirect('/category')->with('status','category a bien été modifié avec succés');

    }
    public function delete_category($id){
         $category = Category::find($id);
         $category->delete();
         return redirect('/category')->with('status','category a bien été supprimé avec succés');

    }
}
