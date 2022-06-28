<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BranchController;
use \App\Http\Controllers\DepartmentController;
use \App\Http\Controllers\EmployeeController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/employee', EmployeeController::class);
Route::resource('/branch', BranchController::class);
Route::resource('/department', DepartmentController::class);

Route::get('/auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle'])->name('redirectToGoogle');

Route::get('/auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback'])->name('handleGoogleCallback');

