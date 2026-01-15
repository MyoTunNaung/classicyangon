@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container py-3">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card border-1 shadow-sm">
                <div class="card-body text-center">

                    <div class="mb-3">
                        <i class="bi bi-folder2-open fs-1 text-primary"></i>
                    </div>

                    <h3 class="fw-bold mb-2">
                        {{ $category->name }}
                    </h3>

                    <p class="text-muted mb-3">
                        Category slug:
                        <span class="badge bg-light text-dark">
                            {{ $category->slug }}
                        </span>
                    </p>

                    <span class="badge bg-success mb-3">
                        {{ ucfirst($category->status) }}
                    </span>

                    <div class="mt-4">
                        <a href="{{ route('user.categories.index') }}"
                           class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left me-1"></i>
                            Back to Categories
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
