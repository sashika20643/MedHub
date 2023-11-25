<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Prescription;
use App\Models\Drug;
use App\Mail\QuotationMail;
use Illuminate\Support\Facades\Mail;



class QuotationController extends Controller
{
    public function index()
{
    $prescriptions = Prescription::with('quotation')->get();

    return view('admin.Qutation.index', compact('prescriptions'));
}

public function create($id)

{
     $prescription= Prescription::where('id',$id)->get()->first();
     $drugs=Drug::all();
    return view('admin.Qutation.addQuotation', compact('prescription','drugs'));
}


public function store(Request $request)
    {
        $request->validate([
            'quotation' => 'required|string',
        ]);
        $prescription=Prescription::find($request->id);
        Quotation::create([
            'prescription_id' => $prescription->id,
            'quotation' => $request->input('quotation'),
        ]);

        // Update the prescription status to 'quotation_sent'
        $prescription->update(['status' => 'quotation_sent']);
        $userEmail=$prescription->user->email;

        Mail::to($userEmail)->send(new QuotationMail(['quotationData' => $request->input('quotation')]));

        return redirect()->route('dashboard')->with('success', 'Quotation added successfully.');
    }

    function userQuotation($id){
        $quotation = Quotation::where('prescription_id',$id)->first();
        return view('User.quotation',compact('quotation'));

    }
    function QuotationApprove($id){
        $quotation = Quotation::find($id);

        if (!$quotation) {
            return redirect()->back()->with('error', 'Quotation not found.');
        }

        $quotation->status = "approved";
        $quotation->save();

        return redirect()->back();


    }
    function QuotationReject($id){
        $prescription=Quotation::find($id);
        $prescription->status="rejected";
        $prescription->save();

        return redirect()->back();


    }

}
