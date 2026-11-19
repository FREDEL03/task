{{-- params: slug, article --}}
<div class="col-md-6 col-lg-4">
    <div class="card h-100">
        <div class="card-body d-flex flex-column">
            <h2 class="h5">{{ $article['title'] }}</h2>
            <p class="text-muted small mb-2">{{ $article['author'] }} &middot; {{ $article['date'] }}</p>
            <p>{{ $article['excerpt'] }}</p>
            <a href="{{ route('web.articles.show', $slug) }}" class="btn btn-outline-primary btn-sm mt-auto align-self-start">Read more</a>
        </div>
    </div>
</div>
