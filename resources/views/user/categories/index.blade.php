@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container py-3">

    {{-- Page Header --}}
    <div class="mb-4 text-center">
        <h4 class="fw-bold mb-1">Categories</h4>
        <p class="text-muted mb-0">
            Explore our learning categories
        </p>
    </div>

    <div class="row g-3">

        @forelse ($categories as $category)
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 border-1 shadow-sm
                            transition hover-shadow">

                    <div class="card-body text-center">

                        <div class="mb-2">
                            <i class="bi bi-folder-fill fs-1 text-primary"></i>
                        </div>

                        <h5 class="card-title mb-2">
                            {{ $category->name }}
                        </h5>

                        <a href="{{ route('user.categories.show', $category->id) }}"
                           class="btn btn-sm btn-outline-primary">
                            View Category
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <p class="text-muted text-center">
                    No categories available.
                </p>
            </div>
        @endforelse

    </div>
</div>
@endsection
