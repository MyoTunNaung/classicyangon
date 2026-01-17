<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['user', 'course'])
            ->latest()
            ->paginate(15);

        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function show(Enrollment $enrollment)
    {
        $enrollment->load(['user', 'course']);

        return view('admin.enrollments.show', compact('enrollment'));
    }


    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,inactive,completed,cancelled',
            'remark' => 'nullable|string',
        ]);

        $enrollment->update([
            'status'     => $validated['status'],
            'remark'     => $validated['remark'] ?? null,
            'updated_by' => auth()->id(),
        ]);

        return redirect()
            ->route('admin.enrollments.index')
            ->with('success', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()
            ->route('admin.enrollments.index')
            ->with('success', 'Enrollment removed successfully.');
    }
}
