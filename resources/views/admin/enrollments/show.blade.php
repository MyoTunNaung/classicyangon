@extends('layouts.admin')

@section('content')
<div class="container">

    <h4 class="fw-bold mb-3">
        <i class="bi bi-person-check me-1"></i>
        Enrollment Details
    </h4>

    <div class="card">
        <div class="card-body">

            <p><strong>Student:</strong> {{ $enrollment->user->name }}</p>
            <p><strong>Email:</strong> {{ $enrollment->user->email }}</p>
            <p><strong>Course:</strong> {{ $enrollment->course->title }}</p>

            <p>
                <strong>Status:</strong>
                <span class="badge bg-{{ $enrollment->status === 'active' ? 'success' : 'secondary' }}">
                    {{ ucfirst($enrollment->status) }}
                </span>
            </p>

            <p><strong>Enrolled At:</strong> {{ $enrollment->created_at->format('d M Y, h:i A') }}</p>

            @if ($enrollment->remark)
                <hr>
                <p><strong>Remark:</strong></p>
                <p class="text-muted">{{ $enrollment->remark }}</p>
            @endif

            <a href="{{ route('admin.enrollments.index') }}"
               class="btn btn-secondary btn-sm mt-3">
                <i class="bi bi-arrow-left"></i> Back
            </a>

        </div>
    </div>

</div>
@endsection
