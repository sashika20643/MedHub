<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DrugController extends Controller
{

    public function index()
{
    $drugs = Drug::all();

    return view('Admin.drugs.index', compact('drugs'));
}
    public function create()
    {
        return view('Admin.drugs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        Drug::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Drug added successfully.');
    }

    public function destroy(Drug $drug)
{
    $drug->delete();


    return redirect()->route('admin.drugs.index')->with('success', 'Drug deleted successfully.');
}

}
