@extends('Backoffice.layout')

@section('content')
    <h1 class="h3 mb-3">Dashboard</h1>
    <div class="row g-3">
        @foreach (['Admin accounts' => 3, 'Portal users' => 128, 'Articles' => 42, 'Pending reviews' => 5] as $label => $value)
            <div class="col-sm-6 col-xl-3"><div class="card"><div class="card-body">
                <div class="text-muted small">{{ $label }}</div><div class="fs-2 fw-bold">{{ $value }}</div>
            </div></div></div>
        @endforeach
    </div>
@endsection
