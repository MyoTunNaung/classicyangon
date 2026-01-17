@extends('layouts.app')

@section('content')
    <div class="container py-3">

        <div class="mb-3">
            <h4 class="fw-bold">
                <i class="bi bi-collection-play me-1"></i>
                Lessons for: {{ $course->title }}
            </h4>

            <p class="text-muted mb-0">
                {{ $course->category?->name }}
            </p>
        </div>

        <div class="card">
            <div class="card-body p-0">

                <table class="table table-hover table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="60">#</th>
                            <th>Title</th>
                            <th width="120">Access</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lessons as $index => $lesson)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    {{ $lesson->title }}
                                    @if ($lesson->is_free)
                                        <span class="badge bg-success ms-1">Free</span>
                                    @endif
                                </td>

                                <td>
                                    <span class="badge bg-{{ $lesson->is_free ? 'success' : 'secondary' }}">
                                        {{ $lesson->is_free ? 'Free' : 'Paid' }}
                                    </span>
                                </td>

                                <td>
                                    {{-- FREE lesson --}}
                                    @if ($lesson->is_free)
                                        <a href="{{ route('user.lessons.show', [$course, $lesson]) }}"
                                            class="btn btn-outline-success btn-sm">
                                            <i class="bi bi-play-circle"></i>
                                        </a>

                                        {{-- PAID lesson --}}
                                    @else
                                        {{-- Not logged in --}}
                                        @guest

                                            <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#enrollRequiredModal" title="Enroll to access">
                                                <i class="bi bi-lock-fill"></i>
                                            </button>

                                            {{-- Logged in but NOT enrolled --}}
                                        @elseif (!$isEnrolled)

                                            <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#enrollRequiredModal" title="Enroll to access">
                                                <i class="bi bi-lock-fill"></i>
                                            </button>


                                            {{-- <a href="{{ route('user.courses.show', $course) }}"
                                                class="btn btn-outline-warning btn-sm" title="Enroll to access">
                                                <i class="bi bi-lock-fill"></i>
                                            </a> --}}

                                            {{-- Logged in & enrolled --}}
                                        @else
                                            <a href="{{ route('user.lessons.show', [$course, $lesson]) }}"
                                                class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-play-circle"></i>
                                            </a>
                                        @endif

                            @endif
                            </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-3">
                                    No lessons available.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

            @if ($lessons->hasPages())
                <div class="mt-3">
                    {{ $lessons->links() }}
                </div>
            @endif


        </div>

    {{-- Enroll Required Modal --}}
    <div class="modal fade" id="enrollRequiredModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-exclamation-circle text-warning me-1"></i>
                        Enrollment Required
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <p class="mb-0">
                        Please <strong>Enroll First</strong> to see paid lessons.
                    </p>
                </div>

                <div class="modal-footer justify-content-center">

                    <a href="{{ route('user.courses.show', $course) }}"
                    class="btn btn-primary btn-sm">
                        <i class="bi bi-cart-check me-1"></i>
                        Enroll Now
                    </a>

                    <button type="button"
                            class="btn btn-outline-secondary btn-sm"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>

            </div>
        </div>
    </div>

    @endsection
