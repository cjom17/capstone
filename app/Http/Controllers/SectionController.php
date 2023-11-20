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
