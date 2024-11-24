<?php

namespace App\Http\Controllers;

use App\Models\AssignedCourse;
use App\Models\StudyMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class TeamLeaderController extends Controller
{
    public function assignCourseForm()
    {
        $interns = DB::table('users')->where('role', 'intern')->get(); // Example intern retrieval
        $courses = StudyMaterial::all();

        return view('tl.assign_course', compact('interns', 'courses'));
    }
    public function showTeamLeaderPage()
{
    // Fetch the course details, assuming each TL has a related course.
    $course = Course::first();  // Or any logic to get the specific course related to the TL

    // Pass the course to the view
    return view('tl.assign_course.blade', compact('course'));  // Adjust 'tl.page' to your actual view name
}


    public function assignCourse(Request $request)
    {
        $request->validate([
            'intern_id' => 'required|exists:users,id',
            'table_name' => 'required|exists:study_material,table_name',
        ]);

        AssignedCourse::create([
            'intern_id' => $request->intern_id,
            'table_name' => $request->table_name,
            'assigned_at' => now(),
        ]);

        return back()->with('success', 'Course assigned successfully.');
    }

    public function viewProgress($tableName, $internId)
    {
        $progress = DB::table('intern_topic_status')
            ->join($tableName, "$tableName.id", '=', 'intern_topic_status.topic_id')
            ->where('intern_topic_status.intern_id', $internId)
            ->where('intern_topic_status.table_name', $tableName)
            ->get(['topic_name', 'status', 'remarks']);

        return view('tl.view_progress', compact('progress', 'tableName'));
    }
}

