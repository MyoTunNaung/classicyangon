@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="row">

        <h3 class="fw-bold mb-2 text-center">
            {{ $course->title }}
        </h3>

        <p class="text-muted text-center">
            Category: {{ $course->category?->name }}
        </p>

        <div class="col-md-6">

            @if ($course->cover_photo)
                <img src="{{ asset('images/courses/' . $course->cover_photo) }}"
                     class="img-fluid rounded mb-3"
                     alt="{{ $course->title }}">
            @endif

            <div class="mb-4">
                <h5 class="fw-bold">Course Description</h5>
                <p>{!! nl2br(e($course->description ?? 'No description available.')) !!}</p>

            </div>

        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">

                    <p class="fw-bold fs-5 mb-2">
                        {{ $course->price > 0 ? '$' . number_format($course->price, 2) : 'Free' }}
                    </p>

                    @if ($course->teacher)
                        <p class="mb-1">
                            <strong>Teacher:</strong> {{ $course->teacher->user->name }}
                        </p>
                    @endif

                    @if ($course->organization)
                        <p class="mb-1">
                            <strong>Organization:</strong> {{ $course->organization->name }}
                        </p>
                    @endif

                    @if ($course->level)
                        <p class="mb-1">
                            <strong>Level:</strong> {{ $course->level }}
                        </p>
                    @endif

                    <hr>

                    <button class="btn btn-primary w-100" disabled>
                        Enroll (Phase‑2)
                    </button>

                </div>
            </div>

            <a href="{{ route('user.courses.index') }}"
               class="btn btn-secondary btn-md mt-3">
                ← Back to Courses
            </a>
        </div>
    </div>

</div>
@endsection
