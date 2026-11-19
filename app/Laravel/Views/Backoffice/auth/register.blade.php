@extends('Backoffice.auth.layout')

@section('title', 'Sign up')

@section('content')
    <h1 class="h3 mb-4">Sign up</h1>

    <form method="POST" action="{{ route('backoffice.auth.store') }}" novalidate>
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

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

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm password</label>
            <div class="pw-field">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                <button type="button" class="pw-toggle" aria-label="Show password" onclick="const i = this.parentNode.querySelector('input'), s = i.type == 'password'; i.type = s ? 'text' : 'password'; this.firstElementChild.className = s ? 'bi bi-eye-slash' : 'bi bi-eye'"><i class="bi bi-eye"></i></button>
            </div>
        </div>

        <button class="btn btn-primary w-100 btn-lg">Sign up</button>
    </form>

    <p class="text-center text-muted mt-3 mb-0">Already registered? <a href="{{ route('backoffice.auth.login') }}">Log in</a></p>
@endsection
