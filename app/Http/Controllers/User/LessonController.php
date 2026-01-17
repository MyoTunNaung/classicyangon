<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class LessonController extends Controller
{
    /**
     * Show lessons for a specific course
     */
    public function index(Course $course)
    {
        $lessons = Lesson::where('course_id', $course->id)
            ->where('status', 'active')
            ->orderBy('lesson_order')
            ->paginate(10);

        $isEnrolled = auth()->check()
            ? $course->enrollments()
                ->where('user_id', auth()->id())
                ->where('status', 'active')
                ->exists()
            : false;

        return view('user.lessons.index', compact('course', 'lessons', 'isEnrolled'));
    }

    /**
     * Show a single lesson
     */
    public function show(Course $course, Lesson $lesson)
    {
        // Optional safety check (recommended)
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        return view('user.lessons.show', compact('course', 'lesson'));
    }
}
