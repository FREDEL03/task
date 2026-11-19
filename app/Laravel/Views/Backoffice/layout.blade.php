@extends('Shared.panel', ['guard' => 'backoffice', 'brand' => 'Article Backoffice', 'profileRoute' => 'backoffice.profile.show', 'logoutRoute' => 'backoffice.auth.logout'])

@section('nav')
    <li><a class="nav-link {{ request()->routeIs('backoffice.dashboard') ? 'active' : '' }}" href="{{ route('backoffice.dashboard') }}">Dashboard</a></li>
    <li class="small text-uppercase text-white-50 mt-3 mb-1 px-3">Account Management</li>
    <li><a class="nav-link {{ request()->routeIs('backoffice.admins.*') ? 'active' : '' }}" href="{{ route('backoffice.admins.index') }}">Admin Accounts</a></li>
    <li><a class="nav-link {{ request()->routeIs('backoffice.users.*') ? 'active' : '' }}" href="{{ route('backoffice.users.index') }}">User Accounts</a></li>
    <li class="mt-3"><a class="nav-link {{ request()->routeIs('backoffice.profile.*') ? 'active' : '' }}" href="{{ route('backoffice.profile.show') }}">My Profile</a></li>
@endsection

@section('body')
    @yield('content')
@endsection
