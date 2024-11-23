<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use TCG\Voyager\Models\Role; 

class InternController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user(); // Fetch the logged-in user
        return view('intern.dashboard', compact('user')); // Pass user data to the view
    }
}
