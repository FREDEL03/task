@extends('Shared.auth', ['title' => 'Log in', 'brand' => 'Article Backoffice', 'action' => route('backoffice.auth.login')])

@section('fields')
    @include('Shared.partials.field', ['name' => 'email', 'label' => 'Email', 'type' => 'email'])
    @include('Shared.partials.field', ['name' => 'password', 'label' => 'Password', 'type' => 'password'])
    <div class="form-check mb-3"><input class="form-check-input" type="checkbox" name="remember" id="remember"><label class="form-check-label" for="remember">Remember me</label></div>
@endsection

@section('footer')
    No account? <a href="{{ route('backoffice.auth.register') }}">Sign up</a>
@endsection
