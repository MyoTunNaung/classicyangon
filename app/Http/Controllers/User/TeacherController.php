<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with(['user', 'organization'])
            ->where('status', 'active')
            ->get();

        return view('user.teachers.index', compact('teachers'));
    }

    public function show(Teacher $teacher)
    {
        return view('user.teachers.show', compact('teacher'));
    }
}
