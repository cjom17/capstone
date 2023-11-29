<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\GradeLevel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SubjectController extends Controller
{


    public function showSubjects()
    {
        $subjects = Subject::all();
        return view('assign_subjects', compact('subjects'));
    }
    public function deleteSubject($id)
    {
        $subject = Subject::find($id);
        if (!$subject) {
            return redirect()->route('subject.display')->with('error', 'Subject not found.');
        }
        $subject->delete();
        return redirect()->route('subject.display')->with('success', 'Subject deleted successfully.');
    }
    
    public function updateSubjectShow($id)
    {
        $subject = Subject::find($id);
        $gradelvls = GradeLevel::all();
        return view('update_subject', compact('subject', 'gradelvls'));
    }

    public function showAddSubject()
    {
        return view ('/add_subject');
    }

    public function showManageSubject()
    {
        return view ('/manage_subjects');
    }

    public function getSubject()
    {
        $subjects = Subject::all();
        return view('manage_subjects', compact('subjects'));
    }

    public function addSubject(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string',
            'subject_desc' => 'required|string',
            'sub_gradelvl' => 'required|',

        ]);
    
        $adminId = Auth::id(); // Get the ID of the currently authenticated user
    
        $data = [
            'admin_id' => $adminId,
            'subject_name' => $request->subject_name,
            'subject_desc' => $request->subject_desc, 
            'sub_gradelvl' => $request->sub_gradelvl, 

        ];
    
       $subject = Subject::create($data);
        if (!$subject) {
            return redirect(route('gradelvlSub.display'))->with("error", "Try again");
        }

        return redirect()->route('gradelvlSub.display')->with("success", "New subject added successfully");
    
    }
    public function updateSubject(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'subject_name' => 'required|string',
            'subject_desc' => 'required|string',
            'sub_gradelvl' => 'required|string',
        ]);

        // Find the record in the database
        $subject = Subject::find($id);

        // Check if the record exists
        if (!$subject) {
            return back()->with("error", "Subject not found.");
        }

        // Get the currently authenticated user
        $user = Auth::user();

        // Update the record with the new data
        $subject->admin_id = $user->id; // Assuming the admin_id is the ID of the user
        $subject->subject_name = $request->input('subject_name');
        $subject->subject_desc = $request->input('subject_desc');
        $subject->sub_gradelvl = $request->input('sub_gradelvl');
        
        // Save the changes
        $subject->save();

        // Return a response
        return back()->with("success", "Subject updated successfully.");

    }
    

}
