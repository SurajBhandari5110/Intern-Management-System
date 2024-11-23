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
        $tlId = auth()->id();
        $interns = TlInternAssignment::where('tl_id', $tlId)
            ->with('intern') // Assuming you have a relationship defined in the User model
            ->get();
        return view('tl.dashboard', compact('interns'));
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

        return redirect()->route('tl.interns.index')->with('success', 'Intern assigned successfully.');
    }
}



