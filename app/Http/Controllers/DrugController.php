<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DrugController extends Controller
{

    public function index()
{
    $drugs = Drug::all();

    return view('drugs.index', compact('drugs'));
}
    public function create()
    {
        return view('drugs.create');
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
}
