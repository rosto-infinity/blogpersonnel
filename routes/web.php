<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::resource('categories', CategoryController::class);

// Route pour afficher la liste de tous les produits (READ - Index)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route pour afficher le formulaire de création de produit (CREATE - Form)
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route pour stocker un nouveau produit (CREATE - Store)
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route pour afficher un produit spécifique (READ - Show)
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Route pour afficher le formulaire d'édition d'un produit (UPDATE - Form)
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Route pour mettre à jour un produit spécifique (UPDATE - Update)
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Route pour supprimer un produit spécifique (DELETE - Destroy)
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');





















// Créer des données de test avec nos contributeurs
$posts = [
    [
        'slug' => 'architecture-laravel-moderne',
        'title' => 'Architecture Laravel Moderne',
        'author' => 'Eva',
        'date' => '2025-01-15',
        'excerpt' => 'Découvrez les meilleurs patterns d\'architecture pour vos applications Laravel.',
        'content' => '<p>Eva partage ses meilleures pratiques pour structurer une application Laravel scalable et maintenable.</p>'
    ],
    [
        'slug' => 'optimisation-performance-frontend',
        'title' => 'Optimisation Performance Frontend',
        'author' => 'Owen',
        'date' => '2025-01-20',
        'excerpt' => 'Comment obtenir d\'excellentes performances frontend avec Laravel et Blade.',
        'content' => '<p>Owen nous explique comment optimiser le chargement des pages et améliorer l\'expérience utilisateur.</p>'
    ],
    [
        'slug' => 'guide-complet-eloquent-orm',
        'title' => 'Guide Complet Eloquent ORM',
        'author' => 'Myra Rosto',
        'date' => '2025-01-25',
        'excerpt' => 'Maîtrisez Eloquent ORM de A à Z avec des exemples pratiques.',
        'content' => '<p>Myra Rosto nous guide à travers les concepts avancés d\'Eloquent ORM et les meilleures pratiques.</p>'
    ],
    [
        'slug' => 'securite-laravel-bonnes-pratiques',
        'title' => 'Sécurité Laravel : Bonnes Pratiques',
        'author' => 'Diane',
        'date' => '2025-02-01',
        'excerpt' => 'Protégez votre application contre les vulnérabilités les plus courantes.',
        'content' => '<p>Diane explique comment implémenter une sécurité robuste dans Laravel : CSRF, XSS, injection SQL, etc.</p>'
    ],
    [
        'slug' => 'deploiement-laravel-production',
        'title' => 'Déploiement Laravel en Production',
        'author' => 'Sohan',
        'date' => '2025-02-05',
        'excerpt' => 'Guide complet pour déployer votre application Laravel sur un serveur de production.',
        'content' => '<p>Sohan nous montre comment configurer correctement un serveur, gérer les variables d\'environnement et déployer automatiquement.</p>'
    ]
];

// Routes spécifiques EN PREMIER
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function () {
    return redirect()->route('home')->with('success', 'Message envoyé !');
})->name('contact.store');

Route::get('/a-propos', function () {
    return view('about');
})->name('about');

// Routes paramétrées
Route::get('/posts/{slug}', function ($slug) use ($posts) {
    $post = collect($posts)->firstWhere('slug', $slug);

    if (!$post) {
        abort(404, 'Article non trouvé');
    }

    return view('posts.show', ['post' => $post]);
})->name('posts.show');

// Un seul paramètre
Route::get('/users/{user_id}/articles/{articles_id}', function ($user_id, $articles_id=null) {
    return "Article numéro : $articles_id de l'utilisateur $user_id";
});
Route::get('/hello', function(){
    return 'Hello World !';
});
// Route générique EN DERNIER
Route::get('/', function () use ($posts) {
    return view('home', ['posts' => $posts]);
})->name('home');

