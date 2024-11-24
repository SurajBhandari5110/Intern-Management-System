<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use TCG\Voyager\Models\Role; 
use App\Models\StudyMaterial;
use App\Models\TlInternAssignment;
use Illuminate\Support\Facades\DB;
use App\Models\InternStudyRecord;
use Illuminate\Support\Facades\Schema;

class TlInternAssignmentController extends Controller


{
    // Show all interns assigned to the logged-in TL
    public function index()
    {
        $user = Auth::user(); 
        $tlId = auth()->id();
        $interns = TLInternAssignment::where('tl_id', $tlId)
            ->with('intern') // Assuming you have a relationship defined in the User model
            ->get();
        return view('tl.index', compact('interns','user'));
    }
    
    // Show a form to assign a new intern
    public function create()
    {
        $interns = User::where('role', 'intern')->get(); // Filter interns from the User table
        return view('tl.assign', compact('interns'));
    }

    public function dashboard()
    {
        $user = Auth::user(); // Fetch the logged-in TL
    
        // Fetch interns assigned to the logged-in TL
        $assignments = TlInternAssignment::with('intern')  // Assuming `intern` is the relationship method in the `TlInternAssignment` model
            ->where('tl_id', $user->id)
            ->get();
    
        // Fetch all available interns who are not yet assigned to the TL
        $interns = User::whereHas('roles', function($query) {
            $query->where('name', 'intern'); // Ensure the role name is 'intern'
        })
        ->whereNotIn('id', $assignments->pluck('intern_id')) // Exclude already assigned interns
        ->get();
    
        // Fetch logged-in TL data
        $tlData = User::find($user->id); // Get the TL details (Name, Email, Image)
    
        // Fetch study materials
        $materials = StudyMaterial::all(); // Assuming StudyMaterial model is mapped to the studymaterial table
    
        return view('tl.dashboard', compact('user', 'assignments', 'interns', 'tlData', 'materials'));
    }
    



public function viewTable($tableName)
{
    

    // Fetch all data from the table
    $data = collect(DB::table($tableName)->get())->map(fn($item) => (array) $item);

    // Pass the data to the view
    return view('study-material.view', compact('data', 'tableName'));
}


    
    

    

    

    // Assign a new intern
    public function store(Request $request)
    {
        $request->validate([
            'intern_id' => 'required|exists:users,id',
        ]);

        TlInternAssignment::create([
            'tl_id' => auth()->id(),
            'intern_id' => $request->intern_id,
        ]);

        return redirect()->route('tl.dashboard')->with('success', 'Intern assigned successfully.');
    }
    public function destroy($internId)
    {
        $user = Auth::user(); // Get logged-in TL's data
        $assignment = TlInternAssignment::where('tl_id', $user->id)
            ->where('intern_id', $internId) // Find the intern assigned to this TL
            ->first();

        if ($assignment) {
            $assignment->delete(); // Remove the intern assignment
            return redirect()->route('tl.dashboard')->with('success', 'Intern removed successfully.');
        } else {
            return redirect()->route('tl.dashboard')->with('error', 'Intern not found.');
        }
    
    }
    public function viewStudyProgress($internId)
{
    $progress = InternStudyRecord::where('intern_id', $internId)->get();
    return view('tl.study_progress', compact('progress'));
}
public function sendStudyMaterialToIntern(Request $request)
{
    $request->validate([
        'table_name' => 'required|string', // This is the course name, e.g., 'python'
        'intern_id' => 'required|exists:users,id',
    ]);

    $tableName = $request->table_name; // e.g., 'python'
    $internId = $request->intern_id;
    $tlId = auth()->id(); // Logged-in TL ID

    // Check if the table exists in the database
    if (!Schema::hasTable($tableName)) {
        return redirect()->back()->with('error', 'The specified course table does not exist.');
    }

    // Fetch all topics from the specified course table
    $courseData = DB::table($tableName)->get();

    if ($courseData->isEmpty()) {
        return redirect()->back()->with('error', 'No topics found in the specified course.');
    }

    // Prepare data for insertion into `intern_study_records`
    $insertData = $courseData->map(function ($topic) use ($tlId, $internId, $tableName) {
        return [
            'tl_id' => $tlId,
            'intern_id' => $internId,
            'course' => $tableName, // The course name (e.g., 'python')
            'topic_id' => $topic->topic_id, // Assuming `topic_id` exists in the course table
            'topic' => $topic->topic, // Assuming `topic` exists in the course table
            'status' => null, // Default value
            'comment' => null, // Default value
            'link' => $topic->link, // Assuming each topic in the course table has a `link` field
            'created_at' => now(),
            'updated_at' => now(),
        ];
    })->toArray();

    // Insert data into the `intern_study_records` table
    DB::table('intern_study_records')->insert($insertData);

    return redirect()->back()->with('success', 'Study material sent successfully to the intern.');
}

public function trackPerformance(Request $request)
{
    $user = Auth::user(); // Logged-in TL
    $tlId = $user->id;

    // Fetch assigned interns for the dropdown
    $interns = TlInternAssignment::where('tl_id', $tlId)
        ->with('intern') // Assuming a relationship is defined in the `TlInternAssignment` model
        ->get();

    // Fetch courses for the dropdown
    $courses = StudyMaterial::pluck('table_name'); // Assuming `table_name` holds course names

    $records = [];

    // If form is submitted, fetch data
    if ($request->has(['intern_id', 'course'])) {
        $internId = $request->intern_id;
        $course = $request->course;

        $records = DB::table('intern_study_records')
            ->where('tl_id', $tlId)
            ->where('intern_id', $internId)
            ->where('course', $course)
            ->get();
    }

    return view('tl.track-performance', compact('interns', 'courses', 'records'));
}





}



