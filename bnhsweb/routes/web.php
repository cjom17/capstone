<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\HomeController;

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
