@extends('Backoffice.layout')

@section('title', 'Admin account')

@section('content')
    <h1 class="h3 mb-3">Admin account</h1>

    <div class="card" style="max-width: 640px">
        <div class="card-body p-4">
            <div class="d-flex align-items-center gap-3 mb-4">
                <span class="avatar avatar--lg">{{ strtoupper(substr($admin->name, 0, 1)) }}</span>
                <div>
                    <div class="h5 mb-0">{{ $admin->name }}</div>
                    <div class="text-muted">{{ $admin->email }}</div>
                </div>
            </div>

            <dl class="row mb-0">
                <dt class="col-sm-4 text-muted fw-normal">Name</dt>
                <dd class="col-sm-8">{{ $admin->name }}</dd>
                <dt class="col-sm-4 text-muted fw-normal">Email</dt>
                <dd class="col-sm-8">{{ $admin->email }}</dd>
                <dt class="col-sm-4 text-muted fw-normal">Joined</dt>
                <dd class="col-sm-8 mb-0">{{ $admin->created_at->format('F j, Y') }}</dd>
            </dl>
        </div>
        <div class="card-footer bg-white p-3 d-flex gap-2">
            <a href="{{ route('backoffice.admins.edit', $admin->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('backoffice.admins.index') }}" class="btn btn-outline-secondary">Back to list</a>
        </div>
    </div>
@endsection
