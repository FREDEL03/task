@extends('Backoffice.layout')

@section('content')
    <h1 class="h3 mb-3">Edit {{ $record->name }}</h1>
    @include('Shared.partials.profile-form', ['user' => $record, 'action' => route("$base.update", $record->id), 'cancelUrl' => route("$base.show", $record->id)])
@endsection
