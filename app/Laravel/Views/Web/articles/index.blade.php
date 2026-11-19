@extends('Web.layout')

@section('title', 'Articles')

@section('content')
    <h1 class="mb-4">Articles</h1>
    <div class="row g-4">
        @foreach ($articles as $slug => $article)
            @include('Web.partials.article-card')
        @endforeach
    </div>
@endsection
