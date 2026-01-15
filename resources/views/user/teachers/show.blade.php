@extends('layouts.app')

@section('title', 'Teacher Profile')

@section('content')
<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-1">
                <div class="card-body">

                    {{-- Profile Header --}}
                    <div class="text-center mb-4">
                        @if ($teacher->profile_photo)
                            <img src="{{ asset('images/teachers/' . $teacher->profile_photo) }}"
                                 class="rounded-circle mb-3"
                                 style="width:120px;height:120px;object-fit:cover;"
                                 alt="Teacher Photo">
                        @else
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3"
                                 style="width:120px;height:120px;">
                                <i class="bi bi-person fs-1 text-muted"></i>
                            </div>
                        @endif

                        <h4 class="fw-bold mb-1">
                            {{ $teacher->user->name }}
                        </h4>

                        @if ($teacher->specialization)
                            <span class="badge bg-primary">
                                {{ $teacher->specialization }}
                            </span>
                        @endif
                    </div>

                    {{-- Details --}}
                    <div class="mb-3">
                        <h6 class="fw-semibold">Biography</h6>
                        <p class="text-muted">
                            {!! nl2br(e($teacher->bio)) !!}
                        </p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Organization:</strong><br>
                            <span class="text-muted">
                                {{ $teacher->organization?->name ?? 'N/A' }}
                            </span>
                        </div>

                        <div class="col-md-6">
                            <strong>Status:</strong><br>
                            <span class="badge bg-success">
                                {{ ucfirst($teacher->status) }}
                            </span>
                        </div>
                    </div>

                    {{-- Back Button --}}
                    <div class="text-end">
                        <a href="{{ route('user.teachers.index') }}"
                           class="btn btn-secondary">
                            Back
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
