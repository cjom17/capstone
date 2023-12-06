<?php

namespace App\Http\Controllers;
use App\Models\EnrolledSubject;
use App\Models\Student;
use App\Models\ParentModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class EnrolledSubjectController extends Controller
{

    public function deleteEnrolledSubject($id)
    {
        $subject = EnrolledSubject::find($id);
        if (!$subject) {
            return back()->with('error', 'Subject not found.');
        }
        $subject->delete();
        // Refresh the current page
        return back()->with('success', 'Subject deleted successfully.');
    }
    


    public function handleAssignment(Request $request)
    {
        try {
            $request->validate([
                'student_lrn' => 'required|numeric',
                'selected_subjects' => 'required|array',
                'selected_subjects.*.id' => 'required|numeric|exists:subjects,id',
                'selected_subjects.*.subject_name' => 'required|string',
                'selected_subjects.*.subject_desc' => 'required|string',
            ]);
    
            $studentLRN = $request->input('student_lrn');
            $selectedSubjects = $request->input('selected_subjects');
            $teacherID = Auth::id();
    
            foreach ($selectedSubjects as $subjectId => $subjectData) {
                // Check if the record already exists
                $existingRecord = EnrolledSubject::where([
                    'teacher_id' => $teacherID,
                    'student_lrn' => $studentLRN,
                    'subject_id' => $subjectData['id'],
                ])->first();
    
                // Debugging output
                if ($existingRecord) {
                    Log::info('Record already exists:', $existingRecord->toArray());
                    continue; // Skip creating this record
                }
    
                // If the record doesn't exist, create it
                EnrolledSubject::create([
                    'teacher_id' => $teacherID,
                    'student_lrn' => $studentLRN,
                    'subject_id' => $subjectData['id'],
                    'subject_name' => $subjectData['subject_name'],
                    'subject_desc' => $subjectData['subject_desc'],
                ]);
            }
    
            // Return a JSON response with success status
            return response()->json(['success' => true, 'message' => 'Subjects are now assigned successfully']);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Error in handleAssignment:', ['exception' => $e, 'request' => $request->all()]);
    
            // Return a JSON response with error status
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
    
    
    

    public function showSpecEnrolledSub($student_id, $student_lrn)
    {
        // Use $student_lrn to fetch enrolled subjects from your database
        $enrolledSubjects = EnrolledSubject::where('student_lrn', $student_lrn)->get();
    
        // You can fetch more details about the student if needed
        $student = Student::find($student_id);
    
        return view('enrolled_subjects', compact('enrolledSubjects', 'student'));
    }
    
    
    public function showRemarks($student_id, $student_lrn)
    {
        // Use $student_lrn to fetch enrolled subjects from your database
        $enrolledSubjects = EnrolledSubject::where('student_lrn', $student_lrn)->get();
    
        // You can fetch more details about the student if needed
        $student = Student::find($student_id);
    
        return view('remarks', compact('enrolledSubjects', 'student'));
    }


    public function showAddGrade(Request $request) {
        $studentLRN = $request->input('student_lrn');
        $subjectID = $request->input('subject_id');
    
        // Debugging statements
        // dd([$studentLRN, $subjectID]);
    
        // Fetch student details based on $studentLRN
        $student = Student::where('student_lrn', $studentLRN)->first();
    
        // Fetch enrolled subject details based on $studentLRN and $subjectID
        $enrolledSubject = EnrolledSubject::where('student_lrn', $studentLRN)
            ->where('subject_id', $subjectID)
            ->first();
    
        // Debugging statements
        // dd($enrolledSubject);
    
        return view('add_grade', [
            'student' => $student,
            'studentLRN' => $studentLRN,
            'subjectID' => $subjectID,
            'enrolledSubject' => $enrolledSubject,
            // Pass other necessary data to the view
        ]);
    }

    public function updateGrades(Request $request) {
        $studentLRN = $request->input('student_lrn');
        $subjectID = $request->input('subject_id');
        // dd([$studentLRN, $subjectID]);

    
        // Fetch the enrolled subject for the specified student and subject
        $enrolledSubject = EnrolledSubject::where('student_lrn', $studentLRN)
            ->where('subject_id', $subjectID)
            ->first();
    
        if ($enrolledSubject) {
            // Update the grades in the enrolled_subjects table
            $enrolledSubject->update([
                'first_qtr' => $request->input('first_qtr'),
                'second_qtr' => $request->input('second_qtr'),
                'third_qtr' => $request->input('third_qtr'),
                'fourth_qtr' => $request->input('fourth_qtr'),
                'final' => $request->input('final'),
                'remarks' => $request->input('remarks') ?? 'NA', // Default value if not provided


                // Add other fields as needed
            ]);
    
            // You can also update final and remarks if needed
            // $enrolledSubject->update([
            //     'final' => $request->input('final'),
            //     'remarks' => $request->input('remarks'),
            // ]);
    
            return redirect()->route('add_grade.show', ['student_lrn' => $studentLRN, 'subject_id' => $subjectID])
                ->with('success', 'Grades updated successfully');
        } else {
            return redirect()->back()->with('error', 'Enrolled subject not found for the specified student and subject.');
        }
    }
    public function showReportCard()
    {
        // Get the currently logged-in user
        $user = Auth::user();
    
        // Get the ID of the currently logged-in user
        $userId = $user->id;
    
        // Use the user ID to retrieve the associated student
        $student = Student::where('id', $userId)->first();
    
        // Check if the student record exists
        if (!$student) {
            // Handle the case where the student record does not exist
            abort(404, 'Student record not found for the authenticated user.');
        }
    
        // Get the LRN from the student model
        $lrn = $student->student_lrn;
    
        // Fetch enrolled subjects for the specific student
        $enrolledSubjects = EnrolledSubject::where('student_lrn', $lrn)->get();
    
        return view('sview_grades', ['student_lrn' => $lrn, 'enrolledSubjects' => $enrolledSubjects]);
    }
    
    public function showReportCardParent()
    {
        // Get the currently logged-in user
        $user = Auth::user();
    
        // Get the ID of the currently logged-in user
        $userId = $user->id;
    
        // Use the user ID to retrieve the associated student
        $parent = ParentModel::where('id', $userId)->first();
    
        // Check if the student record exists
        if (!$parent) {
            // Handle the case where the student record does not exist
            abort(404, 'Student record not found for the authenticated user.');
        }
    
        // Get the LRN from the student model
        $lrn = $parent->student_lrn;

        $studentCred = Student::where('student_lrn', $lrn )->first();
        $studentFname = $studentCred->f_name;
        $studentLname = $studentCred->l_name;

        // Fetch enrolled subjects for the specific student
        $enrolledSubjects = EnrolledSubject::where('student_lrn', $lrn)->get();
        return view('pview_grades', [
            'student_lrn' => $lrn,
            'student_fname' => $studentFname,
            'student_lname' => $studentLname,
            'enrolledSubjects' => $enrolledSubjects
        ]);
    
    }

 

    
}
