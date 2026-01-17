@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">
            <i class="bi bi-journal-text me-1"></i>
            {{ $course->title }}
        </h4>

        <form action="{{ route('user.enrollments.destroy', $course) }}"
              method="POST"
              onsubmit="return confirm('Unenroll from this course?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger btn-sm">
                <i class="bi bi-x-circle"></i> Unenroll
            </button>
        </form>
    </div>

    <p class="text-muted">
        {{ $course->description ?? 'No description available.' }}
    </p>

    <a href="{{ route('user.lessons.index', $course) }}"
       class="btn btn-primary">
        <i class="bi bi-collection-play me-1"></i>
        View Lessons
    </a>

</div>
@endsection
