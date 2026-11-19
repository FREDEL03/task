<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400..800&family=Newsreader:ital,opsz,wght@0,6..72,400..600;1,6..72,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
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
            {{-- Message from session()->flash('notification-status') and ('notification-msg') --}}
            @if (session('notification-msg'))
                <div class="alert alert-{{ session('notification-status') == 'error' ? 'danger' : session('notification-status') }}" role="alert">
                    {{ session('notification-msg') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
