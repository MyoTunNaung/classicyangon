@extends('layouts.admin')

@section('title', 'Organizations')

@section('content')
    <div class="container">

         {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4 class="fw-bold mb-0">
                <i class="bi bi-buildings me-1"></i>
                Organizations <span class="text-primary">({{ $organizations->total() }})</span>
            </h4>

            @can('organization.create')
                <a href="{{ route('admin.organizations.create') }}" class="btn btn-primary">
                    + Create Organization
                </a>
            @endcan
        </div>

         {{-- Table --}}
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Owner</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th width="220">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($organizations as $organization)
                            <tr>
                                <td>{{ $organization->id }}</td>
                                <td>
                                    @if ($organization->logo)
                                        <img src="{{ asset('images/organizations/' . $organization->logo) }}" alt="Logo"
                                            height="40">
                                    @endif
                                </td>

                                </td>
                                <td>{{ $organization->name }}</td>
                                <td>{!! nl2br(e($organization->description)) !!}</td>
                                <td>{{ $organization->owner?->name ?? '-' }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $organization->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($organization->status) }}
                                    </span>
                                </td>
                                <td>{{ $organization->created_at->format('Y-m-d') }}</td>
                                <td>

                                    @can('organization.edit')
                                        <a href="{{ route('admin.organizations.edit', $organization->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                    @endcan

                                    @can('organization.delete')
                                        <form action="{{ route('admin.organizations.destroy', $organization->id) }}"
                                            method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    No organizations found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $organizations->links() }}
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $organizations->links() }}
        </div>


    </div>
@endsection
