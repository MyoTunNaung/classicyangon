@extends('layouts.admin')

@section('content')

<div class="container">

    <h4 class="fw-bold mb-3">
        <i class="bi bi-plus-circle me-1"></i> Create Lesson
    </h4>

    <form action="{{ route('admin.lessons.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.lessons.partials.form')

        <div class="mt-3">
            <button class="btn btn-primary btn-sm" type="submit">
                <i class="bi bi-save me-1"></i> Save
            </button>

            <a href="{{ route('admin.lessons.index') }}" class="btn btn-secondary btn-sm">
                Back
            </a>
        </div>
    </form>

</div>

@endsection
