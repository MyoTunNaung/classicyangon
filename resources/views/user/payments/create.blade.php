@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <h4 class="fw-bold mb-3">
                    <i class="bi bi-credit-card me-1"></i>
                    Course Payment
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

                {{-- Course Info --}}
                <div class="card mb-3">
                    <div class="card-body">

                        <h5 class="fw-bold mb-1">{{ $course->title }}</h5>

                        <p class="text-muted mb-2">
                            Category: {{ $course->category?->name }}
                        </p>

                        <p class="fw-bold fs-5 mb-0">
                            Amount:
                            <span class="text-primary">
                                {{ $course->price > 0 ? '$' . number_format($course->price, 2) : 'Free' }}
                            </span>
                        </p>

                    </div>
                </div>

                {{-- Payment Form --}}
                <div class="card shadow-sm">
                    <div class="card-body">

                        <form method="POST" action="{{ route('user.payments.store', $course) }}"
                            enctype="multipart/form-data">

                            @csrf


                            {{-- Amount (Hidden - IMPORTANT) --}}
                            <input type="hidden" name="amount" value="{{ $course->price }}">

                            {{-- Currency --}}
                            <input type="hidden" name="currency" value="USD">


                            {{-- Payment Method --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    Payment Method <span class="text-danger">*</span>
                                </label>

                                <select name="payment_method" id="payment_method" class="form-select" required>
                                    <option value="">Select Payment Method</option>

                                    @foreach ($paymentMethods as $method)
                                        <option value="{{ $method->code }}" data-type="{{ $method->type }}"
                                            data-qr="{{ $method->qr_image ? asset('images/payment-methods/' . $method->qr_image) : '' }}"
                                            data-bank-name="{{ $method->bank_name }}"
                                            data-account-name="{{ $method->account_name }}"
                                            data-account-number="{{ $method->account_number }}">
                                            {{ $method->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <small class="text-muted">
                                    Choose your preferred payment method.
                                </small>
                            </div>

                            {{-- Payment Method Details --}}
                            <div id="paymentDetails" class="mt-3 d-none">

                                {{-- QR Code --}}
                                <div id="qrSection" class="text-center d-none">
                                    <p class="fw-bold mb-2">Scan QR Code</p>
                                    <img id="qrImage" src="" class="img-fluid rounded border"
                                        style="max-height: 250px">
                                </div>

                                {{-- Bank Info --}}
                                <div id="bankSection" class="d-none">
                                    <p class="fw-bold mb-1">Bank Transfer Information</p>

                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong >Bank Name:</strong> <span id="bankName" class="text-primary"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong >Account Name:</strong> <span id="accountName" class="text-primary"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong >Account Number:</strong> <span id="accountNumber" class="text-primary"></span>
                                        </li>
                                    </ul>
                                </div>

                            </div>


                            {{-- Transaction ID (Optional) --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Transaction ID
                                    <small class="text-muted">(optional)</small>
                                </label>

                                <input type="text" name="transaction_id" class="form-control"
                                    placeholder="e.g. KBZ123456789">
                            </div>

                            {{-- Screenshot Upload --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    Payment Screenshot <span class="text-danger">*</span>
                                </label>

                                <input type="file" name="screenshot" class="form-control" accept="image/*" required>

                                <small class="text-muted">
                                    Upload screenshot of your payment (JPG / PNG).
                                </small>
                            </div>

                            {{-- Remark --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Remark
                                    <small class="text-muted">(optional)</small>
                                </label>

                                <textarea name="remark" rows="3" class="form-control" placeholder="Any note for admin..."></textarea>
                            </div>

                            {{-- Submit --}}
                            <div class="d-flex justify-content-between">

                                <a href="{{ route('user.courses.show', $course) }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-1"></i>
                                    Back
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-upload me-1"></i>
                                    Submit Payment
                                </button>

                            </div>

                        </form>

                    </div>
                </div>

                {{-- Info --}}
                <div class="alert alert-info mt-3 small">
                    <i class="bi bi-info-circle me-1"></i>
                    After submitting payment, admin will review and approve your enrollment.
                </div>

            </div>

        </div>

    </div>



    <script>
        document.getElementById('payment_method').addEventListener('change', function () {

            const selected = this.options[this.selectedIndex];

            const type = selected.dataset.type;
            const qr = selected.dataset.qr;

            const bankName = selected.dataset.bankName;
            const accountName = selected.dataset.accountName;
            const accountNumber = selected.dataset.accountNumber;

            const details = document.getElementById('paymentDetails');
            const qrSection = document.getElementById('qrSection');
            const bankSection = document.getElementById('bankSection');

            // Reset
            details.classList.add('d-none');
            qrSection.classList.add('d-none');
            bankSection.classList.add('d-none');

            if (!type) return;

            details.classList.remove('d-none');

            if (type === 'qr' && qr) {
                document.getElementById('qrImage').src = qr;
                qrSection.classList.remove('d-none');
            }

            if (type === 'bank') {
                document.getElementById('bankName').innerText = bankName;
                document.getElementById('accountName').innerText = accountName;
                document.getElementById('accountNumber').innerText = accountNumber;
                bankSection.classList.remove('d-none');
            }
        });
    </script>



@endsection
