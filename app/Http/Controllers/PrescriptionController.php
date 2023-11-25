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
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'max:5'
        ]);
        $prescription =Prescription::create([
            'user_id' => auth()->user()->id,
            'description' => $request->input('description'),
            'status' => 'uploaded',

        ]);

        if ($request->hasFile('images')) {
            $imageCount = 0;


            foreach ($request->file('images') as $image) {
                if ($imageCount < 5) {
                    $path = $image->store('prescriptions', 'public');
                    $prescription->images()->create(['path' => $path]);
                    $imageCount++;
                } else {
                    break; // Break the loop if the maximum number of images is reached
                }
            }
        }



        return redirect()->route('dashboard')->with('success', 'Prescription uploaded successfully.');
    }


    public function show()
{
    $uploadedPrescriptions=Prescription::where('user_id',auth()->user()->id)->get();
    return view('user.all_prescriptions', compact('uploadedPrescriptions'));
}
}
