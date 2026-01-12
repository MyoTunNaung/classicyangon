<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::where('status', 'active')->paginate(12);
        return view('user.organizations.index', compact('organizations'));
    }

    public function show($id)
    {
        $organization = Organization::where('status', 'active')->findOrFail($id);
        return view('user.organizations.show', compact('organization'));
    }
}
