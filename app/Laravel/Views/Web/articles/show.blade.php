@extends('Web.layout')

@section('title', $article['title'])

@section('content')
    <article class="mx-auto" style="max-width: 760px">
        <a href="{{ route('web.articles.index') }}" class="text-decoration-none">&larr; All articles</a>

        <h1 class="display-5 fw-bold mt-3 mb-3">{{ $article['title'] }}</h1>
        <div class="d-flex align-items-center gap-3 mb-4">
            <span class="avatar">{{ substr($article['author'], 0, 1) }}</span>
            <div class="lh-sm">
                <div class="fw-semibold">{{ $article['author'] }}</div>
                <div class="small text-muted">{{ $article['date'] }} &middot; {{ $article['read'] }}</div>
            </div>
        </div>

        <p class="reading lead">{{ $article['excerpt'] }}</p>
        @foreach ($article['body'] as $paragraph)
            <p class="reading">{{ $paragraph }}</p>
        @endforeach
    </article>
@endsection
