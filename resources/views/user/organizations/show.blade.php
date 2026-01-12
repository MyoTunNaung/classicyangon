@extends('layouts.app')

@section('title', $organization->name)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>{{ $organization->name }}</h3>

                @if ($organization->logo)
                    <img src="{{ asset('images/organizations/' . $organization->logo) }}" alt="Logo" height="40">
                @endif

                <p class="text-muted">
                    Owner: {{ $organization->owner?->name ?? 'N/A' }}
                </p>

                <p>
                    {{ $organization->description }}
                </p>

                <span class="badge bg-success">
                    {{ ucfirst($organization->status) }}
                </span>

                <div class="mt-3">
                    <a href="{{ route('user.organizations.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
