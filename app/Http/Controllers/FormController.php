<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FormsExport;


use Yajra\DataTables\DataTables as DataTablesDataTables;

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

        // Check if the request is AJAX
        if ($request->ajax()) {
            return response()->json(['message' => 'Form data saved successfully']);
        }

        // If it's a regular form submission, redirect back
        return redirect()->back();
    }
    public function getDataTable()
    {
        $forms = Form::all();

        return DataTables::of($forms)
            ->addColumn('action', function ($formdata) {
                return '<button type="button" class="btn btn-danger delete-btn" data-id="' . $formdata->id . '">
                            <i class="fas fa-trash"></i> Delete
                        </button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function exportToExcel()
{
    return Excel::download(new FormsExport, 'forms.xlsx');
}
    public function showForm(){

        return view('demo');
    }

    public function showFront(){
        return view('front');
    }


public function show()
{
    $form = Form::all();

   return view('demo',compact('form'));
}
public function edit_rec($id)
{
    try {
        $form = Form::findOrFail($id);
        return response()->json($form);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


public function update_rec(Request $request, $id)
{
    try {
        // Find the record by ID
        $form = Form::findOrFail($id);


        // dd($form);
        // Update the record with the request data
        $form->name = $request->name;
        $form->f_name = $request->f_name;
        $form->number = $request->number;
        $form->address = $request->address;
        $form->save();

        return response()->json(['message' => 'Record updated successfully']);
    } catch (\Exception $e) {
        // Handle the exception (log or return an error response)
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



public function destroy($id)
{
    try{
        $formData = Form::find($id);
    $formData->delete();

    return response()->json(['message'=>'success']);
    }catch(\Exception $e){
    return response()->json(['message'=>$e->getMessage()]);

    }
}

}
