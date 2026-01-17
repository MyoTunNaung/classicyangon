@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">
            <i class="bi bi-people me-1"></i>
            Enrollments
        </h4>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Enrolled At</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($enrollments as $index => $enrollment)
                        <tr>
                            <td>{{ $enrollments->firstItem() + $index }}</td>
                            <td>{{ $enrollment->user->name }}</td>
                            <td>{{ $enrollment->course->title }}</td>
                            <td>
                                <span class="badge bg-{{ $enrollment->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($enrollment->status) }}
                                </span>
                            </td>
                            <td>{{ $enrollment->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.enrollments.show', $enrollment) }}"
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <form action="{{ route('admin.enrollments.destroy', $enrollment) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Remove this enrollment?')">
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
                            <td colspan="6" class="text-center py-3">
                                No enrollments found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($enrollments->hasPages())
            <div class="card-footer">
                {{ $enrollments->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
