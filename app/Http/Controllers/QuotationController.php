<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Prescription;


class QuotationController extends Controller
{
    public function index()
{
    $prescriptions = Prescription::all();

    return view('admin.Qutation.index', compact('prescriptions'));
}
}
