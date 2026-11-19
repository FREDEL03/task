@extends('Portal.auth.layout')

@section('title', 'Log in')

@section('content')
    <h1 class="h3 mb-4">Log in</h1>

    <form method="POST" action="{{ route('portal.auth.login') }}" novalidate>
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="pw-field">
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                <button type="button" class="pw-toggle" aria-label="Show password" onclick="const i = this.parentNode.querySelector('input'), s = i.type == 'password'; i.type = s ? 'text' : 'password'; this.firstElementChild.className = s ? 'bi bi-eye-slash' : 'bi bi-eye'"><i class="bi bi-eye"></i></button>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <button class="btn btn-primary w-100 btn-lg">Log in</button>
    </form>

    <p class="text-center text-muted mt-3 mb-0">No account yet? <a href="{{ route('portal.auth.register') }}">Sign up</a></p>
@endsection
