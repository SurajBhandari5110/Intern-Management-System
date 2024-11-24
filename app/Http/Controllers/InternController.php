<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use TCG\Voyager\Models\Role; 
use Illuminate\Support\Facades\DB;

class InternController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user(); // Fetch the logged-in user
        return view('intern.dashboard', compact('user')); // Pass user data to the view
    }
    public function assignedCourses()
    {
        $user = Auth::user(); // Fetch the logged-in intern

        // Fetch distinct courses and TL names
        $distinctCourses = DB::table('intern_study_records')
            ->join('users as tl', 'intern_study_records.tl_id', '=', 'tl.id')
            ->select('intern_study_records.course', 'tl.name as tl_name')
            ->where('intern_study_records.intern_id', $user->id)
            ->distinct()
            ->get();

        return view('intern.assigned_courses', compact('distinctCourses'));
    }

    // Fetch course details and allow updates
    public function courseDetails($course)
    {
        $user = Auth::user(); // Fetch the logged-in intern

        // Fetch all topics for the given course
        $courseDetails = DB::table('intern_study_records')
            ->where('intern_id', $user->id)
            ->where('course', $course)
            ->get();

        return view('intern.course_details', compact('courseDetails', 'course'));
    }

    // Handle updates to the course data
    public function updateCourseDetails(Request $request, $course)
    {
        $user = Auth::user(); // Fetch the logged-in intern

        // Update each row based on the submitted data
        foreach ($request->data as $row) {
            DB::table('intern_study_records')
                ->where('id', $row['id'])
                ->where('intern_id', $user->id)
                ->update([
                    'status' => $row['status'],
                    'comment' => $row['comment'],
                ]);
        }

        return redirect()->route('intern.course.details', $course)->with('success', 'Course details updated successfully!');
    }



}