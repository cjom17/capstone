<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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




// Login routes
Route::get('/adminDashboard', [AuthController::class, 'showAdminDashboard'])->name('admin.dashboard');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/adminLogin', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/addAdmin', [AuthController::class, 'show_add_admin'])->name('AddAdmin.show');
Route::post('/addAdmin', [AuthController::class, 'addAdmin'])->name('add.admin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

