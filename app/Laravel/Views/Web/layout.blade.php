<!DOCTYPE html>
<html lang="en">
<head>
    @include('Shared.partials.head')
    <title>@yield('title', 'Article Portal')</title>
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('web.home') }}">Article Portal</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#topnav"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="topnav">
            <ul class="navbar-nav me-auto">
                @foreach (['home' => 'Home', 'about' => 'About', 'articles.index' => 'Articles', 'contact' => 'Contact'] as $route => $label)
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs("web.$route") || ($route === 'articles.index' && request()->routeIs('web.articles.*')) ? 'active fw-semibold' : '' }}" href="{{ route("web.$route") }}">{{ $label }}</a></li>
                @endforeach
            </ul>
            <div class="d-flex align-items-center gap-2">
                @auth('portal')
                    <span class="text-muted">{{ auth('portal')->user()->name }}</span>
                    <a href="{{ route('portal.home') }}" class="btn btn-primary btn-sm">Go to Portal</a>
                @else
                    <a href="{{ route('portal.auth.login') }}" class="btn btn-outline-primary btn-sm">Log in</a>
                    <a href="{{ route('portal.auth.register') }}" class="btn btn-primary btn-sm">Sign Up</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main class="flex-fill py-5"><div class="container">@yield('content')</div></main>

<footer class="bg-white border-top py-3 text-center text-muted small">&copy; {{ date('Y') }} Article Portal</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
