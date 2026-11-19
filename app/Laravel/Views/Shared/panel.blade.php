{{-- Sidebar layout shared by Portal and Backoffice. params: guard, brand, profileRoute, logoutRoute; sections: nav, body --}}
<!DOCTYPE html>
<html lang="en">
<head>
    @include('Shared.partials.head')
    <title>@yield('title', $brand)</title>
</head>
<body>
<div class="d-flex flex-column flex-lg-row min-vh-100">
    <nav class="navbar navbar-dark bg-dark d-lg-none px-3">
        <span class="navbar-brand text-white">{{ $brand }}</span>
        <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#sidebar"><span class="navbar-toggler-icon"></span></button>
    </nav>

    <aside class="offcanvas-lg offcanvas-start panel-sidebar text-white flex-shrink-0" id="sidebar" tabindex="-1">
        <div class="offcanvas-body d-flex flex-column p-3">
            <a href="{{ url('/') }}" class="h5 text-white text-decoration-none mb-4 d-none d-lg-block">{{ $brand }}</a>
            <ul class="nav nav-pills flex-column gap-1 mb-auto">@yield('nav')</ul>
            <hr>
            <a href="{{ route($profileRoute) }}" class="text-white text-decoration-none small mb-2">{{ auth($guard)->user()->name }}</a>
            <form method="POST" action="{{ route($logoutRoute) }}">@csrf
                <button class="btn btn-sm btn-outline-light w-100">Log out</button>
            </form>
        </div>
    </aside>

    <main class="flex-grow-1 p-4">
        @include('Shared.partials.flash')
        @yield('body')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
