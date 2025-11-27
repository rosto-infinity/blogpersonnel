<!-- resources/views/products/show.blade.php -->
@extends('layouts.app-product')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
        
        <div class="mb-4">
            <strong class="block text-gray-700">Description :</strong>
            <p class="text-gray-800">{{ $product->description }}</p>
        </div>

        <div class="mb-4">
            <strong class="block text-gray-700">Prix :</strong>
            <p class="text-gray-800">{{ $product->price }} CFA</p>
        </div>

        <div class="mb-6">
            <strong class="block text-gray-700">Quantité :</strong>
            <p class="text-gray-800">{{ $product->quantity }}</p>
        </div>

        <a href="{{ route('products.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-md">
            Retour à la liste
        </a>
    </div>
@endsection
