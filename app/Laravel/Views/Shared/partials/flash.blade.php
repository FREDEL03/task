{{-- Shows the message set with session()->flash('notification-status', ...) and ('notification-msg', ...) --}}
@if (session('notification-msg'))
    <div class="alert alert-{{ session('notification-status') == 'error' ? 'danger' : session('notification-status') }}" role="alert">
        {{ session('notification-msg') }}
    </div>
@endif
