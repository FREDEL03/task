@extends('Portal.auth.layout')

@section('title', 'Log in')

@section('content')
    <h1 class="h3 mb-1">Log in</h1>
    <p class="text-muted mb-4">No account yet? <a href="{{ route('portal.auth.register') }}">Sign up</a></p>

    <form method="POST" action="{{ route('portal.auth.login.submit') }}" novalidate>
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <button class="btn btn-primary w-100 btn-lg">Log in</button>
    </form>
@endsection
