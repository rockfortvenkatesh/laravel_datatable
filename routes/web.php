<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\DateRangeController;
use App\Http\Controllers\StudentController;
use App\Models\User;
use App\Models\Student;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Route::get('/user/details',[DateRangeController::class, 'index'])->name('students');

//Route::get('fetch/users',[DateRangeController::class, 'fetch_users']);

//Route::post('search/users',[DateRangeController::class, 'Search_by_date']);

//student details
Route::get('students', [StudentController::class, 'index'])->name('students');

Route::get('add/students', [StudentController::class, 'Add_Students'])->name('add_students');

Route::post('store/students', [StudentController::class, 'Store_Students'])->name('store.students');

Route::get('students/records', [StudentController::class, 'records'])->name('students/records');
//edit
Route::get('student/edit', [StudentController::class, 'studentedit'])->name('student.edit');
Route::get('/student/edit/{id}', [StudentController::class, 'Edit']);
Route::post('/student/update/{id}', [StudentController::class, 'Update']);

Route::get('/student/delete/{id}', [StudentController::class, 'Delete']);

//report
Route::get('report', [StudentController::class, 'report'])->name('report');









