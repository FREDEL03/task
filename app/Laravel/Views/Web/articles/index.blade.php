@extends('Web.layout')

@section('title', 'Articles')

@section('content')
    <div class="mb-4">
        <h1 class="display-6 fw-bold">Articles</h1>
        <p class="text-muted mb-0">{{ count($articles) }} articles, newest first.</p>
    </div>
    <div class="row g-4">
        @foreach ($articles as $slug => $article)
            @include('Web.partials.article-card')
        @endforeach
    </div>
@endsection
