<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
     /**
     * Affiche une liste des produits.
     */
    public function index(): View
    {
        $categories = Category::latest()->paginate(5);
        return view('categories.index-category', compact('categories'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau produit.
     */
    public function create(): View
    {
        return view('categories.create-category');
    }

    /**
     * Stocke un nouveau produit dans la base de données.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'category créé avec succès.');
    }

    /**
     * Affiche les détails d'un produit spécifique.
     */
    public function show(Category $category): View
    {
        return view('categories.show-category', compact('category'));
    }

    /**
     * Affiche le formulaire d'édition d'un produit.
     */
    public function edit(Category $category): View
    {
        return view('categories.edit-category', compact('category'));
    }

    /**
     * Met à jour un produit existant dans la base de données.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'category mis à jour avec succès.');
    }

    /**
     * Supprime un produit de la base de données.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'category supprimé avec succès.');
    }
}
