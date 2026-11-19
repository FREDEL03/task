<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400..800&family=Newsreader:ital,opsz,wght@0,6..72,400..600;1,6..72,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <title>@yield('title', 'Article Portal')</title>
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg site-nav sticky-top">
    <div class="container">
        <a class="navbar-brand brand-mark" href="{{ route('web.home') }}">Article Portal</a>
        <button class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#topnav" aria-label="Menu"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="topnav">
            <ul class="navbar-nav me-auto ms-lg-3 gap-lg-1">
                @foreach (['home' => 'Home', 'about' => 'About', 'articles.index' => 'Articles', 'contact' => 'Contact'] as $route => $label)
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs("web.$route") || ($route === 'articles.index' && request()->routeIs('web.articles.*')) ? 'active' : '' }}" href="{{ route("web.$route") }}">{{ $label }}</a></li>
                @endforeach
            </ul>
            <div class="d-flex align-items-center gap-2 py-2 py-lg-0">
                @auth('portal')
                    <span class="avatar">{{ strtoupper(substr(auth('portal')->user()->name, 0, 1)) }}</span>
                    <span class="fw-semibold me-1">{{ auth('portal')->user()->name }}</span>
                    <a href="{{ route('portal.home') }}" class="btn btn-primary btn-sm">Go to Portal</a>
                @else
                    <a href="{{ route('portal.auth.login') }}" class="btn btn-outline-secondary btn-sm">Log in</a>
                    <a href="{{ route('portal.auth.register') }}" class="btn btn-primary btn-sm">Sign Up</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main class="flex-fill py-5"><div class="container">@yield('content')</div></main>

<footer class="site-footer py-4">
    <div class="container d-flex flex-column flex-sm-row justify-content-between gap-2 text-muted small">
        <span class="brand-mark text-body">Article Portal</span>
        <span>&copy; {{ date('Y') }} Article Portal. All rights reserved.</span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
