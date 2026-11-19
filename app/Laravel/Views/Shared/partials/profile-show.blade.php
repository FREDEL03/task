{{-- params: user, editUrl (optional), backUrl (optional) --}}
<div class="card" style="max-width: 600px">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-4">Name</dt><dd class="col-sm-8">{{ $user->name }}</dd>
            <dt class="col-sm-4">Email</dt><dd class="col-sm-8">{{ $user->email }}</dd>
            <dt class="col-sm-4">Member since</dt><dd class="col-sm-8">{{ $user->created_at?->format('M d, Y') }}</dd>
        </dl>
    </div>
    @if (isset($editUrl) || isset($backUrl))
        <div class="card-footer bg-white">
            @isset($editUrl)<a href="{{ $editUrl }}" class="btn btn-primary">Edit</a>@endisset
            @isset($backUrl)<a href="{{ $backUrl }}" class="btn btn-outline-secondary">Back</a>@endisset
        </div>
    @endif
</div>
