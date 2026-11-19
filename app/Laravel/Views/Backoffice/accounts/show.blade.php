@extends('Backoffice.layout')

@section('content')
    <h1 class="h3 mb-3">{{ $title }}: {{ $record->name }}</h1>
    @include('Shared.partials.profile-show', ['user' => $record, 'editUrl' => route("$base.edit", $record->id), 'backUrl' => route("$base.index")])
@endsection
