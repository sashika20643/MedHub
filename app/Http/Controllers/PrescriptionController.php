<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;

class PrescriptionController extends Controller
{
    //

    public function showUploadForm()
    {
        return view('user.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'prescription_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the prescription file
        $prescriptionFile = $request->file('prescription_file');
        $prescriptionFileName = time() . '_' . $prescriptionFile->getClientOriginalName();
        $prescriptionFile->storeAs('prescriptions', $prescriptionFileName, 'public');

        // Create the prescription record in the database
        Prescription::create([
            'user_id' => auth()->user()->id,
            'description' => $request->input('description'),
            'prescription_file' => $prescriptionFileName,
            'status' => 'uploaded',
        ]);

        return redirect()->route('dashboard')->with('success', 'Prescription uploaded successfully.');
    }


    public function show()
{
    $uploadedPrescriptions=Prescription::where('user_id',auth()->user()->id)->get();
    return view('user.all_prescriptions', compact('uploadedPrescriptions'));
}
}
