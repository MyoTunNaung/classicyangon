@extends('layouts.admin')

@section('title', 'Create Teacher')

@section('content')
<div class="container">

    {{-- Page Header --}}
    <div class="row py-3">
        <div class="col">
            <h4 class="fw-bold mb-0">Create Teacher</h4>
            <small class="text-muted">Add a new teacher</small>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.teachers.store') }}"
                  enctype="multipart/form-data">
                @csrf

                {{-- User --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">User *</label>
                    <select name="user_id" class="form-select" required>
                        <option value="">-- Select User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Organization --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Organization</label>
                    <select name="organization_id" class="form-select">
                        <option value="">-- Optional --</option>
                        @foreach ($organizations as $org)
                            <option value="{{ $org->id }}"
                                {{ old('organization_id') == $org->id ? 'selected' : '' }}>
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
                           value="{{ old('specialization') }}"
                           placeholder="e.g. Mathematics, Physics">
                </div>

                {{-- Bio --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Bio</label>
                    <textarea name="bio"
                              rows="4"
                              class="form-control"
                              placeholder="Short teacher bio">{{ old('bio') }}</textarea>
                </div>

                {{-- Profile Photo --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Profile Photo</label>
                    <input type="file" name="profile_photo" class="form-control">
                </div>

                {{-- Contract Type --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Contract Type</label>
                    <select name="contract_type" class="form-select">
                        <option value="internal">Internal</option>
                        <option value="external">External</option>
                    </select>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                {{-- Remark --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Remark</label>
                    <textarea name="remark"
                              rows="2"
                              class="form-control">{{ old('remark') }}</textarea>
                </div>

                {{-- Actions --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.teachers.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        Save Teacher
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
