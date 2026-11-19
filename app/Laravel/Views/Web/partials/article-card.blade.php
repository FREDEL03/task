{{-- params: slug, article --}}
<div class="col-md-6 col-lg-4">
    <a href="{{ route('web.articles.show', $slug) }}" class="card article-card h-100 text-decoration-none text-body">
        @include('Web.partials.cover')
        <div class="card-body d-flex flex-column">
            <h2 class="h5">{{ $article['title'] }}</h2>
            <p class="text-muted mb-3">{{ $article['excerpt'] }}</p>
            <p class="small text-muted mt-auto mb-0">{{ $article['author'] }} &middot; {{ $article['read'] }}</p>
        </div>
    </a>
</div>
