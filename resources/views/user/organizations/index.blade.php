@extends('layouts.app')

@section('title', 'My Organizations')

@section('content')
<div class="container py-4">


     {{-- Page Title --}}
    <div class="mb-4 text-center">
        <h4 class="fw-bold mb-1">Organizations</h4>
        <p class="text-muted mb-0">Discover trusted education partners</p>
    </div>


    <div class="row g-4">
        @forelse ($organizations as $organization)
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border-1 shadow-sm org-card">

                    {{-- Logo --}}
                    <div class="text-center p-3">
                        @if ($organization->logo)
                            <img src="{{ asset('images/organizations/' . $organization->logo) }}"
                                 class="img-fluid org-logo"
                                 alt="Logo">
                        @else
                            <div class="text-muted small">No Logo</div>
                        @endif
                    </div>

                    {{-- Body --}}
                    <div class="card-body">
                        <h5 class="card-title mb-2">{{ $organization->name }}</h5>
                        <p class="card-text text-muted small">
                            {{ Str::limit($organization->description, 80) }}
                        </p>
                    </div>

                    {{-- Footer --}}
                    <div class="card-footer bg-white border-1 text-end">
                        <a href="{{ route('user.organizations.show', $organization->id) }}"
                           class="btn btn-sm btn-outline-primary">
                            View →
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted text-center">No organizations available.</p>
            </div>
        @endforelse
    </div>
</div>

{{-- Minimal custom CSS --}}
<style>
    .org-card {
        transition: all .3s ease;
        cursor: pointer;
    }

    .org-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.12);
    }

    .org-logo {
        max-height: 120px;
        object-fit: contain;
        transition: transform .3s ease;
    }

    .org-card:hover .org-logo {
        transform: scale(1.05);
    }
</style>
@endsection
