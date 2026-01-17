@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h4 class="fw-bold mb-3">
        <i class="bi bi-list-check me-1"></i>
        My Enrollments
    </h4>

    <div class="list-group">
        @forelse ($enrollments as $enrollment)
            <a href="{{ route('user.enrollments.show', $enrollment->course) }}"
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>
                    {{ $enrollment->course->title }}
                </span>
                <span class="badge bg-success">Active</span>
            </a>
        @empty
            <div class="text-muted">
                No enrollments found.
            </div>
        @endforelse
    </div>

</div>
@endsection
