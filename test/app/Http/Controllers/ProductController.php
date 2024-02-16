<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function liste_product(){
    
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'categories.name as category_name')
        ->paginate(5);
    
    return view('products.product', compact('products'));
    
    } 

    public function afficher() {

        $product = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'categories.name as category_name')
        ->get();
        return view('test', compact('product'));
    }
    
    public function ajouter_product(){
        $categories=Category::all();
        return view('products.ajouter',compact('categories'));
    }
    
    public function ajouter_product_traitement(Request $request){
         $request->validate([
            'description'=>'required',
            'prix'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg,gif,svg',
            'tags'=>'required',
            'category_id'=>'required',

         ]);
        // dd($request);
         $uploadDir='images/';
        $uploadfileName=uniqid() . '.' .$request->file('image')->getClientOriginalExtension();
        // dd($image); 
        $request->file('image')->move($uploadDir, $uploadfileName);
         $product = new Product();
         $product->description = $request->description;
         $product->prix = $request->prix;
         $product->image  = $uploadfileName;
         $product->tags = $request->tags;
         $product->category_id = $request->category_id;
         $product->save();
       return redirect('/ajouterproduit')->with('status','product a bien été ajouté avec succés');
    }
    public function update_product($id){
        $product = Product::find($id);
        $categories=Category::all();
        return view('products.update',compact('product','categories'));
    }
    public function update_product_traitement(Request $request){
        $request->validate([
            'description'=>'required',
            'prix'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg,gif,svg',
            'tags'=>'required',
            'category_id'=>'required',
    
         ]);
    
        $uploadDir = 'images/';
        $uploadfileName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move($uploadDir, $uploadfileName);
    
        $product = Product::find($request->id);
        $product->description = $request->description;
         $product->prix = $request->prix;
         $product->image  = $uploadfileName;
         $product->tags = $request->tags;
         $product->category_id = $request->category_id;
        $product->update();
    
        return redirect('/product')->with('status','product a bien été modifié avec succés');
    }
    
    public function delete_product($id){
         $product = Product::find($id);
         $product->delete();
         return redirect('/product')->with('status','product a bien été supprimé avec succés');

    }
}
