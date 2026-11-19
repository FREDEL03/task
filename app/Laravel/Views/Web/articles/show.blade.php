@extends('Web.layout')

@section('title', $article['title'])

@section('content')
    <article class="mx-auto" style="max-width: 720px">
        <a href="{{ route('web.articles.index') }}" class="small">&larr; All articles</a>
        <h1 class="mt-2">{{ $article['title'] }}</h1>
        <p class="text-muted">{{ $article['author'] }} &middot; {{ $article['date'] }}</p>
        <p class="lead">{{ $article['excerpt'] }}</p>
        <p>{{ $article['body'] }}</p>
    </article>
@endsection
