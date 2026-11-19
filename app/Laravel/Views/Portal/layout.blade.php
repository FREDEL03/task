@extends('Shared.panel', ['guard' => 'portal', 'brand' => 'Article Portal', 'profileRoute' => 'portal.profile.show', 'logoutRoute' => 'portal.auth.logout'])

@section('nav')
    <li><a class="nav-link {{ request()->routeIs('portal.home') ? 'active' : '' }}" href="{{ route('portal.home') }}">Dashboard</a></li>
    <li><a class="nav-link {{ request()->routeIs('portal.profile.*') ? 'active' : '' }}" href="{{ route('portal.profile.show') }}">Profile</a></li>
    <li class="small text-uppercase text-white-50 mt-3 mb-1 px-3">CMS</li>
    @foreach (['pages' => 'Pages', 'media' => 'Media', 'menus' => 'Menus'] as $slug => $label)
        <li><a class="nav-link {{ request()->is("portal/cms/$slug") ? 'active' : '' }}" href="{{ route('portal.cms.show', $slug) }}">{{ $label }}</a></li>
    @endforeach
    <li class="mt-3"><a class="nav-link" href="{{ route('web.home') }}">View website</a></li>
@endsection

@section('body')
    @yield('content')
@endsection
