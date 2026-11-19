<!DOCTYPE html>
<html lang="en">
<head>
    @include('Shared.partials.head')
    <title>@yield('title')</title>
</head>
<body>
<div class="row g-0 min-vh-100">

    {{-- Left panel (hidden on mobile) --}}
    <div class="col-lg-5 auth-aside d-none d-lg-flex">
        <a href="{{ route('web.home') }}" class="brand-mark fs-5 fw-bold">Article Portal</a>
        <div class="position-relative" style="z-index: 1; max-width: 22rem">
            <p class="display-6 fw-bold mb-2">Your articles, your profile, one place.</p>
            <p class="mb-0 opacity-75">Log in to manage your account.</p>
        </div>
    </div>

    {{-- Form --}}
    <div class="col-lg-7 d-flex align-items-center justify-content-center p-4">
        <div class="w-100" style="max-width: 400px">
            <a href="{{ route('web.home') }}" class="brand-mark fw-bold fs-5 mb-4 d-lg-none">Article Portal</a>
            @include('Shared.partials.flash')
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
