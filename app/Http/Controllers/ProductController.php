<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Retourne tous les produits de la table Products
        $products = Product::paginate(15);
        return view('admin.dashboard',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        //Va nous renvoyer sur la vue de création du formulaire
        $sizes = Size::all();
        $category = Category::all();
        return view('admin.new_product',compact('sizes','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Cette fonction va nous permettre de créer un produit et de l'enregistrer dans la bdd

        //Enregistrement de l'image du produit

        $fichierLP = $request->file('picture');
        $fileNameLP = "" ;
        if ($request->hasfile('picture')) {
            $extensionLP = $fichierLP->getClientOriginalName();
            $fileNameLP = 'image/products/' . time() . '_' . $extensionLP;
            $fichierLP->move(public_path('image/products/'), $fileNameLP);
        }

        //Création du produit 

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_visible' => $request->is_visible,
            'state' => $request->state,
            'reference' => $request->reference,
            'categories_id' => $request->categories_id,
            'picture' => $fileNameLP,
        ]);
    

        //On va ensuite lier le produit à ses(sa) taille(s)

        foreach ($request->size as $sizeId) {
            $product->ProductSizes()->attach($sizeId);
        }


        return redirect()->route('dashboard'); //Il me redirige sur dashboard quand c'est terminé.
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Va permettre d'éditer le produit sélectionné et retourne le formulaire de modification du produit
        $editProduct = Product::findOrFail($id);
        $size = Size::all();
        $category = Category::all();
        return view('admin.modify_product',compact('editProduct','category','size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //Cette fonction va mettre à jour le produit

        $product = Product::find($request->id);
        //Cette méthode enregistrer l'image du produit

        $fichierLP = $request->file('picture');
        $fileNameLP = $product->picture ;
        if ($request->hasfile('picture')) {
            $extensionLP = $fichierLP->getClientOriginalName();
            $fileNameLP = 'image/products/' . time() . '_' . $extensionLP;
            $fichierLP->move(public_path('image/products/'), $fileNameLP);
        }

        //On récupère la valeur des champs de notre formulaire et on les stocke dans les différents champs de notre produit

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'isVisible' => $request->is_visible,
            'state' => $request->state,
            'reference' => $request->reference,
            'categories_id' => $request->categories_id,
            'picture' => $fileNameLP,
        ]);

        //Vu qu'on peut modifier les tailles, on va mettre à jour la relation entre les tailles et les produits

        foreach (Size::all() as $size) {
            if(in_array($size->id, $request->size)){
                $product->ProductSizes()->attach($size->id);
            }else{
                $product->ProductSizes()->detach($size->id);
            }
    
        }

        return redirect()->route('dashboard'); //Il me redirige sur dashboard quand c'est terminé.


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
        //On cherche à récupérer l'id du produit qui sera soumis par formulaire

        $product = Product::findOrFail($request->id);

        //On va détacher la liaison entre ce produit et ses tailles pour ne pas qu'il y'ait de liaison fantôme dans la table pivot

        $product->ProductSizes()->detach();

        //On va supprimer chaque produit quand on clique sur le bouton "Supprimer"

        $product->delete();

        return redirect()->route('dashboard');
    }
}
