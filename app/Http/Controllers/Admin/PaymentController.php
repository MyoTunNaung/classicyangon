<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Payment;
use App\Models\Enrollment;

use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user', 'course'])
            ->latest()
            ->paginate(20);

        return view('admin.payments.index', compact('payments'));
    }

    public function show(Payment $payment)
    {
        $payment->load(['user', 'course']);

        return view('admin.payments.show', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        /*
        |--------------------------------------------------------------------------
        | Validate Input
        |--------------------------------------------------------------------------
        */
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'remark' => 'nullable|string|max:1000',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Prepare Update Data
        |--------------------------------------------------------------------------
        */
        $data = [
            'status'     => $request->status,
            'remark'     => $request->remark,
            'updated_by' => auth()->id(),
        ];

        // If approved, set paid_at
        if ($request->status === 'approved') {
            $data['paid_at'] = Carbon::now();
        } else {
            $data['paid_at'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Update Payment
        |--------------------------------------------------------------------------
        */
        $payment->update($data);

        /*
        |--------------------------------------------------------------------------
        | Auto Enroll User (ONLY when approved)
        |--------------------------------------------------------------------------
        */
        if ($request->status === 'approved') {

            Enrollment::firstOrCreate(
                [
                    'user_id'   => $payment->user_id,
                    'course_id' => $payment->course_id,
                ],
                [
                    'status'     => 'active',
                    'created_by' => auth()->id(),
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Redirect Back
        |--------------------------------------------------------------------------
        */
        return redirect()
            ->route('admin.payments.show', $payment)
            ->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()
            ->route('admin.payments.index')
            ->with('success', 'Payment deleted');
    }
}

