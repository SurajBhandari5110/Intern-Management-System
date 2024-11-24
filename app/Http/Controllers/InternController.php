<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Models\User;
use Illuminate\Http\Request;

class InternController extends Controller
{
    public function index()
    {
        $interns = Intern::with('user')->get(); // Fetch all interns with user data
        return view('interns.index', compact('interns'));
    }

    public function create()
    {
        $users = User::all(); // Fetch all users for assigning an intern
        return view('interns.create', compact('users'));
    }
    public function updateStatus(Request $request, $id)
{
    $intern = Intern::findOrFail($id);

    // Toggle the task status
    $intern->task_status = $intern->task_status === 'completed' ? 'pending' : 'completed';
    $intern->save();

    return redirect()->back()->with('success', 'Task status updated successfully.');
}


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
        ]);

        Intern::create($request->all());
        return redirect()->route('interns.index')->with('success', 'Intern created successfully.');
    }

    public function destroy($id)
    {
        $intern = Intern::findOrFail($id);
        $intern->delete();
        return redirect()->route('interns.index')->with('success', 'Intern deleted successfully.');
    }
}
