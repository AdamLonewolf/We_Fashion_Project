<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class HomeProductController extends Controller
{
     // méthode ne retournant que les produit visible sur l'interface client
     private function visibleProduct(){
        return Product::where('is_visible',1);
    }

    public function customer(){
        //Cette fonction va retourner tous les produits de la table
        $products = $this->visibleProduct()->paginate(6);
        return view('home',compact(['products']));
    }

    public function state(){
        //Cette fonction va retourner tous les produits de la table qui sont en solde
        $products = $this->visibleProduct()->where('state',1)->paginate(6);
        return view('home',compact(['products']));
    }

    public function categorySort($id){
         //Cette fonction va trier tous les produits de la table qui en fonction de la catégorie
        $products = $this->visibleProduct()->where('categories_id',$id)->paginate(6);
        return view('home',compact(['products']));
    }

    public function show($id){
        //Affiche un produit
        $product = Product::find($id);
        return view('product',compact('product'));
    }
}
