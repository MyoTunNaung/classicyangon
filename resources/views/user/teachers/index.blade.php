@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
<div class="container py-3">

    {{-- Page Title --}}
    <div class="mb-4 text-center">
        <h4 class="fw-bold mb-1">Teachers</h4>
        <p class="text-muted mb-0">Meet our professional educators</p>
    </div>

    <div class="row g-4 justify-content-center">
        @forelse ($teachers as $teacher)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-1
                            transition"
                     style="transition: transform .2s, box-shadow .2s;"
                     onmouseover="this.style.transform='translateY(-4px)';
                                  this.classList.add('shadow')"
                     onmouseout="this.style.transform='none';
                                 this.classList.remove('shadow')">

                    {{-- Profile Photo --}}
                    <div class="text-center pt-3">
                        @if ($teacher->profile_photo)
                            <img src="{{ asset('images/teachers/' . $teacher->profile_photo) }}"
                                 class="rounded-circle img-fluid"
                                 style="width:100px;height:100px;object-fit:cover;"
                                 alt="Teacher Photo">
                        @else
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto"
                                 style="width:100px;height:100px;">
                                <i class="bi bi-person fs-1 text-muted"></i>
                            </div>
                        @endif
                    </div>

                    <div class="card-body text-center">
                        <h6 class="fw-semibold mb-1">
                            {{ $teacher->user->name }}
                        </h6>

                        @if ($teacher->specialization)
                            <span class="badge bg-primary-subtle text-primary mb-2">
                                {{ $teacher->specialization }}
                            </span>
                        @endif

                        <p class="text-muted small mt-2">
                            {{ Str::limit($teacher->bio, 80) }}
                        </p>
                    </div>

                    <div class="card-footer bg-white text-center border-1 pb-3">
                        <a href="{{ route('user.teachers.show', $teacher->id) }}"
                           class="btn btn-sm btn-outline-primary">
                            View Profile
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                No teachers available.
            </div>
        @endforelse
    </div>
</div>
@endsection
