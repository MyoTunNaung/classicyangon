<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Teacher;
use App\Models\Organization;

use App\Models\Enrollment;
use App\Models\Payment;

use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::with(['category', 'organization', 'teacher.user'])
            ->where('status', 'active')
            ->when($request->category_id, fn ($q) =>
                $q->where('category_id', $request->category_id)
            )
            ->when($request->teacher_id, fn ($q) =>
                $q->where('teacher_id', $request->teacher_id)
            )
            ->when($request->organization_id, fn ($q) =>
                $q->where('organization_id', $request->organization_id)
            )
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();
        $teachers = Teacher::with('user')->get();
        $organizations = Organization::orderBy('name')->get();

        return view('user.courses.index', compact(
            'courses',
            'categories',
            'teachers',
            'organizations'
        ));
    }


    public function show(Course $course)
    {
        $enrollment = null;
        $payment = null;

        if (auth()->check()) {

            // Check enrollment
            $enrollment = Enrollment::where('user_id', auth()->id())
                ->where('course_id', $course->id)
                ->first();

            // Get latest payment (if any)
            $payment = Payment::where('user_id', auth()->id())
                ->where('course_id', $course->id)
                ->latest()
                ->first();
        }

        return view('user.courses.show', compact(
            'course',
            'enrollment',
            'payment'
        ));
    }

}
