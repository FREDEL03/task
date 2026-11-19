@extends('Backoffice.layout')

@section('content')
    <h1 class="h3 mb-3">{{ $title }}</h1>
    <div class="card"><div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
            @forelse ($records as $r)
                <tr>
                    <td>{{ $r->id }}</td><td>{{ $r->name }}</td><td>{{ $r->email }}</td>
                    <td class="text-end text-nowrap">
                        <a class="btn btn-sm btn-outline-primary" href="{{ route("$base.show", $r->id) }}">View</a>
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route("$base.edit", $r->id) }}">Edit</a>
                        <form class="d-inline" method="POST" action="{{ route("$base.destroy", $r->id) }}" onsubmit="return confirm('Delete this account?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted py-4">No accounts.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div></div>
    <div class="mt-3">{{ $records->links('pagination::bootstrap-5') }}</div>
@endsection
