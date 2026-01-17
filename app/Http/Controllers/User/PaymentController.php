<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Payment;
use App\Models\Course;
use App\Models\PaymentMethod;

use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function create(Course $course)
    {
        $paymentMethods = PaymentMethod::where('is_active', 1)->get();

        return view('user.payments.create', compact('course', 'paymentMethods'));
    }

    public function store(Request $request, Course $course)
    {
        /*
        |--------------------------------------------------------------------------
        | Validate Request
        |--------------------------------------------------------------------------
        */
        $request->validate([
            'payment_method'    => 'required|in:kbz_pay,wave_pay,bank_transfer',
            'amount'            => 'required|numeric|min:0',
            'transaction_id'    => 'required',
            'screenshot'        => 'nullable|image|max:4096', // 4MB
            'remark'            => 'nullable|string',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Prepare Data
        |--------------------------------------------------------------------------
        */
        $data = $request->only([
            'payment_method',
            'amount',
            'transaction_id',
            'remark',
        ]);

        $data['user_id']     = auth()->id();
        $data['course_id']   = $course->id;
        $data['currency']    = 'USD';
        $data['status']      = 'pending';
        $data['created_by']  = auth()->id();

        /*
        |--------------------------------------------------------------------------
        | Handle Payment Screenshot Upload (Optional)
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('screenshot')) {

            $filename = time() . '_' . Str::random(8) . '.' .
                        $request->screenshot->getClientOriginalExtension();

            $request->screenshot
                    ->move('images/payments', $filename);

            $data['screenshot'] = $filename;
        }

        /*
        |--------------------------------------------------------------------------
        | Create Payment Record
        |--------------------------------------------------------------------------
        */
        Payment::create($data);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */
        return redirect()
            ->route('user.courses.show', $course)
            ->with('success', 'Payment submitted successfully. Please wait for admin approval.');

    }
}

