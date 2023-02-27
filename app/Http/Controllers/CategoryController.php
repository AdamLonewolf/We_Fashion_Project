<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::paginate(15);
        return view('admin.category_dashboard', compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Redirige sur le formulaire de création de la catégorie
        return view('admin.new_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Créer une nouvelle catégorie
        
        $request->validate([
            'name' =>'required|max:100'
        ]);     

        $category = Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard_category'); //Il me redirige sur le dashboard quand c'est terminé.
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.modify_category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //On récupère l'id de la catégorie via la requête envoyée par le formulaire
        $category= Category::find($request->id);

        //On met à jour les catégories
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //On cherche à récupérer l'id de la catégorie

        $category = Category::find($request->id); 

        //On supprime la catégorie

        $category->delete();

        return redirect()->route('dashboard_category');
    }
}
