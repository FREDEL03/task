{{-- params: slug, article, size (optional: 'lg') --}}
<div class="cover cover--{{ (crc32($slug) % 4) + 1 }} {{ isset($size) ? "cover--$size" : '' }}" data-initial="{{ substr($article['title'], 0, 1) }}" aria-hidden="true">
    <span class="tag">{{ $article['category'] }}</span>
</div>
