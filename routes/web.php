<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradelvlController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EnrolledSubjectController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('/contact', function(){
    return view('contact');

});

Route::get('/donate', function(){
    return view('donate');

});
Route::get('/student_login', function(){
    return view('student_login');

});

Route::get('/events_updates', function(){
    return view('events_updates');

});

Route::get('/about', function(){
    return view('about');

});


Route::get('/admission', function(){
    return view('admission');

});

Route::get('/adminLogin', function(){
    return view('adminLogin');

});

Route::get('/parentLogin', function(){
    return view('parentLogin');

});

Route::get('/teacherLogin', function(){
    return view('teacherLogin');

});


Route::get('/parentRegistration', function(){
    return view('parentRegistration');

});

Route::get('/adminDashboard', function(){
    return view('adminDashboard')->name('adminDashboard');

});


Route::get('/teacher_dashboard', function(){
    return view('teacher_dashboard');

});


Route::get('/addAdmin', function(){
    return view('addAdmin');

});
Route::get('/student_landing', function(){
    return view('student_landing');

});

Route::get('/parent_landing', function(){
    return view('parent_landing');

});






Route::get('/pview_grades', function(){
    return view('pview_grades');

});

Route::get('/manage_events', function(){
    return view('manage_events');

});

Route::get('/add_events', function(){
    return view('add_events');

});

Route::get('/add_updates', function(){
    return view('add_updates');

});


Route::get('/manage_updates', function(){
    return view('manage_updates');

});


Route::get('/manage_gradelvl', function(){
    return view('manage_gradelvl');

});

Route::get('/add_gradelvl', function(){
    return view('add_gradelvl');

});



Route::get('/manage_subjects', function(){
    return view('manage_subjects');

});

Route::get('/add_subject', function(){
    return view('add_subject');

});



Route::get('/manage_sections', function(){
    return view('manage_sections');

});

Route::get('/add_section', function(){
    return view('add_section');

});

Route::get('/manage_teachers', function(){
    return view('manage_teachers');

});

Route::get('/add_teacher', function(){
    return view('add_teacher');

});

Route::get('/manage_forms', function(){
    return view('manage_forms');

});

Route::get('/add_form', function(){
    return view('add_form');

});

Route::get('/manage_students', function(){
    return view('manage_students');

});

Route::get('/add_student', function(){
    return view('add_student');

});


//Routes for Home
Route::get('/', [HomeController::class, 'showLandingPage'])->name('landing-page');
Route::get('/events_updates', [HomeController::class, 'displayEvents'])->name('events.display');

// Admin Login
Route::post('/adminLogin', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Route group for Admin
Route::post('/addAdmin', [AuthController::class, 'addAdmin'])->name('add.admin'); 
Route::get('/addAdmin', [AuthController::class, 'show_add_admin'])->name('addAdmin.show');

Route::middleware(['auth:web', 'role:admin'])->group(function () {
       // Routes for Subjects
    //    Route::get('/show-add-subject', [SubjectController::class, 'showAddSubject'])->name('subject.index');
    Route::get('/manage_subjects', [SubjectController::class, 'showManageSubject'])->name('subject.manage');
    Route::post('/add_subject', [SubjectController::class, 'addSubject'])->name('subjects.addsubject')->middleware('auth');
    Route::get('/manage_subjects', [SubjectController::class, 'getSubject'])->name('subject.display');
    Route::delete('/delete-subject/{id}', [SubjectController::class, 'deleteSubject'])->name('delete.subject');

    // Routes for grade level
    Route::get('/add_gradelvl', [GradelvlController::class, 'showAddGradelvl'])->name('gradelvl.index');
    Route::get('/manage_gradelvl', [GradelvlController::class, 'showManageGradelvl'])->name('gradelvl.manage');
    Route::post('/add_gradelvl', [GradelvlController::class, 'addGradelvl'])->name('gradelvls.addGradelvl')->middleware('auth');
    Route::get('/manage_gradelvl', [GradelvlController::class, 'getGradelvl'])->name('gradelvl.display');
    Route::get('/add_subject', [GradelvlController::class, 'getGradelvlSub'])->name('gradelvlSub.display');
    Route::delete('/delete-gradelvl/{id}', [GradelvlController::class, 'deleteGradelvl'])->name('delete.gradelvl');

    // Routes for managing Admin
    Route::get('/adminDashboard', [AuthController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('/manageAdmin', [AuthController::class, 'getAllAdmin'])->name('manage.admin');
    Route::get('/view_admin_data/{admin_id}', [AuthController::class, 'specAdmin'])->name('specAdmin.show');  
    Route::delete('/delete-admin/{id}', [AuthController::class, 'deleteAdmin'])->name('delete.admin');
    Route::get('/update_admin_data/{admin_id}', [AuthController::class, 'updateAdminShow'])->name('updateAdmin.show');  
    Route::put('/update-admin/{admin_id}', [AuthController::class, 'updateAdmin'])->name('update.admin');


    // Routes for managing teacher
    Route::get('/manage_teachers', [TeacherController::class, 'getAllTeacher'])->name('manage.teacher');
    Route::get('/add_teacher', [GradelvlController::class, 'getGradelvlTeach'])->name('addTeacher.show');
    Route::get('/view_teacher_data/{teacher_id}', [TeacherController::class, 'specTeacher'])->name('specTeacher.show');    
    Route::delete('/delete-teacher/{id}', [TeacherController::class, 'deleteTeacher'])->name('delete.teacher');
    Route::post('/add_teacher', [TeacherController::class, 'addTeacher'])->name('add.teacher');  
    Route::get('/update_teacher_data/{teacher_id}', [TeacherController::class, 'updateTeacherShow'])->name('updateTeacher.show');  
    Route::put('/update-teacher/{teacher_id}', [TeacherController::class, 'updateTeacher'])->name('update.teacher');
   
    
    // Routes for managing PARENTS
    Route::get('/manage_parents', [ParentController::class, 'getAllParent'])->name('manage.parent');
    Route::get('/view_parent_data/{parent_id}', [ParentController::class, 'specParent'])->name('specParent.show');  
    Route::delete('/delete-parent/{id}', [ParentController::class, 'deleteParent'])->name('delete.parent');
    Route::get('/update_parent_data/{parent_id}', [ParentController::class, 'updateParentShow'])->name('updateParent.show');  
    Route::put('/update-parent/{parent_id}', [ParentController::class, 'updateParent'])->name('update.parent');
  
    // Routes for managing STUDENTS
    Route::get('/admin_manage_students', [StudentController::class, 'getStudentsForAdmin'])->name('adminManage.student');
    Route::get('/admin_view_student_data/{student_id}', [StudentController::class, 'specStudentForAdmin'])->name('specStudentForAdmin.show');    

    // Routes for FORMS
    Route::get('/add_form', [FormController::class, 'showAddForm'])->name('form.index');
    Route::get('/manage_forms', [FormController::class, 'showManageForm'])->name('form.manage');
    Route::post('/add_form', [FormController::class, 'addForm'])->name('form.addForm')->middleware('auth');
    Route::get('/manage_forms', [FormController::class, 'getForm'])->name('form.display');
    Route::delete('/delete-form/{id}', [FormController::class, 'deleteForm'])->name('delete.form');

    // Routes for Sections
    Route::get('/add_section', [SectionController::class, 'showAddSection'])->name('section.index');
    Route::get('/manage_sections', [SectionController::class, 'showManageSection'])->name('section.manage');
    Route::post('/add_section', [SectionController::class, 'addSection'])->name('section.addsection')->middleware('auth');
    Route::get('/manage_sections', [SectionController::class, 'getSection'])->name('section.display');
    Route::delete('/delete-section/{id}', [SectionController::class, 'deleteSection'])->name('delete.section');

    // Routes for Events
    Route::get('/add_events', [EventController::class, 'showAddEvent'])->name('events.index');
    Route::get('/manage_events', [EventController::class, 'showManageEvent'])->name('events.manage');
    Route::post('/add_events', [EventController::class, 'addEvent'])->name('events.addEvent')->middleware('auth');
    Route::get('/manage_events', [EventController::class, 'getEvents'])->name('events.display');
    Route::delete('/delete-event/{id}', [EventController::class, 'deleteEvent'])->name('delete.event');

    // Route for Updates
    Route::get('/add_updates', [UpdateController::class, 'showAddUpdate'])->name('updates.index');
    Route::get('/manage_updates', [UpdateController::class, 'showManageUpdate'])->name('updates.manage');
    Route::post('/add_updates', [UpdateController::class, 'addUpdate'])->name('updates.addUpdate')->middleware('auth');
    Route::get('/manage_updates', [UpdateController::class, 'getUpdates'])->name('updates.display');
    Route::delete('/delete-update{id}', [UpdateController::class, 'deleteUpdate'])->name('delete.update');
});

// Teacher Login
Route::get('/teacherLogin', [TeacherController::class, 'showTeacherLogin'])->name('teacher.login');
Route::post('/teacherLogin', [TeacherController::class, 'teacherLoginPost'])->name('teacherLogin.post');

// ROUTE GROUP FOR TEACHER
Route::middleware(['auth:teacher', 'role:teacher'])->group(function () {
 
    Route::get('/assign_subjects', [SubjectController::class, 'showSubjects'])->name('assignSubject.display');
    Route::post('/handle_assignment', [EnrolledSubjectController::class, 'handleAssignment'])->name('handle_assignment');

    //Routes for Students
    Route::get('/manage_students', [StudentController::class, 'getStudents'])->name('manage.student');
    Route::get('/add_student', [StudentController::class, 'showAddStudent'])->name('addStudent.show');
    Route::post('/add_student', [StudentController::class, 'addStudent'])->name('add.student');   
    Route::delete('/delete-update{id}', [UpdateController::class, 'deleteUpdate'])->name('delete.update');
    Route::get('/view_student_data/{student_id}', [StudentController::class, 'specStudent'])->name('specStudent.show'); 
    Route::get('/update_student_data/{student_id}', [StudentController::class, 'updateStudentShow'])->name('updateStudent.show');  
    Route::put('/update-student/{student_id}', [StudentController::class, 'updateStudent'])->name('update.student');
  
   

    // Route::get('/enrolledSub/{student_id}', [StudentController::class, 'enrolledSub'])->name('enrolledSub.show'); 
    Route::delete('/delete-student{id}', [StudentController::class, 'deleteStudent'])->name('delete.student');
    Route::delete('/delete-enrolled-subject{id}', [EnrolledSubjectController::class, 'deleteEnrolledSubject'])->name('delete.enrolledSubject');


    Route::get('/enrolled-subjects/{student_id}/{student_lrn}', [EnrolledSubjectController::class, 'showSpecEnrolledSub'])->name('enrolledSub.show'); 
 
    Route::get('/remarks/{student_id}/{student_lrn}', [EnrolledSubjectController::class, 'showRemarks'])->name('remarks.show');   
    Route::get('/add_grade', [EnrolledSubjectController::class, 'showAddGrade'])->name('add_grade.show');  
    Route::post('/update_grades', [EnrolledSubjectController::class, 'updateGrades'])->name('update_grades');
    Route::get('/teacher_dashboard', [TeacherController::class, 'showTeacherDashboard'])->name('teacher.dashboard'); 
    Route::get('/api/enrolled_subjects/{student_lrn}', [EnrolledSubjectController::class, 'getEnrolledSubjects']);
    Route::get('/view_student_data', function(){
        return view('view_student_data');
    
    });
    




});




// PARENT LOGIN
Route::get('/parentLogin', [ParentController::class, 'showParentLogin'])->name('parent.login');
Route::post('/parentLogin', [ParentController::class, 'parentLoginPost'])->name('parentLogin.post');

// ROUTE GROUP FOR PARENT

Route::middleware(['auth:parent', 'role:parent'])->group(function () {
    Route::get('/parent_landing', [ParentController::class, 'showParentLanding'])->name('parent.landing');
    Route::get('/pview_grades', [EnrolledSubjectController::class, 'showReportCardParent'])->name('report-card');

    Route::get('/parent_info', function(){
        return view('parent_info');
    });
});

Route::post('/parentRegistration', [ParentController::class, 'parentRegistration'])->name('parent.register');     



// STUDENT LOGIN
Route::get('/studentLogin', [StudentController::class, 'showstudentLogin'])->name('student.login');
Route::post('/studentLogin', [StudentController::class, 'studentLoginPost'])->name('studentLogin.post');

// ROUTE GROUP FOR STUDENT

Route::middleware(['auth:student', 'role:student'])->group(function () {
    Route::get('/student_landing', [StudentController::class, 'showStudentLanding'])->name('student.landing');
    Route::get('/sview_grades', [EnrolledSubjectController::class, 'showReportCard'])->name('report-card');

    Route::get('/student_info', function(){
        return view('student_info');
    });
});

// Logout 
Route::get('/parentLogout', [ParentController::class, 'parentLogout'])->name('parent.logout');
Route::get('/teacherLogout', [TeacherController::class, 'teacherLogout'])->name('teacher.logout');
Route::get('/studentLogout', [StudentController::class, 'studentLogout'])->name('student.logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route for sendin EMAIL

Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send-email');

// Routes for FORM

Route::get('/admission', [FormController::class, 'showForms'])->name('forms.show');
Route::get('/download-form/{formType}', [FormController::class, 'downloadForm'])->name('download.form');
