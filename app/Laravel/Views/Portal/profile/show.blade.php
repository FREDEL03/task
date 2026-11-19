@extends('Portal.layout')

@section('content')
    <h1 class="h3 mb-3">My Profile</h1>
    @include('Shared.partials.profile-show', ['user' => $user, 'editUrl' => route('portal.profile.edit')])
@endsection
