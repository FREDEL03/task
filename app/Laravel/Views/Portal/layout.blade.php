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
<body>
<div class="d-flex min-vh-100">

    {{-- Side navigation (becomes a slide-in menu on mobile) --}}
    <aside class="offcanvas-lg offcanvas-start panel-sidebar flex-shrink-0" id="sidebar" tabindex="-1">
        <div class="offcanvas-header d-lg-none">
            <span class="brand-mark fw-bold">Article Portal</span>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebar" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column p-3">
            <div class="d-none d-lg-block mb-3 px-2">
                <a href="{{ route('web.home') }}" class="brand-mark fw-bold fs-5">Article Portal</a>
                <div class="small text-muted ms-1 mt-1">Your workspace</div>
            </div>

            <ul class="nav nav-pills flex-column gap-1">
                <li><a class="nav-link {{ request()->routeIs('portal.home') ? 'active' : '' }}" href="{{ route('portal.home') }}">Dashboard</a></li>
                <li><a class="nav-link {{ request()->routeIs('portal.profile.*') ? 'active' : '' }}" href="{{ route('portal.profile.show') }}">My profile</a></li>

                <li class="nav-label">Content</li>
                <li><a class="nav-link {{ request()->is('user/cms/home') ? 'active' : '' }}" href="{{ route('portal.cms.home') }}">Home</a></li>
                <li><a class="nav-link {{ request()->is('user/cms/about') ? 'active' : '' }}" href="{{ route('portal.cms.about') }}">About</a></li>
                <li><a class="nav-link {{ request()->is('user/cms/contact') ? 'active' : '' }}" href="{{ route('portal.cms.contact') }}">Contact Us</a></li>

            </ul>
        </div>
    </aside>

    <div class="flex-grow-1 d-flex flex-column min-w-0">

        {{-- Top bar: user name + log out --}}
        <header class="panel-topbar bg-white border-bottom px-3 px-lg-4 py-2 d-flex align-items-center gap-2">
            <button class="btn btn-outline-secondary d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-label="Open menu">&#9776;</button>
            <span class="fw-bold d-lg-none">Article Portal</span>

            <div class="ms-auto d-flex align-items-center gap-3">
                <a href="{{ route('portal.profile.show') }}" class="text-decoration-none d-flex align-items-center gap-2">
                    <span class="avatar">{{ strtoupper(substr(auth('portal')->user()->name, 0, 1)) }}</span>
                    <span class="d-none d-sm-inline text-body fw-semibold">{{ auth('portal')->user()->name }}</span>
                </a>
                <form method="POST" action="{{ route('portal.auth.logout') }}" class="mb-0">
                    @csrf
                    <button class="btn btn-outline-secondary btn-sm">Log out</button>
                </form>
            </div>
        </header>

        <main class="flex-grow-1 p-3 p-lg-4">
            {{-- Message from session()->flash('notification-status') and ('notification-msg') --}}
            @if (session('notification-msg'))
                <div class="alert alert-{{ session('notification-status') == 'error' ? 'danger' : session('notification-status') }}" role="alert">
                    {{ session('notification-msg') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
