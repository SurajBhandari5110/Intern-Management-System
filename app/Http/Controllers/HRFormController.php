<?php
namespace App\Http\Controllers;

use App\Models\HrForm1;
use App\Models\HrForm2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HRFormController extends Controller
{
    public function showHRForm()
    {
        return view('intern.hr-form');
    }

    public function submitHRForm1(Request $request)
    {
        $validated = $request->validate([
            'marksheet_12th' => 'nullable|file|mimes:jpeg,png,pdf',
            'marksheet_10th' => 'nullable|file|mimes:jpeg,png,pdf',
            'adhar_card' => 'nullable|file|mimes:jpeg,png,pdf',
            'photo' => 'nullable|file|mimes:jpeg,png',
            'degree' => 'nullable|file|mimes:jpeg,png,pdf',
            'sign_offerletter' => 'nullable|file|mimes:jpeg,png,pdf',
        ]);

        $data = [
            'inter_id' => Auth::id(),
            'hr_id' => 7, // Replace with actual HR ID if applicable
        ];

        foreach ($validated as $key => $value) {
            if ($request->hasFile($key)) {
                $data[$key] = file_get_contents($request->file($key));
            }
        }

        HrForm1::create($data);
        return redirect()->back()->with('success', 'Form 1 submitted successfully!');
    }

    public function submitHRForm2(Request $request)
    {
        $validated = $request->validate([
            'bankDetails' => 'required|integer',
            'collegeName' => 'required|integer',
            'phone_Placementcell' => 'required|integer',
            'NOC' => 'required|integer',
            'Refer_a_friend' => 'nullable|file|mimes:jpeg,png,pdf',
        ]);

        $data = $request->except('Refer_a_friend');
        $data['inter_id'] = Auth::id();
        $data['hr_id'] = 1; // Replace with actual HR ID

        if ($request->hasFile('Refer_a_friend')) {
            $data['Refer_a_friend'] = file_get_contents($request->file('Refer_a_friend'));
        }

        HrForm2::create($data);
        return redirect()->back()->with('success', 'Form 2 submitted successfully!');
    }
}
