<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::latest()->paginate(10);
        return view('admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        $users = User::where('status', 'active')->get();
        return view('admin.organizations.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'description','owner_id', 'status', 'remark']);

        // Upload logo
        if ($request->hasFile('logo')) {
            $logoName = time().'_'.$request->logo->getClientOriginalName();
            $request->logo->move('images/organizations', $logoName);
            $data['logo'] = $logoName;
        }

        $data['created_by'] = auth()->id();

        Organization::create($data);

        return redirect()
            ->route('admin.organizations.index')
            ->with('success', 'Organization created successfully');
    }


    public function edit($id)
    {
        $organization = Organization::findOrFail($id);
        $users = User::where('status', 'active')->get();

        return view('admin.organizations.edit', compact('organization', 'users'));
    }

    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'status', 'remark']);

        // Replace logo if new uploaded
        if ($request->hasFile('logo')) {

            // Delete old logo
            if ($organization->logo &&
                File::exists('images/organizations/'.$organization->logo)) {
                File::delete('images/organizations/'.$organization->logo);
            }

            $logoName = time().'_'.$request->logo->getClientOriginalName();
            $request->logo->move('images/organizations', $logoName);
            $data['logo'] = $logoName;
        }

        $data['updated_by'] = auth()->id();

        $organization->update($data);

        return redirect()
            ->route('admin.organizations.index')
            ->with('success', 'Organization updated successfully');
    }


    public function destroy($id)
    {
        // 1. Find organization first
        $organization = Organization::findOrFail($id);

        // 2. Delete logo file if exists
        if (
            $organization->logo &&
            File::exists('images/organizations/' . $organization->logo)
        ) {
            File::delete('images/organizations/' . $organization->logo);
        }

        // 3. Delete organization record
        $organization->delete();

        // 4. Redirect back
        return back()->with('success', 'Organization deleted successfully.');
    }

}
