<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Enroll in Course
    |--------------------------------------------------------------------------
    */
    public function store(Course $course)
    {
        Enrollment::firstOrCreate(
            [
                'user_id'   => auth()->id(),
                'course_id' => $course->id,
            ],
            [
                'status'     => 'active',
                'created_by' => auth()->id(),
            ]
        );

        return redirect()
            ->route('user.lessons.index', $course)
            ->with('success', 'You are now enrolled in this course.');
    }

    public function show(Course $course)
    {
        $enrollment = Enrollment::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->firstOrFail();

        return view('user.enrollments.show', compact('course', 'enrollment'));
    }

    public function destroy(Course $course)
    {
        Enrollment::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->delete();

        return redirect()
            ->route('user.courses.show', $course)
            ->with('success', 'You have unenrolled from this course.');
    }


    /*
    |--------------------------------------------------------------------------
    | My Courses
    |--------------------------------------------------------------------------
    */
    public function myCourses()
    {
        $courses = auth()->user()
            ->enrolledCourses()
            ->paginate(12);

        return view('user.enrollments.my-courses', compact('courses'));
    }
}
