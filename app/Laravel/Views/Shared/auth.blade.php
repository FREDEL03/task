<!DOCTYPE html>
<html lang="en">
<head>
    @include('Shared.partials.head')
    <title>{{ $title }}</title>
</head>
<body class="d-flex align-items-center min-vh-100">
<div class="container" style="max-width: 440px">
    <div class="text-center mb-4"><a class="navbar-brand fs-3 text-decoration-none" href="{{ url('/') }}">{{ $brand }}</a></div>
    <div class="card">
        <form method="POST" action="{{ $action }}" class="card-body p-4">
            @csrf
            <h1 class="h4 mb-3">{{ $title }}</h1>
            @include('Shared.partials.flash')
            @yield('fields')
            <button class="btn btn-primary w-100">{{ $title }}</button>
            <p class="text-center text-muted mt-3 mb-0">@yield('footer')</p>
        </form>
    </div>
</div>
</body>
</html>
