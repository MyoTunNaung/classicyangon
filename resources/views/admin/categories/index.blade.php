@extends('layouts.admin')

@section('content')
<div class="container">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">

        <h4 class="fw-bold mb-0">
            <i class="bi bi-tags me-1"></i>
            Categories <span class="text-primary">({{ $categories->total() }})</span>
        </h4>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>
            Add Category
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Sort</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td class="fw-semibold">
                                {{ $category->name }}
                            </td>

                            <td class="text-muted">
                                {{ $category->slug }}
                            </td>

                            <td>{{ $category->sort_order }}</td>

                            <td>
                                <span class="badge bg-{{ $category->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($category->status) }}
                                </span>
                            </td>

                            <td class="text-end">
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $categories->links() }}
    </div>

</div>
@endsection
