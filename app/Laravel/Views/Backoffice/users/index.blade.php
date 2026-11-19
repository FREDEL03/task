@extends('Backoffice.layout')

@section('title', 'User accounts')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="h3 mb-0">User portal accounts</h1>
        <span class="text-muted">{{ $users->total() }} total</span>
    </div>

    <div class="card overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Account</th>
                        <th class="d-none d-md-table-cell">Joined</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <span class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    <div class="lh-sm">
                                        <div class="fw-semibold">{{ $user->name }}</div>
                                        <div class="small text-muted">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell text-muted">{{ $user->created_at->format('M j, Y') }}</td>
                            <td class="text-end text-nowrap">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('backoffice.users.show', $user->id) }}">View</a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('backoffice.users.edit', $user->id) }}">Edit</a>
                                <form class="d-inline" method="POST" action="{{ route('backoffice.users.destroy', $user->id) }}" onsubmit="return confirm('Delete this account? This cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-muted py-5">No user accounts yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $users->links('pagination::bootstrap-5') }}</div>
@endsection
