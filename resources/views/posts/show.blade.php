@extends('layouts.app')

@section('title', $post['title'] . ' - Mon Blog')
//content
@section('content')
    <article style="border: 1px solid #ddd; padding: 1rem; margin: 1rem 0;">
        <h1 style="color: green" >{{ $post['title'] }}</h1>
        <p class="meta">
            Par <strong>{{ $post['author'] }}</strong>
            le <time>{{ $post['date'] }}</time>
        </p>
        <div class="content">
            {!! $post['content'] !!}
        </div>

     @php
    $comments = [
        ['author' => 'Eva', 'date' => '2025-01-15 10:30', 'text' => 'Excellent article ! Cela m\'a vraiment aidée à comprendre ce concept.'],
        ['author' => 'Owen', 'date' => '2025-01-15 14:20', 'text' => 'Bien expliqué. J\'aurais ajouté un exemple avec les performances.'],
        ['author' => 'Myra Rosto', 'date' => '2025-01-16 09:15', 'text' => 'Super partage de connaissances !'],
    ];
@endphp

@include('partials.comments', ['comments' => $comments])

    </article>
    <nav>
        <a href="{{ route('home') }}" style="color: green">← Retour aux articles</a>
    </nav>

@endsection
