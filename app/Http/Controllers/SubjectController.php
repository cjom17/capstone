<?php

namespace App\Http\Controllers;
use App\Models\Subject;
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
