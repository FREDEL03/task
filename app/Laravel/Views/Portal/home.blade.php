@extends('Portal.layout')

@section('title', 'Dashboard')

@section('content')
    <h1 class="h3 mb-4">Welcome back, {{ auth('portal')->user()->name }}</h1>

    {{-- Static numbers for now --}}
    <div class="row g-3">
        <div class="col-md-4">
            <div class="stat stat--hero"><div>Articles written</div><div class="value">12</div></div>
        </div>
        <div class="col-md-4">
            <div class="stat"><div class="text-muted">Total views</div><div class="value">3,480</div></div>
        </div>
        <div class="col-md-4">
            <div class="stat"><div class="text-muted">Drafts</div><div class="value">2</div></div>
        </div>
    </div>
@endsection
