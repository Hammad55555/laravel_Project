<?php

namespace App\Http\Controllers;

use App\Models\Charts;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function showTable()
    {
        $data = Charts::all();

        return view('welcome', compact('data'));
    }

    public function insertData(Request $request)
    {
        $validatedData = $request->validate([
            'starting_amount' => 'required',
            'total_contribution' => 'required',
            'total_interest_earned' => 'required',
            // Add validation rules for other columns if needed
        ]);

        Charts::create($validatedData);

        return redirect('/table')->with('success', 'Data inserted successfully');
    }
    public function demo(){
        $data = Charts::all();

        return view('demo', compact('data'));
    }
}
