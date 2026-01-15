@extends('layouts.admin')

@section('content')
<div class="container">

    <h4 class="fw-bold mb-3">Edit Category</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.categories.update', $category->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $category->name) }}"
                           required>
                </div>

                {{-- Slug --}}
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text"
                           name="slug"
                           class="form-control"
                           value="{{ old('slug', $category->slug) }}"
                           required>
                </div>

                {{-- Sort Order --}}
                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           class="form-control"
                           value="{{ old('sort_order', $category->sort_order) }}">
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" {{ $category->status === 'active' ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="inactive" {{ $category->status === 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                {{-- Remark --}}
                <div class="mb-3">
                    <label class="form-label">Remark</label>
                    <textarea name="remark"
                              class="form-control"
                              rows="3">{{ old('remark', $category->remark) }}</textarea>
                </div>

                {{-- Actions --}}
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i>
                        Update
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
