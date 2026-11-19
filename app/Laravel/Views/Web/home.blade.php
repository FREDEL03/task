@extends('Web.layout')

@section('content')
    @php($featuredSlug = array_key_first($articles))
    @php($featured = $articles[$featuredSlug])

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
            <a href="{{ route('web.articles.show', $featuredSlug) }}" class="card article-card text-decoration-none text-body">
                @include('Web.partials.cover', ['slug' => $featuredSlug, 'article' => $featured, 'size' => 'lg'])
                <div class="card-body">
                    <h2 class="h4">{{ $featured['title'] }}</h2>
                    <p class="text-muted mb-0">{{ $featured['excerpt'] }}</p>
                </div>
            </a>
        </div>
    </section>

    <div class="d-flex justify-content-between align-items-end mb-3">
        <h2 class="h3 mb-0">Latest articles</h2>
        <a href="{{ route('web.articles.index') }}">View all</a>
    </div>
    <div class="row g-4">
        @foreach (array_slice($articles, 1, null, true) as $slug => $article)
            @include('Web.partials.article-card')
        @endforeach
    </div>
@endsection
