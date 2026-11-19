{{-- params: user, action, cancelUrl --}}
<div class="card" style="max-width: 600px">
    <form method="POST" action="{{ $action }}" class="card-body">
        @csrf
        @include('Shared.partials.field', ['name' => 'name', 'label' => 'Name', 'value' => $user->name])
        @include('Shared.partials.field', ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'value' => $user->email])
        @include('Shared.partials.field', ['name' => 'password', 'label' => 'New password (leave blank to keep)', 'type' => 'password'])
        @include('Shared.partials.field', ['name' => 'password_confirmation', 'label' => 'Confirm new password', 'type' => 'password'])
        <button class="btn btn-primary">Save</button>
        <a href="{{ $cancelUrl }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
</div>
