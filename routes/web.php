<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/list-students',[StudentController::class,'list_students'])->name('list-student');
Route::match(['GET','POST'],'/add/student',[StudentController::class,'add']);
Route::match(['GET','POST'],'/edit/student/{id}',[StudentController::class,'edit'])->name('edit-student');
Route::get('/delete/student/{id}', [StudentController::class, 'delete'])->name('delete-student');

