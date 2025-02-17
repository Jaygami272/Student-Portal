<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimetableController;

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

Route::redirect('/', 'login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('profile', App\Http\Controllers\ProflleController::class);

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
    Route::resource('departments',App\Http\Controllers\DepartmentController::class);
    Route::resource('facultys',App\Http\Controllers\FacultyController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('subjects',App\Http\Controllers\SubjectController::class);
    Route::resource('teachs',App\Http\Controllers\TeachsController::class);
    Route::resource('timetables',App\Http\Controllers\TimetableController::class);
    Route :: get ('timetables / eindex', [App\Http\Controllers\TimetableController::class,'eindex']) -> name ('timetables.eindex');
    Route :: get ('timetables / ecreate', [App\Http\Controllers\TimetableController::class,'ecreate']) -> name ('timetables.ecreate');
    Route :: post ('timetables / estore', [App\Http\Controllers\TimetableController::class,'estore']) -> name ('timetables.estore');
    Route :: delete ('timetables / edestroy /{id}', [App\Http\Controllers\TimetableController::class,'edestroy']) -> name ('timetables.edestroy');
    Route::post('role_permissions/{id}', [App\Http\Controllers\RoleController::class,'update_permission'])->name('role_permissions');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
