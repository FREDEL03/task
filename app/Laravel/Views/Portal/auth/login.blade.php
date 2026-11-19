@extends('Shared.auth', ['title' => 'Log in', 'brand' => 'Article Portal', 'action' => route('portal.auth.login')])

@section('fields')
    @include('Shared.partials.field', ['name' => 'email', 'label' => 'Email', 'type' => 'email'])
    @include('Shared.partials.field', ['name' => 'password', 'label' => 'Password', 'type' => 'password'])
    <div class="form-check mb-3"><input class="form-check-input" type="checkbox" name="remember" id="remember"><label class="form-check-label" for="remember">Remember me</label></div>
@endsection

@section('footer')
    No account? <a href="{{ route('portal.auth.register') }}">Sign up</a>
@endsection
