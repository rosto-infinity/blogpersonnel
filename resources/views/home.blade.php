@extends('layouts.app')

@section('title', 'Accueil - Mon Blog')

@section('content')
    <h1>Bienvenue sur mon blog !</h1>
    <p>Découvrez les derniers articles de nos contributeurs.</p>

    <section>
        <h2>Articles Récents</h2>

        @forelse ($posts as $post)
            <article style="border: 1px solid #ddd; padding: 1rem; margin: 1rem 0;">
                <h3>{{ $post['title'] }}</h3>
                <p class="meta">Par {{ $post['author'] }} - {{ $post['date'] }}</p>
                <p>{{ $post['excerpt'] }}</p>
                <a href="{{ route('posts.show', ['slug' => $post['slug']]) }}">Lire la suite →</a>
            </article>
        @empty
            <p>Aucun article pour le moment. Revenez bientôt !</p>
        @endforelse
    </section>
@endsection
