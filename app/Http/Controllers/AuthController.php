<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Role; 

class AuthController extends Controller
{
    // Show login page
    public function index() {
        return view('auth.login'); // Ensure this view file exists
    }

    // Handle login logic
    public function login(Request $request) {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role->name == 'admin') {
                return redirect()->route('voyager.dashboard'); // Voyager admin panel
            } elseif ($user->role->name == 'team_leader') {
                return redirect()->route('tl.dashboard');
            } elseif ($user->role->name == 'intern') {
                return redirect()->route('intern.dashboard');
            }
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    // Handle logout
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
