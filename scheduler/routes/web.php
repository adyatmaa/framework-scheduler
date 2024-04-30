<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/', [AdminController::class, 'index'])->name('logout');
Route::get('/', [UserController::class, 'index'])->name('logout');
// Route::get('/', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [AdminController::class, 'register'])->name('register');
Route::get('/admin_dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');
Route::get('/admin_participant', [AdminController::class, 'admin_participant'])->name('admin_participant');
Route::get('/admin_course', [AdminController::class, 'admin_course'])->name('admin_course');
Route::get('/admin_inputCourse', [AdminController::class, 'admin_inputCourse'])->name('admin_inputCourse');

Route::get('/admin_parDetail/{id}', [AdminController::class, 'admin_parDetail'])->name('admin_parDetail');

Route::get('/admin_editCourse/{id}', [AdminController::class, 'admin_editCourse'])->name('admin_editCourse');
Route::put('/admin_updateCourse/{id}', [AdminController::class, 'admin_updateCourse'])->name('admin_updateCourse');
Route::delete('/admin_deleteCourse/{id}', [AdminController::class, 'admin_deleteCourse'])->name('admin_deleteCourse');

Route::delete('/admin_deletePar/{id}', [AdminController::class, 'admin_deletePar'])->name('admin_deletePar');

Route::get('/user_register', [UserController::class, 'user_register'])->name('user_register');
Route::get('/index', [UserController::class, 'index'])->name('index');

//admin
Route::post('/loggingIn', [AdminController::class, 'loggingIn'])->name('loggingIn');
Route::post('/isRegister', [AdminController::class, 'isRegister'])->name('isRegister');
Route::post('/makeCourse', [AdminController::class, 'makeCourse'])->name('makeCourse');

//user
Route::post('/userIsReg', [UserController::class, 'userIsReg'])->name('userIsReg');
Route::post('/userLogin', [UserController::class, 'userLogin'])->name('userLogin');

Route::put('/user_submit/{id}', [UserController::class, 'user_submit'])->name('user_submit');

Route::get('/user_dashboard', [UserController::class, 'user_dashboard'])->name('user_dashboard');
Route::get('/user_ViewCourse', [UserController::class, 'user_ViewCourse'])->name('user_ViewCourse');
Route::get('/user_course/{id}', [UserController::class, 'user_course'])->name('user_course');
