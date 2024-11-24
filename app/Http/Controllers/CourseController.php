<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
{
    $courses = Course::all(); // Fetch all courses
    return view('courses.index', compact('courses')); // Pass courses to the view
}

    public function view($id)
{
    // Fetch course by ID
    $course = Course::findOrFail($id);

    // Return a view with course data
    return view('courses.view', compact('course'));
}


    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
