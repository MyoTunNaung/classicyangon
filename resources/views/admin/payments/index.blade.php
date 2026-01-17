@extends('layouts.admin')

@section('content')
<div class="container py-4">

    {{-- Page Title --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">
            <i class="bi bi-credit-card me-1"></i>
            Payments
        </h4>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Payments Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $index => $payment)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                {{ $payment->user?->name }}
                                <br>
                                <small class="text-muted">
                                    {{ $payment->user?->email }}
                                </small>
                            </td>

                            <td>
                                {{ $payment->course?->title }}
                            </td>

                            <td>
                                {{ number_format($payment->amount, 2) }}
                                {{ $payment->currency }}
                            </td>

                            <td>
                                {{ ucfirst($payment->payment_method) }}
                            </td>

                            <td>
                                @if ($payment->status === 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif ($payment->status === 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.payments.show', $payment) }}"
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- Approve --}}
                                @if ($payment->status === 'pending')
                                    <form action="{{ route('admin.payments.update', $payment) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="approved">
                                        <button class="btn btn-success btn-sm"
                                                onclick="return confirm('Approve this payment?')">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                    </form>

                                    {{-- Reject --}}
                                    <form action="{{ route('admin.payments.update', $payment) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="rejected">
                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Reject this payment?')">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                No payments found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $payments->links() }}
    </div>

</div>
@endsection
