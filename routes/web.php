<?php

use App\Http\Controllers\employeeController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\employee_user_viewController;
use App\Http\Controllers\leavesController;
use App\Http\Controllers\payrollController;
use App\Http\Controllers\performanceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account', [ProfileController::class, 'destroy'])->name('profile.destroy');


});



require __DIR__ . '/auth.php';



//EMPLOYEE ROUTES
Route::get('/employees', [employeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [employeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [employeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [employeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [employeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}', [employeeController::class, 'destroy'])->name('employees.destroy');
Route::get('/employee', [employee_user_viewController::class, 'show'])->middleware('auth')->name('employee');

//PROFILE ROUTES
Route::get('/profile', [employee_user_viewController::class, 'index'])->name('profile-information')->middleware('auth');

//ROUTES TO BE CLASSIFIED
Route::get('/department', [departmentController::class, 'index'])->name('department')->middleware('auth');
Route::get('/attendance', [attendanceController::class, 'index'])->name('attendance')->middleware('auth');
Route::get('/leaves', [leavesController::class, 'index'])->name('leaves')->middleware('auth');
Route::get('/payroll', [payrollController::class, 'index'])->name('payroll')->middleware('auth');
Route::get('/performance', [performanceController::class, 'index'])->name('performance')->middleware('auth');


//DASHBOARD ROUTES

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/manager/dashboard', function () {
    return view('dashboard');
});
Route::get('/admin/dashboard', function () {
    return view('dashboard');
});