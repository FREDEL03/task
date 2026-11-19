@extends('Web.layout')

@section('content')
    <section class="text-center py-5 mb-4">
        <h1 class="display-5 fw-bold">Read, write and share articles</h1>
        <p class="lead text-muted">A simple place for ideas worth reading.</p>
        <a href="{{ route('web.articles.index') }}" class="btn btn-primary btn-lg">Browse articles</a>
    </section>

    <h2 class="h4 mb-3">Latest articles</h2>
    <div class="row g-4">
        @foreach ($articles as $slug => $article)
            @include('Web.partials.article-card')
        @endforeach
    </div>
@endsection
