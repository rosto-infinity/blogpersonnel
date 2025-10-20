@extends('layouts.app')

@section('title', 'Contact - Mon Blog')

@section('content')
    <h1>Contactez-nous</h1>

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="message">Message :</label>
            <textarea name="message" id="message" rows="5" required></textarea>
            @error('message')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Envoyer</button>
    </form>
@endsection
