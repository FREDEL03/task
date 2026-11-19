@extends('Web.layout')

@section('title', 'Articles')

@section('content')
    <div class="mb-4">
        <h1 class="display-6 fw-bold">Articles</h1>
        <p class="text-muted mb-0">{{ count($articles) }} articles, newest first.</p>
    </div>

    <div class="row g-4">
        @foreach ($articles as $slug => $article)
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('web.articles.show', $slug) }}" class="card article-card h-100 text-decoration-none text-body">
                    <div class="cover cover--{{ (crc32($slug) % 4) + 1 }}" data-initial="{{ substr($article['title'], 0, 1) }}" aria-hidden="true">
                        <span class="tag">{{ $article['category'] }}</span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h2 class="h5">{{ $article['title'] }}</h2>
                        <p class="text-muted mb-3">{{ $article['excerpt'] }}</p>
                        <p class="small text-muted mt-auto mb-0">{{ $article['author'] }} &middot; {{ $article['read'] }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
