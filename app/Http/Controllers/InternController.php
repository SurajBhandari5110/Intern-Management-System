<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use TCG\Voyager\Models\Role; 

class InternController extends Controller
{
    public function dashboard() {
        // Fetch available TLs
        $tls = User::where('id', Role::where('name', 'Team Leader')->first()->id)->get();
        return view('intern.dashboard', compact('tls'));
    }
}
