<?php

namespace App\Http\Controllers;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FormController extends Controller
{
    
    public function showForms()
    {
        // Assuming your model is named Form and it has a 'form_type' field
        $enrollmentForms = Form::where('form_type', 'Enrollment')->get();
        $requirementForms = Form::where('form_type', 'Requirements')->get();

        return view('admission', compact('enrollmentForms', 'requirementForms'));
    }

    public function downloadForm($formType)
    {
        // Assuming your model is named Form and it has a 'form_type' field
        $form = Form::where('form_type', $formType)->first();

        if (!$form) {
            abort(404, 'Form not found');
        }

        $filePath = public_path("images/{$form->form_file}");

        if (!File::exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath, $form->form_name);
    }
    public function showAddForm()
    {
        return view ('/add_form');
    }

    public function showManageForm()
    {
        return view ('/manage_forms');
    }




    public function getForm()
    {
        $forms = Form::all();
        return view('manage_forms', compact('forms'));
    }

    public function addForm(Request $request)
{
    $request->validate([
        'form_file' => 'required|mimes:pdf,doc,docx|max:10240',
        'form_name' => 'required|string',
        'form_desc' => 'required|string',
        'form_type' => 'required|in:Enrollment,Requirements',
    ]);

    $adminId = Auth::id();

    $data = [
        'admin_id' => $adminId,
        'form_name' => $request->form_name,
        'form_desc' => $request->form_desc,
        'form_type' => $request->form_type,
    ];

    // Handle file upload
    if ($request->hasFile('form_file')) {
        $file = $request->file('form_file');
        if ($file->isValid()) {
            $destinationPath = 'images'; // Change this to your desired directory
            $fileName = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $data['form_file'] = $fileName;
        } else {
            return back()->with('error', 'File upload error: ' . $file->getClientOriginalName());
        }
    }

    $form = Form::create($data);

    if (!$form) {
        return redirect(route('form.index'))->with("error", "Try again");
    }

    return redirect()->route('form.index')->with("success", "New form added successfully");
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
