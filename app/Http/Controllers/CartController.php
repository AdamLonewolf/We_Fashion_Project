<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{

    /**
     * Cette fonction nous redige sur la vue du panier
     */

     public function cart(){
        return view('cart');
     }

    /**
     * Fonction pour ajouter des produits au panier
     */
     public function addToCart(Request $request){


      //Critères de validation du formulaire

      $request->validate([
         'quantity' =>'required|numeric'
     ]);     

      //On recherche d'abord l'identifiant du produit que le client cherche à ajouter

      $productId = $request->id;
      $product = Product::findOrFail($productId);  //Si le produit n'est pas trouvé alors, on renvoie un message d'erreur

     
      $cart = session()->get('cart' . auth()->id());
      //On récupère et on met à jour le contenu du panier stocké dans la session de l'utilisateur connecté

      // Si le panier est vide, on initialise un tableau vide.
            if (!$cart) {
               $cart = [];
         }




            // On ajoute le produit au panier.
            if (isset($cart[$product->id])) {
               $cart[$product->id]['quantity'] += $request->quantity;
         } else {
               $cart[$product->id] = [
                  'id' =>$product->id,
                  'picture' => $product->picture,
                  'name' => $product->name,
                  'price' => $product->price,
                  'quantity' => $request->quantity,
               ];
      }

     
   

      session()->put('cart' . auth()->id(), $cart); //On met à jour le panier dans la session pour que l'utilisateur puisse voir les modifications apportées


      
      return redirect()->route('cart');

     }

     /**
     * Fonction pour afficher des produits au panier
     */

     public function ShowCart(){

         //On récupère les données du panier, ainsi que de l'ID de l'utilisateur afin de distinguer chaque panier

      $cart = session()->get('cart' . auth()->id());
 


      //Fonction pour calculer le total de tous les éléments du panier

     $total = 0; //Le total est à zéro par défaut

     foreach($cart as $product){
      $total += ($product['price'] * $product['quantity']); //On fait un boucle for each pour recuperer le prix et la quantité de chaque produit, puis on les multiplie.
     }
    
      return view('cart', compact('cart','total'));
     }


     public function deleteCart(Request $request){
      
      

      $cart = session()->get('cart' . auth()->id());

  
         //Si le id du produit existe dans le tableau cart, on le retire et on remet à jour les données du panier.

         if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart' . auth()->id(), $cart);
        }

        return redirect()->route('cart');
     }
}
