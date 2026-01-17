@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h4 class="fw-bold mb-4">
        <i class="bi bi-journal-bookmark me-1"></i>
        My Courses
    </h4>

    <div class="row">
        @forelse ($enrollments as $enrollment)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">

                    <div class="card-body">
                        <h6 class="fw-bold mb-1">
                            {{ $enrollment->course->title }}
                        </h6>

                        <p class="text-muted small mb-2">
                            {{ $enrollment->course->category?->name }}
                        </p>

                        <span class="badge bg-success">
                            Enrolled
                        </span>
                    </div>

                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('user.enrollments.show', $enrollment->course) }}"
                           class="btn btn-outline-primary btn-sm w-100">
                            Go to Course
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">You are not enrolled in any course yet.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
