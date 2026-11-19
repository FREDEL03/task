@extends('Portal.layout')

@section('title', 'Contact')

@section('content')
    <div class="mx-auto" style="max-width: 760px">
        <h1 class="display-6 fw-bold mb-3">Contact us</h1>
        <p class="reading lead">Questions, corrections or ideas for an article? Reach us here.</p>

        <div class="card mt-4">
            <ul class="list-group list-group-flush">
                @foreach (['Email' => 'hello@example.com', 'Phone' => '+63 000 000 0000', 'Address' => 'The Garden by Pacific Ace, Subic Bay Freeport Zone'] as $label => $value)
                    <li class="list-group-item d-flex flex-column flex-sm-row gap-1 gap-sm-3 py-3">
                        <span class="text-muted" style="min-width: 6rem">{{ $label }}</span><span
                            class="fw-semibold">{{ $value }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
