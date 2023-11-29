<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    
    
    public function showAddSection()
    {
        return view ('/add_section');
    }

    public function showManageSection()
    {
        return view ('/manage_sections');
    }

    public function deleteSection($id)
    {
        $section = Section::find($id);
        if (!$section) {
            return redirect()->route('section.display')->with('error', 'Section not found.');
        }
        $section->delete();
        return redirect()->route('section.display')->with('success', 'Section deleted successfully.');
    }




    public function getSection()
    {
        $sections = Section::all();
        return view('manage_sections', compact('sections'));
    }

    public function addSection(Request $request)
    {
        $request->validate([
            'section_name' => 'required|string',
            'section_desc' => 'required|string',
        ]);
    
        $adminId = Auth::id(); // Get the ID of the currently authenticated user
    
        $data = [
            'admin_id' => $adminId,
            'section_name' => $request->section_name,
            'section_desc' => $request->section_desc, 
        ];
    
       $section = Section::create($data);
        if (!$section) {
            return redirect(route('section.index'))->with("error", "Try again");
        }

        return redirect()->route('section.index')->with("success", "New section added successfully");
    
    }

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
    public function updateSectionShow($id)
    {
        $section = Section::find($id);
        return view('update_section', compact('section'));
    }

    public function updateSection(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'section_name' => 'required|string',
            'section_desc' => 'required|string',
        ]);

        // Find the record in the database
        $section = Section::find($id);

        // Check if the record exists
        if (!$section) {
            return back()->with("error", "Section not found.");
        }

        // Get the currently authenticated user
        $user = Auth::user();

        // Update the record with the new data
        $section->admin_id = $user->id; // Assuming the admin_id is the ID of the user
        $section->section_name = $request->input('section_name');
        $section->section_desc = $request->input('section_desc');
        
        // Save the changes
        $section->save();

        // Return a response
        return back()->with("success", "Section updated successfully.");

    }
    


    

}
