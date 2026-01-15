@extends('layouts.admin')

@section('title', 'Edit Teacher')

@section('content')
<div class="container">

    {{-- Page Header --}}
    <div class="row py-3">
        <div class="col">
            <h4 class="fw-bold mb-0">Edit Teacher</h4>
            <small class="text-muted">Update teacher information</small>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.teachers.update', $teacher->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- User (read-only) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">User</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $teacher->user->name }}"
                           readonly>
                </div>

                {{-- Organization --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Organization</label>
                    <select name="organization_id" class="form-select">
                        <option value="">-- Optional --</option>
                        @foreach ($organizations as $org)
                            <option value="{{ $org->id }}"
                                {{ $teacher->organization_id == $org->id ? 'selected' : '' }}>
                                {{ $org->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Specialization --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Specialization</label>
                    <input type="text"
                           name="specialization"
                           class="form-control"
                           value="{{ $teacher->specialization }}">
                </div>

                {{-- Bio --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Bio</label>
                    <textarea name="bio"
                              rows="4"
                              class="form-control">{{ $teacher->bio }}</textarea>
                </div>

                {{-- Profile Photo --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Profile Photo</label>

                    @if ($teacher->profile_photo)
                        <div class="mb-2">
                            <img src="{{ asset('images/teachers/' . $teacher->profile_photo) }}"
                                 height="60"
                                 class="rounded">
                        </div>
                    @endif

                    <input type="file" name="profile_photo" class="form-control">
                </div>

                {{-- Contract Type --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Contract Type</label>
                    <select name="contract_type" class="form-select">
                        <option value="internal"
                            {{ $teacher->contract_type === 'internal' ? 'selected' : '' }}>
                            Internal
                        </option>
                        <option value="external"
                            {{ $teacher->contract_type === 'external' ? 'selected' : '' }}>
                            External
                        </option>
                    </select>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="active"
                            {{ $teacher->status === 'active' ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="inactive"
                            {{ $teacher->status === 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                {{-- Remark --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Remark</label>
                    <textarea name="remark"
                              rows="2"
                              class="form-control">{{ $teacher->remark }}</textarea>
                </div>

                {{-- Actions --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.teachers.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        Update Teacher
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
