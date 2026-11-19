@extends('Portal.layout')

@section('title', 'About')

@section('content')
    <div class="mx-auto" style="max-width: 760px">
        <h1 class="display-6 fw-bold mb-3">About Article Portal</h1>
        <p class="reading lead">A place to read good articles and, once you have an account, to write them.</p>
        <p class="reading">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed
            cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>

        <div class="row g-3 mt-3">
            @foreach (['Readers' => 'Browse articles on the website, no account needed.', 'Writers' => 'Sign up to get your own portal and manage your profile.', 'Admins' => 'Manage accounts from the backoffice.'] as $who => $text)
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="h6">{{ $who }}</h2>
                            <p class="text-muted small mb-0">{{ $text }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
