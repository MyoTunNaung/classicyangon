@extends('layouts.app')

@section('title', 'My Organizations')

@section('content')
<div class="container">
    <h4 class="mb-3">Organizations</h4>

    <div class="row">
        @forelse ($organizations as $organization)
            <div class="col-md-4 mb-3">
                <div class="card h-100">

                    @if ($organization->logo)
                        <img src="{{ asset('storage/'.$organization->logo) }}"
                             class="card-img-top" alt="Logo">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $organization->name }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($organization->description, 80) }}
                        </p>
                    </div>

                    <div class="card-footer text-end">
                        <a href="{{ route('user.organizations.show', $organization->id) }}"
                           class="btn btn-sm btn-primary">
                            View
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No organizations available.</p>
        @endforelse
    </div>
</div>
@endsection
