@foreach (['success', 'error'] as $type)
    @if (session($type))
        <div class="alert alert-{{ $type === 'error' ? 'danger' : 'success' }}" role="alert">{{ session($type) }}</div>
    @endif
@endforeach
