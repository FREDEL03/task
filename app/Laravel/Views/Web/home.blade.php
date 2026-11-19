@extends('Web.layout')

@section('content')
    {{-- Hero: intro text + featured article --}}
    <section class="row align-items-center g-4 g-lg-5 pb-5 mb-4">
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold mb-3">Short reads from people who know their subject.</h1>
            <p class="reading lead mb-4">Browse the latest articles, or create an account to start writing your own.</p>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('web.articles.index') }}" class="btn btn-primary btn-lg">Browse articles</a>
                @guest('portal')
                    <a href="{{ route('portal.auth.register') }}" class="btn btn-outline-secondary btn-lg">Create an account</a>
                @endguest
            </div>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('web.articles.show', $featured_slug) }}" class="card article-card text-decoration-none text-body">
                <div class="cover cover--lg cover--{{ (crc32($featured_slug) % 4) + 1 }}" data-initial="{{ substr($featured['title'], 0, 1) }}" aria-hidden="true">
                    <span class="tag">{{ $featured['category'] }}</span>
                </div>
                <div class="card-body">
                    <h2 class="h4">{{ $featured['title'] }}</h2>
                    <p class="text-muted mb-0">{{ $featured['excerpt'] }}</p>
                </div>
            </a>
        </div>
    </section>

    {{-- Latest articles --}}
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h2 class="h3 mb-0">Latest articles</h2>
        <a href="{{ route('web.articles.index') }}">View all</a>
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
