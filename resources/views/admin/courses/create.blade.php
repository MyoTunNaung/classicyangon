@extends('layouts.admin')

@section('content')

<div class="container">

    <h4 class="fw-bold mb-3">
        <i class="bi bi-plus-circle me-1"></i> Create Course
    </h4>

    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.courses.partials.form')

        <div class="mt-3">
            <button class="btn btn-primary btn-sm">
                <i class="bi bi-save me-1"></i> Save
            </button>

            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary btn-sm">
                Back
            </a>
        </div>
    </form>

</div>
@endsection
