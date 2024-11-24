<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    // Display the intern progress page
    public function view()
    {
        // Fetch all the interns and their progress (this is just an example)
        $interns = Intern::with('progress')->get(); // Assuming you have a progress relationship in the Intern model

        return view('intern_progress', compact('interns'));
    }
}
