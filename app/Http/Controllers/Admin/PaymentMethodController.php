<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of payment methods.
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::latest()->get();

        return view('admin.payment-methods.index', compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new payment method.
     */
    public function create()
    {
        return view('admin.payment-methods.create');
    }

    /**
     * Store a newly created payment method.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:100',
            'code'            => 'required|string|max:50|unique:payment_methods,code',
            'type'            => 'required|in:qr,bank,online',
            'bank_name'       => 'nullable|string|max:100',
            'account_name'    => 'nullable|string|max:100',
            'account_number'  => 'nullable|string|max:100',
            'qr_image'        => 'nullable|image|max:2048',
            'description'     => 'nullable|string',
            'is_active'       => 'required|boolean',
        ]);

        $data = $request->only([
            'name',
            'code',
            'type',
            'bank_name',
            'account_name',
            'account_number',
            'description',
            'is_active',
        ]);

        $data['created_by'] = auth()->id();

        // Upload QR Image (if exists)
        if ($request->hasFile('qr_image')) {
            $filename = time() . '_' . $request->qr_image->getClientOriginalName();
            $request->qr_image->move('images/payment-methods', $filename);
            $data['qr_image'] = $filename;
        }

        PaymentMethod::create($data);

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Payment method created successfully.');
    }

    /**
     * Show the form for editing the specified payment method.
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return view('admin.payment-methods.edit', compact('paymentMethod'));
    }

    /**
     * Update the specified payment method.
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $request->validate([
            'name'            => 'required|string|max:100',
            'code'            => 'required|string|max:50|unique:payment_methods,code,' . $paymentMethod->id,
            'type'            => 'required|in:qr,bank,online',
            'bank_name'       => 'nullable|string|max:100',
            'account_name'    => 'nullable|string|max:100',
            'account_number'  => 'nullable|string|max:100',
            'qr_image'        => 'nullable|image|max:2048',
            'description'     => 'nullable|string',
            'is_active'       => 'required|boolean',
        ]);

        $data = $request->only([
            'name',
            'code',
            'type',
            'bank_name',
            'account_name',
            'account_number',
            'description',
            'is_active',
        ]);

        $data['updated_by'] = auth()->id();

        // Replace QR Image (if uploaded)
        if ($request->hasFile('qr_image')) {

            // Delete old image
            if ($paymentMethod->qr_image && file_exists(public_path('images/payment-methods/' . $paymentMethod->qr_image))) {
                unlink(public_path('images/payment-methods/' . $paymentMethod->qr_image));
            }

            $filename = time() . '_' . $request->qr_image->getClientOriginalName();
            $request->qr_image->move('images/payment-methods', $filename);
            $data['qr_image'] = $filename;
        }

        $paymentMethod->update($data);

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Payment method updated successfully.');
    }

    /**
     * Remove the specified payment method.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        // Delete QR image if exists
        if ($paymentMethod->qr_image && file_exists(public_path('images/payment-methods/' . $paymentMethod->qr_image))) {
            unlink(public_path('images/payment-methods/' . $paymentMethod->qr_image));
        }

        $paymentMethod->delete();

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Payment method deleted successfully.');
    }

    public function toggle(PaymentMethod $paymentMethod)
    {
        // Toggle active status
        $paymentMethod->is_active = ! $paymentMethod->is_active;

        // Track who updated
        $paymentMethod->updated_by = Auth::id();

        // Save changes
        $paymentMethod->save();

        // Flash message
        $message = $paymentMethod->is_active
            ? 'Payment method activated successfully.'
            : 'Payment method deactivated successfully.';

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', $message);
    }


}
