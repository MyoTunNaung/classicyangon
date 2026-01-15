@extends('layouts.admin')

@section('content')
<div class="container">

    <h4 class="fw-bold mb-3">
        <i class="bi bi-pencil-square me-1"></i> Edit Course
    </h4>

    <form action="{{ route('admin.courses.update', $course) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.courses.partials.form', ['course' => $course])

        <div class="mt-3">
            <button class="btn btn-primary btn-sm">
                <i class="bi bi-save me-1"></i> Update
            </button>

            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary btn-sm">
                Back
            </a>
        </div>
    </form>

</div>
@endsection
