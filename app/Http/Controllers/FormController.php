<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    //
    public function savedata(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'f_name' => 'required|string',
            'number' => 'required',
            'address' => 'required|string',
        ]);

        $form = new Form;
        $form->name = $validatedData['name'];
        $form->f_name = $validatedData['f_name'];
        $form->number = $validatedData['number'];
        $form->address = $validatedData['address'];

        $form->save();


        // return redirect('/form')->with('success', 'Form submitted successfully!');
        return view('demo');
    }
    public function showForm(){

        return view('demo');
    }
}
