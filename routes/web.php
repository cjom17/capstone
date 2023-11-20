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

Route::get('/manageAdmin', function(){
    return view('manageAdmin');

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

Route::get('/sview_grades', function(){
    return view('sview_grades');

});

Route::get('/student_info', function(){
    return view('student_info');

});

Route::get('/parent_info', function(){
    return view('parent_info');

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












// Login routes
Route::get('/adminDashboard', [AuthController::class, 'showAdminDashboard'])->name('admin.dashboard');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/adminLogin', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/addAdmin', [AuthController::class, 'show_add_admin'])->name('addAdmin.show');
Route::post('/addAdmin', [AuthController::class, 'addAdmin'])->name('add.admin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// Routes for Events
Route::get('/add_events', [EventController::class, 'showAddEvent'])->name('events.index');
Route::get('/manage_events', [EventController::class, 'showManageEvent'])->name('events.manage');
Route::post('/add_events', [EventController::class, 'addEvent'])->name('events.addEvent')->middleware('auth');
Route::get('/manage_events', [EventController::class, 'getEvents'])->name('events.display');

// Route for Updates

Route::get('/add_updates', [UpdateController::class, 'showAddUpdate'])->name('updates.index');
Route::get('/manage_updates', [UpdateController::class, 'showManageUpdate'])->name('updates.manage');
Route::post('/add_updates', [UpdateController::class, 'addUpdate'])->name('updates.addUpdate')->middleware('auth');
Route::get('/manage_updates', [UpdateController::class, 'getUpdates'])->name('updates.display');

//Routes for Home
Route::get('/', [HomeController::class, 'showLandingPage'])->name('landing-page');



// Routes for grade level

Route::get('/add_gradelvl', [GradelvlController::class, 'showAddGradelvl'])->name('gradelvl.index');
Route::get('/manage_gradelvl', [GradelvlController::class, 'showManageGradelvl'])->name('gradelvl.manage');
Route::post('/add_gradelvl', [GradelvlController::class, 'addGradelvl'])->name('gradelvls.addGradelvl')->middleware('auth');
Route::get('/manage_gradelvl', [GradelvlController::class, 'getGradelvl'])->name('gradelvl.display');


// Routes for Subjects
Route::get('/add_subject', [SubjectController::class, 'showAddSubject'])->name('subject.index');
Route::get('/manage_subjects', [SubjectController::class, 'showManageSubject'])->name('subject.manage');
Route::post('/add_subject', [SubjectController::class, 'addSubject'])->name('subjects.addsubject')->middleware('auth');
Route::get('/manage_subjects', [SubjectController::class, 'getSubject'])->name('subject.display');

// Routes for Sections
Route::get('/add_section', [SectionController::class, 'showAddSection'])->name('section.index');
Route::get('/manage_sections', [SectionController::class, 'showManageSection'])->name('section.manage');
Route::post('/add_section', [SectionController::class, 'addSection'])->name('section.addsection')->middleware('auth');
Route::get('/manage_sections', [SectionController::class, 'getSection'])->name('section.display');

// Routes for FORMS
Route::get('/add_form', [FormController::class, 'showAddForm'])->name('form.index');
Route::get('/manage_forms', [FormController::class, 'showManageForm'])->name('form.manage');
Route::post('/add_form', [FormController::class, 'addForm'])->name('form.addForm')->middleware('auth');
Route::get('/manage_forms', [FormController::class, 'getForm'])->name('form.display');

//Routes for Teachers
Route::get('/teacher_dashboard', [TeacherController::class, 'showTeacherDashboard'])->name('teacher.dashboard');
Route::get('/manage_teacher', [TeacherController::class, 'showManageTeacher'])->name('manage.teacher');
Route::get('/teacherLogin', [TeacherController::class, 'showTeacherLogin'])->name('teacher.login');
Route::post('/teacherLogin', [TeacherController::class, 'teacherLoginPost'])->name('teacherLogin.post');
Route::get('/add_teacher', [TeacherController::class, 'showAddTeacher'])->name('addTeacher.show');
Route::post('/add_teacher', [TeacherController::class, 'addTeacher'])->name('add.teacher');
// Route::get('/logout', [TeacherController::class, 'logout'])->name('logout');