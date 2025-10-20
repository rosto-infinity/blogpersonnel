@extends('layouts.app')

@section('title', $post['title'] . ' - Mon Blog')

@section('content')
    <article>
        <h1>{{ $post['title'] }}</h1>
        <p class="meta">
            Par <strong>{{ $post['author'] }}</strong>
            le <time>{{ $post['date'] }}</time>
        </p>
        <div class="content">
            {!! $post['content'] !!}
        </div>
    </article>

    <nav>
        <a href="{{ route('home') }}">← Retour aux articles</a>
    </nav>
@endsection
