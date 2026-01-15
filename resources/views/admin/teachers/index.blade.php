@extends('layouts.admin')

@section('title', 'Teachers')

@section('content')
<div class="container py-3">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">
            <i class="bi bi-person-badge me-2"></i>
            Teachers <span class="text-primary">({{ $teachers->total() }})</span>
        </h4>

        <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>
            Add Teacher
        </a>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Teachers Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Teacher</th>
                            <th>Organization</th>
                            <th>Specialization</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($teachers as $teacher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                {{-- Profile Photo --}}
                                <td>
                                    @if ($teacher->profile_photo)
                                        <img src="{{ asset('images/teachers/'.$teacher->profile_photo) }}"
                                             class="rounded-circle"
                                             width="40" height="40"
                                             style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>

                                {{-- Teacher Name --}}
                                <td>
                                    <div class="fw-semibold">
                                        {{ $teacher->user->name }}
                                    </div>
                                    <small class="text-muted">
                                        {{ $teacher->user->email }}
                                    </small>
                                </td>

                                {{-- Organization --}}
                                <td>
                                    {{ $teacher->organization?->name ?? 'N/A' }}
                                </td>

                                {{-- Specialization --}}
                                <td>
                                    {{ $teacher->specialization ?? '—' }}
                                </td>

                                {{-- Status --}}
                                <td>
                                    <span class="badge
                                        {{ $teacher->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ ucfirst($teacher->status) }}
                                    </span>
                                </td>

                                {{-- Actions --}}
                                <td class="text-end">
                                    <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                                       class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.teachers.destroy', $teacher->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Delete this teacher?')">
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
                                <td colspan="7" class="text-center text-muted py-4">
                                    No teachers found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $teachers->links() }}
    </div>

</div>
@endsection
