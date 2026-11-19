@extends('Shared.auth', ['title' => 'Sign up', 'brand' => 'Article Portal', 'action' => route('portal.auth.register')])

@section('fields')
    @include('Shared.partials.field', ['name' => 'name', 'label' => 'Name'])
    @include('Shared.partials.field', ['name' => 'email', 'label' => 'Email', 'type' => 'email'])
    @include('Shared.partials.field', ['name' => 'password', 'label' => 'Password', 'type' => 'password'])
    @include('Shared.partials.field', ['name' => 'password_confirmation', 'label' => 'Confirm password', 'type' => 'password'])
@endsection

@section('footer')
    Already registered? <a href="{{ route('portal.auth.login') }}">Log in</a>
@endsection
