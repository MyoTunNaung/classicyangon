<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\Teacher;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;

use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create', [
            'categories' => Category::where('status','active')->get(),
            'teachers' => Teacher::all(),
            'organizations' => Organization::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'category_id'   => 'required',
            'cover_photo'   => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'title',
            'category_id',
            'teacher_id',
            'organization_id',
            'price',
            'status',
            'remark',
        ]);

        $data['slug'] = Str::slug($request->title . '-' . $request->category_id);
        $data['created_by'] = auth()->id();


        if ($request->hasFile('cover_photo')) {
            $name = time() . '_' . $request->cover_photo->getClientOriginalName();
            $request->cover_photo->move('images/courses', $name);
            $data['cover_photo'] = $name;
        }


        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success','Course created');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', [
            'course' => $course,
            'categories' => Category::all(),
            'teachers' => Teacher::all(),
            'organizations' => Organization::all(),
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->all();
        $data['updated_by'] = auth()->id();

        if ($request->hasFile('cover_photo')) {
            if ($course->cover_photo && File::exists('images/courses/'.$course->cover_photo)) {
                File::delete('images/courses/'.$course->cover_photo);
            }

            $name = time().'_'.$request->cover_photo->getClientOriginalName();
            $request->cover_photo->move('images/courses', $name);
            $data['cover_photo'] = $name;
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success','Course updated');
    }

    public function destroy(Course $course)
    {
        if ($course->cover_photo && File::exists('images/courses/'.$course->cover_photo)) {
            File::delete('images/courses/'.$course->cover_photo);
        }

        $course->delete();
        return back()->with('success','Course deleted');
    }
}

