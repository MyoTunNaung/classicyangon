@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h4 class="fw-bold mb-4">
        <i class="bi bi-journal-text me-1"></i>
        Courses <span class="text-muted">( {{ $courses->total() }} )</span>
    </h4>

    <div class="row">
        @forelse ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">

                    @if ($course->cover_photo)
                        <img src="{{ asset('images/courses/' . $course->cover_photo) }}"
                             class="card-img-top"
                             alt="{{ $course->title }}">
                    @else
                        <div class="bg-light text-center py-5">
                            <i class="bi bi-image text-muted fs-1"></i>
                        </div>
                    @endif

                    <div class="card-body">
                        <h6 class="fw-bold mb-1">
                            {{ $course->title }}
                        </h6>

                        <p class="text-muted small mb-1">
                            {{ $course->category?->name }}
                        </p>

                        @if ($course->teacher)
                            <p class="small mb-1">
                                <i class="bi bi-person"></i>
                                {{ $course->teacher->name }}
                            </p>
                        @endif

                        <p class="fw-bold mb-0">
                            {{ $course->price > 0 ? '$' . number_format($course->price, 2) : 'Free' }}
                        </p>
                    </div>

                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('user.courses.show', $course) }}"
                           class="btn btn-outline-primary btn-sm w-100">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">No courses available.</p>
            </div>
        @endforelse
    </div>

    @if ($courses->hasPages())
        <div class="mt-4">
            {{ $courses->links() }}
        </div>
    @endif

</div>
@endsection
