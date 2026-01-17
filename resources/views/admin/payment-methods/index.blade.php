@extends('layouts.admin')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">
            <i class="bi bi-credit-card me-1"></i>
            Payment Methods
        </h4>

        <a href="{{ route('admin.payment-methods.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Add Payment Method
        </a>
    </div>

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Account / QR</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($paymentMethods as $method)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        {{-- Name --}}
                        <td class="fw-semibold">
                            {{ $method->name }}
                        </td>

                        {{-- Code --}}
                        <td>
                            <code>{{ $method->code }}</code>
                        </td>

                        {{-- Type --}}
                        <td>
                            <span class="badge bg-secondary">
                                {{ strtoupper($method->type) }}
                            </span>
                        </td>

                        {{-- Account / QR --}}
                        <td>
                            @if ($method->type === 'qr' && $method->qr_image)
                                <img src="{{ asset('images/payment-methods/' . $method->qr_image) }}"
                                     style="max-height: 40px"
                                     class="rounded border">
                            @elseif ($method->type === 'bank')
                                <small class="text-muted d-block">
                                    {{ $method->bank_name }}
                                </small>
                                <small>
                                    {{ $method->account_name }}<br>
                                    {{ $method->account_number }}
                                </small>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>

                        {{-- Status --}}
                        <td>
                            <span class="badge {{ $method->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $method->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        {{-- Actions --}}
                        <td class="text-end">
                            <div class="d-inline-flex gap-1">

                                {{-- Toggle Active / Inactive --}}
                                <form method="POST"
                                      action="{{ route('admin.payment-methods.toggle', $method) }}">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="btn btn-sm
                                            {{ $method->is_active ? 'btn-success' : 'btn-outline-secondary' }}">
                                        <i class="bi {{ $method->is_active ? 'bi-check-circle' : 'bi-slash-circle' }}"></i>
                                        {{ $method->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>

                                {{-- Edit --}}
                                <a href="{{ route('admin.payment-methods.edit', $method) }}"
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form method="POST"
                                      action="{{ route('admin.payment-methods.destroy', $method) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this payment method?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            No payment methods found.
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection
