<?php

namespace App\Http\Controllers;
use App\Models\GradeLevel;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class GradelvlController extends Controller
{

    public function showAddGradelvl()
    {
        return view ('/add_gradelvl');
    }
    public function deleteGradelvl($id)
    {
        $gradelvl = GradeLevel::find($id);
        if (!$gradelvl) {
            return redirect()->route('gradelvl.display')->with('error', 'Grade level not found.');
        }
        $gradelvl->delete();
        return redirect()->route('gradelvl.display')->with('success', 'Grade level deleted successfully.');
    }


    public function showManageGradelvl()
    {
        return view ('/manage_gradelvl');
    }




    public function getGradelvl()
    {
        $gradelvls = GradeLevel::all();
        return view('manage_gradelvl', compact('gradelvls'));
    }

    public function getGradelvlSub()
    {
        $gradelvls = GradeLevel::all();
        return view('add_subject', compact('gradelvls'));
    }

    public function getGradelvlUpdate()
    {
        $gradelvls = GradeLevel::all();
        return view('update_teacher_data', compact('gradelvls'));
    }


    public function getGradelvlTeach()
    {
        $gradelvls = GradeLevel::all();
        $sections = Section::all();
        return view('add_teacher', compact('gradelvls', 'sections'));
    }

    public function addGradelvl(Request $request)
    {
        $request->validate([
            'grade_lvl' => 'required|string',
            'gradelvl_desc' => 'required|string',
        ]);
    
        $adminId = Auth::id(); // Get the ID of the currently authenticated user
    
        $data = [
            'admin_id' => $adminId,
            'grade_lvl' => $request->grade_lvl,
            'gradelvl_desc' => $request->gradelvl_desc, 
        ];
    
       $gradelvl = GradeLevel::create($data);
        if (!$gradelvl) {
            return redirect(route('gradelvl.index'))->with("error", "Try again");
        }

        return redirect()->route('gradelvl.index')->with("success", "New grade level added successfully");
    
    }
       
    public function updateGradelvlShow($id)
    {
        $gradelvl = GradeLevel::find($id);
        return view('update_gradelvl', compact('gradelvl'));
    }

    public function updateGradelvl(Request $request, $id)
{
    $request->validate([
        'grade_lvl' => 'required|string',
        'gradelvl_desc' => 'required|string',
    ]);

    $gradeLevel = GradeLevel::find($id);

    if (!$gradeLevel) {
        return back()->with("error", "Grade Level not found");
    }

    $user = Auth::user();

    $gradeLevel->admin_id = $user->id; 
    $gradeLevel->grade_lvl = $request->grade_lvl;
    $gradeLevel->gradelvl_desc = $request->gradelvl_desc;

    // Save the changes
    $gradeLevel->save();

    return back()->with("success", "Grade Level is updated successfully");
}


   
 
}
