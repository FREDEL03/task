@extends('Backoffice.layout')

@section('title', 'Edit admin account')

@section('content')
    <h1 class="h3 mb-3">Edit admin account</h1>

    <div class="card" style="max-width: 640px">
        <form method="POST" action="{{ route('backoffice.admins.update', $admin->id) }}" class="card-body p-4" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $admin->name) }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $admin->email) }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <hr class="my-4">
            <p class="text-muted small">Leave the password fields blank to keep the current password.</p>

            <div class="mb-3">
                <label for="password" class="form-label">New password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm new password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <div class="d-flex gap-2 mt-4">
                <button class="btn btn-primary">Save changes</button>
                <a href="{{ route('backoffice.admins.show', $admin->id) }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
