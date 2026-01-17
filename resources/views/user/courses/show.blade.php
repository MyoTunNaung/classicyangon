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
                    <img src="{{ asset('images/courses/' . $course->cover_photo) }}" class="img-fluid rounded mb-3"
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

                        {{-- Price --}}
                        <p class="fw-bold fs-5 mb-3">
                            {{ $course->price > 0 ? '$' . number_format($course->price, 2) : 'Free' }}
                        </p>

                        {{-- Teacher --}}
                        @if ($course->teacher)
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ $course->teacher && $course->teacher->profile_photo
                                    ? asset('images/teachers/' . $course->teacher->profile_photo)
                                    : asset('images/default-avatar.png') }}"
                                    class="rounded-circle me-2" width="40" height="40" alt="Teacher">

                                <div>
                                    <small class="text-muted d-block">Teacher</small>
                                    <strong>{{ $course->teacher->user->name }}</strong>
                                </div>
                            </div>
                        @endif

                        {{-- Organization --}}
                        @if ($course->organization)
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ $course->organization && $course->organization->logo
                                    ? asset('images/organizations/' . $course->organization->logo)
                                    : asset('images/default-logo.png') }}"
                                    class="rounded me-2" width="40" height="40" alt="Organization">


                                <div>
                                    <small class="text-muted d-block">Organization</small>
                                    <strong>{{ $course->organization->name }}</strong>
                                </div>
                            </div>
                        @endif

                        {{-- Level --}}
                        @if ($course->level)
                            <p class="mb-2">
                                <strong>Level:</strong> {{ $course->level }}
                            </p>
                        @endif

                        <hr>

                        {{-- Enrollment Action --}}
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
                                <i class="bi bi-box-arrow-in-right me-1"></i>
                                Login to Enroll
                            </a>
                        @else
                            @if ($enrollment)
                                {{-- Already Enrolled --}}
                                <a href="{{ route('user.lessons.index', $course) }}" class="btn btn-success w-100">
                                    <i class="bi bi-collection-play me-1"></i>
                                    Continue Learning
                                </a>
                                {{-- Payment Pending --}}
                            @elseif ($payment && $payment->status === 'pending')
                                <div class="alert alert-warning text-center mb-0">
                                    <i class="bi bi-hourglass-split me-1"></i>
                                    <strong>Your payment is under review.</strong><br>
                                    Access will be granted after admin approval.
                                </div>
                            @else
                                {{-- NOT Enrolled --}}
                                @if ($course->price > 0)
                                    {{-- PAID COURSE --}}
                                    <a href="{{ route('user.payments.create', $course) }}" class="btn btn-primary w-100">
                                        <i class="bi bi-credit-card me-1"></i>
                                        Enroll & Pay
                                    </a>
                                @else
                                    {{-- FREE COURSE --}}
                                    <form action="{{ route('user.enrollments.store', $course) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success w-100">
                                            <i class="bi bi-unlock-fill me-1"></i>
                                            Enroll Now
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @endguest


                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">

                    <a href="{{ route('user.lessons.index', $course) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-collection-play me-1"></i>
                        View Lessons
                    </a>

                    <a href="{{ route('user.courses.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left me-1"></i>
                        Back to Courses
                    </a>

                </div>



            </div>

        </div>


    </div>
@endsection
