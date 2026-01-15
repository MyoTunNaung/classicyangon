<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();


class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with(['user', 'organization'])->latest()->paginate(10);

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $users = User::where('status', 'active')->get();
        $organizations = Organization::where('status', 'active')->get();

        return view('admin.teachers.create', compact('users', 'organizations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'organization_id' => 'nullable|exists:organizations,id',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'user_id',
            'organization_id',
            'bio',
            'specialization',
            'contract_type',
            'status',
            'remark',
        ]);

        // Upload profile photo
        if ($request->hasFile('profile_photo')) {
            $fileName = time() . '_' . $request->profile_photo->getClientOriginalName();
            $request->profile_photo->move('images/teachers', $fileName);
            $data['profile_photo'] = $fileName;
        }

        $data['created_by'] = auth()->id();

        Teacher::create($data);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher)
    {
        $users = User::where('status', 'active')->get();
        $organizations = Organization::where('status', 'active')->get();

        return view('admin.teachers.edit', compact(
            'teacher',
            'users',
            'organizations'
        ));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'organization_id' => 'nullable|exists:organizations,id',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'user_id',
            'organization_id',
            'bio',
            'specialization',
            'contract_type',
            'status',
            'remark',
        ]);

        // Replace profile photo if new uploaded
        if ($request->hasFile('profile_photo')) {

            // Delete old photo
            if (
                $teacher->profile_photo &&
                File::exists('images/teachers/' . $teacher->profile_photo)
            ) {
                File::delete('images/teachers/' . $teacher->profile_photo);
            }

            $fileName = time() . '_' . $request->profile_photo->getClientOriginalName();
            $request->profile_photo->move('images/teachers', $fileName);
            $data['profile_photo'] = $fileName;
        }

        $data['updated_by'] = auth()->id();

        $teacher->update($data);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        // Delete profile photo
        if (
            $teacher->profile_photo &&
            File::exists('images/teachers/' . $teacher->profile_photo)
        ) {
            File::delete('images/teachers/' . $teacher->profile_photo);
        }

        $teacher->delete();

        return back()->with('success', 'Teacher deleted successfully.');
    }
}
