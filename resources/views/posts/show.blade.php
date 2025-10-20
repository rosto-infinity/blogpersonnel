@extends('layouts.app')

@section('title', $post['title'] . ' - Mon Blog')

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

     
    </article>
    <nav>
        <a href="{{ route('home') }}" style="color: green">← Retour aux articles</a>
    </nav>

@endsection
