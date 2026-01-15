<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();


class UserCourseController extends Controller
{
    /**
     * Display a listing of courses.
     */
    public function index(Request $request)
    {
        $courses = Course::with(['category', 'teacher', 'organization'])
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('user.courses.index', compact('courses'));
    }

    /**
     * Display the specified course.
     */
    public function show(Course $course)
    {
        // Optional safety check (only active courses)
        if ($course->status !== 'active') {
            abort(404);
        }

        $course->load(['category', 'teacher', 'organization']);

        return view('user.courses.show', compact('course'));
    }
}
