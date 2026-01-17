<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();


class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('course')->orderBy('lesson_order')->paginate(10);
        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $courses = Course::orderBy('title')->get();
        return view('admin.lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'course_id'    => 'required|exists:courses,id',
            'lesson_order' => 'nullable|integer|min:0',
            'is_free'      => 'required|boolean',
            'status'       => 'required|in:active,inactive',
            'content'      => 'nullable|string',
            'remark'       => 'nullable|string',

            'video_url'    => 'nullable|string',
            'video_file'   => 'nullable|file|mimes:mp4|max:102400', // 100MB
        ]);

        $videoPath = null;

        // 1️⃣ MP4 upload has priority
        if ($request->hasFile('video_file')) {

            $file = $request->file('video_file');

            $filename = uniqid('lesson_') . '.mp4';

            $file->move(
                public_path('videos/lessons'),
                $filename
            );

            $videoPath = 'videos/lessons/' . $filename;
        }
        // 2️⃣ Otherwise YouTube embed
        elseif (!empty($validated['video_url'])) {
            $videoPath = $validated['video_url'];
        }

        Lesson::create([
            'title'        => $validated['title'],
            'course_id'    => $validated['course_id'],
            'lesson_order' => $validated['lesson_order'] ?? 0,
            'is_free'      => $validated['is_free'],
            'status'       => $validated['status'],
            'content'      => $validated['content'] ?? null,
            'remark'       => $validated['remark'] ?? null,
            'video_url'    => $videoPath,
        ]);

        return redirect()
            ->route('admin.lessons.index')
            ->with('success', 'Lesson created successfully.');
    }


    public function edit(Lesson $lesson)
    {
        $courses = Course::orderBy('title')->get();
        return view('admin.lessons.edit', compact('lesson', 'courses'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'course_id'    => 'required|exists:courses,id',
            'lesson_order' => 'nullable|integer|min:0',
            'is_free'      => 'required|boolean',
            'status'       => 'required|in:active,inactive',
            'content'      => 'nullable|string',
            'remark'       => 'nullable|string',

            'video_url'    => 'nullable|string',
            'video_file'   => 'nullable|file|mimes:mp4|max:102400',
        ]);

        $videoPath = $lesson->video_url;

        if ($request->hasFile('video_file')) {

            $file = $request->file('video_file');
            $filename = uniqid('lesson_') . '.mp4';

            $file->move(
                public_path('videos/lessons'),
                $filename
            );

            $videoPath = 'videos/lessons/' . $filename;
        }
        elseif (!empty($validated['video_url'])) {
            $videoPath = $validated['video_url'];
        }

        $lesson->update([
            'title'        => $validated['title'],
            'course_id'    => $validated['course_id'],
            'lesson_order' => $validated['lesson_order'] ?? 0,
            'is_free'      => $validated['is_free'],
            'status'       => $validated['status'],
            'content'      => $validated['content'] ?? null,
            'remark'       => $validated['remark'] ?? null,
            'video_url'    => $videoPath,
            'updated_by'   => auth()->id(),
        ]);

        return redirect()
            ->route('admin.lessons.index')
            ->with('success', 'Lesson updated successfully.');
    }



    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return back()->with('success', 'Lesson deleted');
    }
}
