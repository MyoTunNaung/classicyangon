<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['category', 'organization', 'teacher'])
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('user.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('user.courses.show', compact('course'));
    }
}
