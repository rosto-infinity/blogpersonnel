<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Affiche une liste des produits.
     */
    public function index(): View
    {
        // $products = Product::latest()->paginate(5);
        // return view('products.index-product', compact('products'));

        $products = Product::with('category')->latest()->paginate(5);
        return view('products.index-product', compact('products'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau produit.
     */
    public function create(): View
    {
        // return view('products.create-product');
        $categories = Category::all(); // Récupère toutes les catégories pour le formulaire
        return view('products.create-product', compact('categories'));
    }

    /**
     * Stocke un nouveau produit dans la base de données.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Produit créé avec succès.');
    }

    /**
     * Affiche les détails d'un produit spécifique.
     */
    public function show(Product $product): View
    {
        return view('products.show-product', compact('product'));
    }

    /**
     * Affiche le formulaire d'édition d'un produit.
     */
    public function edit(Product $product): View
    {
        return view('products.edit-product', compact('product'));
    }

    /**
     * Met à jour un produit existant dans la base de données.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Supprime un produit de la base de données.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Produit supprimé avec succès.');
    }
}
