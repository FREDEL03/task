@extends('Backoffice.layout')

@section('title', 'My profile')

@section('content')
    <h1 class="h3 mb-3">My profile</h1>

    <div class="card" style="max-width: 640px">
        <div class="card-body p-4">
            <div class="d-flex align-items-center gap-3 mb-4">
                <span class="avatar avatar--lg">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                <div>
                    <div class="h5 mb-0">{{ $user->name }}</div>
                    <div class="text-muted">{{ $user->email }}</div>
                </div>
            </div>

            <dl class="row mb-0">
                <dt class="col-sm-4 text-muted fw-normal">Name</dt>
                <dd class="col-sm-8">{{ $user->name }}</dd>
                <dt class="col-sm-4 text-muted fw-normal">Email</dt>
                <dd class="col-sm-8">{{ $user->email }}</dd>
                <dt class="col-sm-4 text-muted fw-normal">Member since</dt>
                <dd class="col-sm-8 mb-0">{{ $user->created_at->format('F j, Y') }}</dd>
            </dl>
        </div>
        <div class="card-footer bg-white p-3">
            <a href="{{ route('backoffice.profile.edit') }}" class="btn btn-primary">Edit profile</a>
        </div>
    </div>
@endsection
