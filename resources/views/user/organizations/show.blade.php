@extends('layouts.app')

@section('title', $organization->name)

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card border-1 shadow-sm rounded-4">
                <div class="card-body p-4">

                    {{-- Header --}}
                    <div class="d-flex align-items-center mb-4">
                        @if ($organization->logo)
                            <img src="{{ asset('images/organizations/' . $organization->logo) }}"
                                 class="img-fluid me-3"
                                 alt="Logo"
                                 style="max-height: 70px; object-fit: contain;">
                        @endif

                        <div>
                            <h3 class="mb-1">{{ $organization->name }}</h3>
                            <span class="badge bg-success">
                                {{ ucfirst($organization->status) }}
                            </span>
                        </div>
                    </div>

                    {{-- Owner --}}
                    <p class="text-muted mb-3">
                        <i class="bi bi-person-circle me-1"></i>
                        <strong>Owner:</strong>
                        {{ $organization->owner?->name ?? 'N/A' }}
                    </p>

                    {{-- Description --}}
                    <div class="mb-4">
                        <h6 class="fw-semibold text-secondary mb-2">
                            About this organization
                        </h6>
                        <p class="text-muted mb-0">
                            {!! nl2br(e($organization->description)) !!}
                        </p>
                    </div>

                    {{-- Actions --}}
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('user.organizations.index') }}"
                           class="btn btn-outline-secondary btn-sm px-4">
                            ← Back
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
