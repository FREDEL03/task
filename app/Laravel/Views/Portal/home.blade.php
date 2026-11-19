@extends('Portal.layout')

@section('content')
    <h1 class="h3 mb-3">Welcome, {{ auth('portal')->user()->name }}</h1>
    <div class="row g-3">
        @foreach (['Articles written' => 12, 'Total views' => '3,480', 'Drafts' => 2] as $label => $value)
            <div class="col-md-4"><div class="card"><div class="card-body">
                <div class="text-muted small">{{ $label }}</div><div class="fs-2 fw-bold">{{ $value }}</div>
            </div></div></div>
        @endforeach
    </div>
@endsection
