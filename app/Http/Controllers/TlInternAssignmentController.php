<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use TCG\Voyager\Models\Role; 
use App\Models\TlInternAssignment;
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
    public function dashboard()
{
    $user = Auth::user(); // Fetch the logged-in TL

    // Fetch interns assigned to the logged-in TL
    $assignments = TlInternAssignment::with('intern')  // Assuming `intern` is the relationship method in the `TlInternAssignment` model
        ->where('tl_id', $user->id)
        ->get();

    // Fetch all available interns who are not yet assigned to the TL
    $interns = User::whereHas('roles', function($query) {
        $query->where('name', 'intern'); // Replace 'intern' with the actual role name
    })
    ->whereNotIn('id', $assignments->pluck('intern_id'))
    ->get();

    // Fetch logged-in TL data
    $tlData = User::find($user->id);  // Get the TL details (Name, Email, Image)

    return view('tl.dashboard', compact('user','assignments', 'interns', 'tlData'));
}

    
    

    

    // Show a form to assign a new intern
    public function create()
    {
        $interns = User::where('role', 'intern')->get(); // Filter interns from the User table
        return view('tl.assign', compact('interns'));
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
}


