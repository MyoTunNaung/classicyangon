<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Permission protection
        $this->middleware('permission:dashboard');
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
