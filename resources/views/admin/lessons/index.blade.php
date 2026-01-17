@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">
            <i class="bi bi-journal-text me-1"></i>
            Lessons <span class="text-primary">( {{ $lessons->total() }} )</span>
        </h4>

        <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary btn-sm">
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
                        <th>Course</th>
                        <th>Order</th>
                        <th>Free</th>
                        <th>Status</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lessons as $index => $lesson)
                        <tr>
                            <td>{{ $lessons->firstItem() + $index }}</td>

                            <td>{{ $lesson->title }}</td>

                            <td>{{ $lesson->course?->title }}</td>

                            <td>{{ $lesson->lesson_order }}</td>

                            <td>
                                <span class="badge bg-{{ $lesson->is_free ? 'info' : 'secondary' }}">
                                    {{ $lesson->is_free ? 'Free' : 'Paid' }}
                                </span>
                            </td>

                            <td>
                                <span class="badge bg-{{ $lesson->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($lesson->status) }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('admin.lessons.edit', $lesson) }}"
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.lessons.destroy', $lesson) }}"
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
                                No lessons found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($lessons->hasPages())
            <div class="card-footer">
                {{ $lessons->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
