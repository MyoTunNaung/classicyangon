@extends('layouts.admin')

@section('content')
    <div class="container py-4">

        <h4 class="fw-bold mb-3">
            <i class="bi bi-credit-card me-1"></i>
            Payment Review
        </h4>

        <div class="card shadow-sm">
            <div class="card-body">

                {{-- Row 1: Information + Screenshot --}}
                <div class="row mb-4">

                    {{-- LEFT: Information --}}
                    <div class="col-md-6">

                        <p><strong>Student:</strong> {{ $payment->user->name }}</p>
                        <p><strong>Course:</strong> {{ $payment->course->title }}</p>

                        <p>
                            <strong>Amount:</strong>
                            {{ $payment->currency }} {{ number_format($payment->amount, 2) }}
                        </p>

                        <p><strong>Payment Method:</strong> {{ $payment->payment_method }}</p>

                        <p>
                            <strong>Transaction ID:</strong>
                            {{ $payment->transaction_id ?? '-' }}
                        </p>

                        <p>
                            <strong>Status:</strong>
                            <span
                                class="badge bg-{{ $payment->status === 'approved' ? 'success' : ($payment->status === 'rejected' ? 'danger' : 'warning') }}">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </p>

                        @if ($payment->remark)
                            <p><strong>Remark:</strong> {{ $payment->remark }}</p>
                        @endif

                    </div>

                    {{-- RIGHT: Screenshot --}}
                    <div class="col-md-6 text-center">
                        @if ($payment->screenshot)
                            <strong>Payment Screenshot</strong>
                            <img src="{{ asset('images/payments/' . $payment->screenshot) }}"
                                class="img-fluid rounded border mt-2" style="max-height: 300px">
                        @else
                            <p class="text-muted mt-4">No screenshot uploaded.</p>
                        @endif
                    </div>

                </div>

                {{-- Row 2: Remark + Action Buttons (Center) --}}
                @if ($payment->status === 'pending')
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-8">

                            <form method="POST" action="{{ route('admin.payments.update', $payment) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Admin Remark</label>
                                    <textarea name="remark" class="form-control" rows="2"></textarea>
                                </div>

                                <div class="d-flex justify-content-center gap-3">
                                    <button name="status" value="approved" class="btn btn-success">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Approve & Enroll
                                    </button>

                                    <button name="status" value="rejected" class="btn btn-danger">
                                        <i class="bi bi-x-circle me-1"></i>
                                        Reject
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                @endif

                {{-- Row 3: Back Button (Left) --}}
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('admin.payments.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>
                            Back to Payments
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
