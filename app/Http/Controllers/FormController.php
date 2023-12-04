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
    public function deleteForm($id)
    {
        $form = Form::find($id);
        if (!$form) {
            return back()->with("error", "Form not found.");
        }
        $form->delete();
        return back()->with("success", "Form deleted successfully");
    }

    
    public function showForms()
    {
        // Assuming your model is named Form and it has a 'form_type' field
        $enrollmentForms = Form::where('form_type', 'Enrollment')->get();
        $downloadableForms = Form::where('form_type', 'Downloadable')->get();

        return view('admission', compact('enrollmentForms', 'downloadableForms'));
    }


    public function downloadForm($formType)
    {
        $form = Form::where('form_type', $formType)->first();
    
        if (!$form) {
            abort(404, 'Form not found');
        }
    
        $filePath = public_path("images/{$form->form_file}");
    
        if (!File::exists($filePath)) {
            abort(404, 'File not found');
        }
    
        $extension = pathinfo($form->form_file, PATHINFO_EXTENSION);
    
        $headers = [
            'Content-Type' => mime_content_type($filePath),
            'Content-Disposition' => 'attachment; filename="' . $form->form_name . '.' . $extension . '"',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
        ];
    
        return response()->download($filePath, $form->form_name . '.' . $extension, $headers);
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
        'form_type' => 'required|in:Enrollment,Downloadable',
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
        return back()->with("error", "Error, try again ");
    }

    return back()->with("success", "New form added successfully.");
}


    public function updateFormShow($id)
    {
        $form = Form::find($id);
        return view('update_form', compact('form'));
    }

    public function updateForm(Request $request, $formId)
{
    $request->validate([
        'form_name' => 'required|string',
        'form_desc' => 'required|string',
        'form_type' => 'required|in:Enrollment,Downloadable',
    ]);

    // Retrieve the form by its ID
    $form = Form::find($formId);

    if (!$form) {
        return back()->with("error", "Form not found.");
    }

    // Check if the authenticated user is the owner of the form
    $user = Auth::user();
   

    $data = [
        'admin_id' => $user->id,
        'form_name' => $request->form_name,
        'form_desc' => $request->form_desc,
        'form_type' => $request->form_type,
    ];

    // Handle file update
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

    // Update the form
    $form->update($data);

    return back()->with("success", "Form updated successfully.");
}

}
