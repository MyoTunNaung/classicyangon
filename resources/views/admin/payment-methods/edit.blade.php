@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <h4 class="fw-bold mb-3">
                <i class="bi bi-pencil-square me-1"></i>
                Edit Payment Method
            </h4>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">

                    <form method="POST"
                          action="{{ route('admin.payment-methods.update', $paymentMethod) }}"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Name <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', $paymentMethod->name) }}"
                                   required>
                        </div>

                        {{-- Code --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Code <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   name="code"
                                   class="form-control"
                                   value="{{ old('code', $paymentMethod->code) }}"
                                   required>
                            <small class="text-muted">
                                Unique identifier (do not change if already used).
                            </small>
                        </div>

                        {{-- Type --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Type <span class="text-danger">*</span>
                            </label>
                            <select name="type" class="form-select" required>
                                <option value="">Select Type</option>
                                <option value="qr"
                                    {{ old('type', $paymentMethod->type) == 'qr' ? 'selected' : '' }}>
                                    QR Payment
                                </option>
                                <option value="bank"
                                    {{ old('type', $paymentMethod->type) == 'bank' ? 'selected' : '' }}>
                                    Bank Transfer
                                </option>
                                <option value="online"
                                    {{ old('type', $paymentMethod->type) == 'online' ? 'selected' : '' }}>
                                    Online Gateway
                                </option>
                            </select>
                        </div>

                        <hr>

                        {{-- Bank Name --}}
                        <div class="mb-3">
                            <label class="form-label">Bank Name</label>
                            <input type="text"
                                   name="bank_name"
                                   class="form-control"
                                   value="{{ old('bank_name', $paymentMethod->bank_name) }}">
                        </div>

                        {{-- Account Name --}}
                        <div class="mb-3">
                            <label class="form-label">Account Name</label>
                            <input type="text"
                                   name="account_name"
                                   class="form-control"
                                   value="{{ old('account_name', $paymentMethod->account_name) }}">
                        </div>

                        {{-- Account Number --}}
                        <div class="mb-3">
                            <label class="form-label">Account Number</label>
                            <input type="text"
                                   name="account_number"
                                   class="form-control"
                                   value="{{ old('account_number', $paymentMethod->account_number) }}">
                        </div>

                        {{-- QR Image --}}
                        <div class="mb-3">
                            <label class="form-label">QR Image</label>
                            <input type="file"
                                   name="qr_image"
                                   class="form-control"
                                   accept="image/*">

                            @if ($paymentMethod->qr_image)
                                <div class="mt-2">
                                    <small class="text-muted d-block mb-1">
                                        Current QR Image:
                                    </small>
                                    <img src="{{ asset('images/payment-methods/' . $paymentMethod->qr_image) }}"
                                         class="img-fluid rounded border"
                                         style="max-height: 200px">
                                </div>
                            @endif
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description"
                                      rows="3"
                                      class="form-control">{{ old('description', $paymentMethod->description) }}</textarea>
                        </div>

                        {{-- Active --}}
                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', $paymentMethod->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold">
                                Active
                            </label>
                        </div>

                        {{-- Actions --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.payment-methods.index') }}"
                               class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>
                                Back
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i>
                                Update Payment Method
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
