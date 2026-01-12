@extends('layouts.admin')

@section('title', 'Edit Organization')

@section('content')
    <div class="container">
        <h4 class="mb-3">Edit Organization</h4>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.organizations.update', $organization->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Organization Name</label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name', $organization->name) }}" required>
                    </div>

                    {{-- Existing Logo --}}
                    @if ($organization->logo)
                        <div class="mb-3">
                            <label class="form-label">Current Logo</label><br>
                            <img src="{{ asset('images/organizations/' . $organization->logo) }}" alt="Logo"
                                style="max-height:80px">
                        </div>
                    @endif

                    {{-- Replace Logo --}}
                    <div class="mb-3">
                        <label class="form-label">Change Logo</label>
                        <input type="file" name="logo" class="form-control">
                        <small class="text-muted">Leave empty to keep current logo</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $organization->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" @selected($organization->status === 'active')>Active</option>
                            <option value="inactive" @selected($organization->status === 'inactive')>Inactive</option>
                        </select>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.organizations.index') }}" class="btn btn-secondary">
                            Back
                        </a>
                        <button class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
