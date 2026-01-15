@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">
            <i class="bi bi-journal-text me-1"></i>
            Courses <span class="text-muted">( {{ $courses->total() }} )</span>
        </h4>

        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Create
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Teacher</th>
                        <th>Organization</th>
                        <th>Status</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $index => $course)
                        <tr>
                            <td>{{ $courses->firstItem() + $index }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->category?->name }}</td>
                            <td>{{ $course->teacher->user->name ?? 'N/A' }}</td>
                            <td>{{ $course->organization?->name }}</td>
                            <td>
                                <span class="badge bg-{{ $course->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($course->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.courses.edit', $course) }}"
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.courses.destroy', $course) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-3">
                                No courses found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($courses->hasPages())
            <div class="card-footer">
                {{ $courses->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
