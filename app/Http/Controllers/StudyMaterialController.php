<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\StudyMaterial;

class StudyMaterialController extends Controller
{
    // Dashboard with dropdown of study material tables
    

    // View specific table's data
    public function viewTable($table_name)
    {
        // Validate if the table_name exists in the studymaterial table
        $tableExists = StudyMaterial::where('table_name', $table_name)->exists();

        if (!$tableExists) {
            return redirect()->route('tl.dashboard')->with('error', 'Invalid table name selected.');
        }

        // Fetch all data from the specified table dynamically
        $data = DB::table($table_name)->get();

        return view('study_material.view', compact('data', 'table_name'));
    }
}
