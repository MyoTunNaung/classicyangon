@extends('layouts.admin')

@section('content')
<div class="container">

    <h4 class="fw-bold mb-3">
        <i class="bi bi-pencil-square me-1"></i> Edit Lesson
    </h4>

    <form action="{{ route('admin.lessons.update', $lesson) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.lessons.partials.form', ['lesson' => $lesson])

        <div class="mt-3">
            <button class="btn btn-primary btn-sm">
                <i class="bi bi-save me-1"></i> Update
            </button>

            <a href="{{ route('admin.lessons.index') }}" class="btn btn-secondary btn-sm">
                Back
            </a>
        </div>
    </form>

</div>
@endsection
