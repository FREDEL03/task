@extends('Backoffice.layout')

@section('title', 'Dashboard')

@section('content')
    <h1 class="h3 mb-4">Dashboard</h1>

    {{-- Static numbers for now --}}
    <div class="row g-3">
        <div class="col-sm-6 col-xl-3">
            <div class="stat stat--hero"><div>User portal accounts</div><div class="value">128</div></div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat"><div class="text-muted">Admin accounts</div><div class="value">3</div></div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat"><div class="text-muted">Articles</div><div class="value">42</div></div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat"><div class="text-muted">Pending reviews</div><div class="value">5</div></div>
        </div>
    </div>
@endsection
