@extends('Portal.layout')

@section('content')
    <h1 class="h3 mb-3">Edit Profile</h1>
    @include('Shared.partials.profile-form', ['user' => $user, 'action' => route('portal.profile.edit'), 'cancelUrl' => route('portal.profile.show')])
@endsection
