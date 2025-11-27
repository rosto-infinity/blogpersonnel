<!-- resources/views/products/show.blade.php -->
@extends('layouts.app-product')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">{{ $category->name }}</h1>
        
        

        <a href="{{ route('categories.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-md">
            Retour à la liste
        </a>
    </div>
@endsection
