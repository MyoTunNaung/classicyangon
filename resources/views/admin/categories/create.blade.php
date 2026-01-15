@extends('layouts.admin')

@section('content')
<div class="container">

    <h4 class="fw-bold mb-3">Create Category</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                {{-- Name --}}
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           required>
                </div>

                {{-- Slug --}}
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text"
                           name="slug"
                           class="form-control"
                           value="{{ old('slug') }}"
                           placeholder="e.g. web-development"
                           required>
                    <small class="text-muted">
                        Used in URLs. Must be unique.
                    </small>
                </div>

                {{-- Sort Order --}}
                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           class="form-control"
                           value="{{ old('sort_order', 0) }}">
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                {{-- Remark --}}
                <div class="mb-3">
                    <label class="form-label">Remark</label>
                    <textarea name="remark"
                              class="form-control"
                              rows="3">{{ old('remark') }}</textarea>
                </div>

                {{-- Actions --}}
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i>
                        Save
                    </button>

                    <a href="{{ route('admin.categories.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
