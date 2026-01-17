@extends('layouts.app')

<style>
    .course-card {
        transition: all 0.25s ease-in-out;
        border: 1px solid rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .course-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
        border-color: #0d6efd;
    }

    .course-card img {
        height: 180px;
        object-fit: cover;
    }

    .course-placeholder {
        height: 180px;
    }

    @media (max-width: 576px) {

        .course-card img,
        .course-placeholder {
            height: 160px;
        }
    }
</style>


@section('content')
    <div class="container py-4">

        <h4 class="fw-bold mb-4">
            <i class="bi bi-journal-text me-1"></i>
            Courses <span class="text-muted">( {{ $courses->total() }} )</span>
        </h4>

        <form method="GET" action="{{ route('user.courses.index') }}" id="courseFilterForm" class="mb-4">

            <div class="row g-2 align-items-end">

                {{-- Organization --}}
                <div class="col-12 col-md-3">
                    <label class="form-label small fw-semibold">Organization</label>
                    <select name="organization_id" class="form-select course-filter">
                        <option value="">All Organizations</option>
                        @foreach ($organizations as $org)
                            <option value="{{ $org->id }}" @selected(request('organization_id') == $org->id)>
                                {{ $org->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Teacher --}}
                <div class="col-12 col-md-3">
                    <label class="form-label small fw-semibold">Teacher</label>
                    <select name="teacher_id" class="form-select course-filter">
                        <option value="">All Teachers</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @selected(request('teacher_id') == $teacher->id)>
                                {{ $teacher->user->name ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Category --}}
                <div class="col-12 col-md-3">
                    <label class="form-label small fw-semibold">Category</label>
                    <select name="category_id" class="form-select course-filter">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Reset --}}
                <div class="col-12 col-md-3">
                    <a href="{{ route('user.courses.index') }}" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                        Reset
                    </a>
                </div>

            </div>
        </form>



        <div class="row">
            @forelse ($courses as $course)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 course-card shadow-sm">

                        {{-- Cover Photo --}}
                        @if ($course->cover_photo)
                            <img src="{{ asset('images/courses/' . $course->cover_photo) }}" class="card-img-top"
                                alt="{{ $course->title }}">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center course-placeholder">
                                <i class="bi bi-image text-muted fs-1"></i>
                            </div>
                        @endif

                        {{-- Card Body --}}
                        <div class="card-body d-flex flex-column">
                            <h6 class="fw-bold mb-1 text-truncate">
                                {{ $course->title }}
                            </h6>

                            {{-- Category --}}
                            @if ($course->category)
                                <p class="text-muted small mb-1">
                                    <i class="bi bi-tags me-1"></i>
                                    {{ $course->category->name }}
                                </p>
                            @endif

                            {{-- Teacher --}}
                            @if ($course->teacher)
                                <p class="small mb-1">
                                    <i class="bi bi-person-badge me-1"></i>
                                    {{ $course->teacher->user->name }}
                                </p>
                            @endif

                            {{-- Organization --}}
                            @if ($course->organization)
                                <p class="small mb-1">
                                    <i class="bi bi-building me-1"></i>
                                    {{ $course->organization->name }}
                                </p>
                            @endif


                            <p class="fw-bold mt-auto mb-0">
                                {{ $course->price > 0 ? '$' . number_format($course->price, 2) : 'Free' }}
                            </p>
                        </div>

                        {{-- Footer --}}
                        <div class="card-footer bg-white border-0">
                            <a href="{{ route('user.courses.show', $course) }}"
                                class="btn btn-outline-primary btn-sm w-100 fw-semibold">
                                <i class="bi bi-eye me-1"></i>
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-journal-x fs-1 text-muted"></i>
                    <p class="text-muted mt-2">No courses available.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($courses->hasPages())
            <div class="mt-4 d-flex justify-content-center">
                {{ $courses->links() }}
            </div>
        @endif

    </div>



    <script>
        document.querySelectorAll('.course-filter').forEach(select => {
            select.addEventListener('change', () => {
                document.getElementById('courseFilterForm').submit();
            });
        });
    </script>
@endsection
