<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
     // méthode ne retournant que les produit visible sur l'interface admin
     private function visibleProduct(){
        return Product::where('is_visible',1);
    }

    public function all(){
        //retourne tous les produits
        $products = $this->visibleProduct()->paginate(6);
        return view('home',compact(['products']));
    }

    public function state(){
        //retourne tous les produits en solde
        $products = $this->visibleProduct()->where('state',1)->paginate(6);
        return view('home',compact(['products']));
    }

    public function sortByCategorie($id){
        //trie les produit par categorie
        $products = $this->visibleProduct()->where('categories_id',$id)->paginate(6);
        return view('home',compact(['products']));
    }

    public function show($id){
        //affiche un produit
        $product = Product::find($id);
        return view('product',compact('product'));
    }
}
