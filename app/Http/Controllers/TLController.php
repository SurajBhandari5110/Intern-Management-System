<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use TCG\Voyager\Models\Role; 
class TLController extends Controller
{
    public function dashboard() {
        // Fetch interns assigned to this TL
        $interns = User::where('assigned_tl_id', Auth::id())->get();
        return view('tl.dashboard', compact('interns'));
    }
}
