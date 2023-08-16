<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseStudentController;
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
    return view('course.login');
});
Route::get('home', function () {
    return view('home');
});

Route::get('student', function () {
    return view('student.createSt');
});

Route::get('stdC', function () {
    return view('admin.stdCor');
});



Route::resource('login', UserController::class) ;
 Route::resource('course', CourseController::class) ;
 Route::resource('category', CategoryController::class) ;
 Route::resource('student', StudentController::class) ;
 Route::resource('course-students', CourseStudentController::class);
 
Route::get('reg/create/{course_id}', 'App\Http\Controllers\CourseStudentController@create')->name('register.create');
Route::get('reg/{course_id}', 'App\Http\Controllers\CourseStudentController@index')->name('register.index');
Route::post('reg/{course_id}', 'App\Http\Controllers\CourseStudentController@store')->name('register.store');
// Route::put('course-students/{courseStudent}', 'App\Http\Controllers\CourseStudentController@update')->name('course-students.update');



 Route::patch('students/{student}', 'App\Http\Controllers\StudentController@toggleActivation')->name('student.toggleActivation');










