<!DOCTYPE html>
<html lang="en">
<head>
    @include('Shared.partials.head')
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
                <li><a class="nav-link {{ request()->is('portal/cms/pages') ? 'active' : '' }}" href="{{ route('portal.cms.show', 'pages') }}">Pages</a></li>
                <li><a class="nav-link {{ request()->is('portal/cms/media') ? 'active' : '' }}" href="{{ route('portal.cms.show', 'media') }}">Media</a></li>
                <li><a class="nav-link {{ request()->is('portal/cms/menus') ? 'active' : '' }}" href="{{ route('portal.cms.show', 'menus') }}">Menus</a></li>

                <li class="nav-label">Website</li>
                <li><a class="nav-link" href="{{ route('web.home') }}">View website</a></li>
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
            @include('Shared.partials.flash')
            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
