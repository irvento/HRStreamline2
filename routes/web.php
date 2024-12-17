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



require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index')->middleware('auth');
Route::get('/employees', [employeeController::class, 'index'])->name('employees')->middleware('auth');
Route::get('/employees/create', [employeeController::class, 'create'])->name('employees.create')->middleware('auth');
Route::post('/employees', action: [employeeController::class, 'store'])->name('employees.store')->middleware('auth');
Route::get('/employees/{id}/edit', [employeeController::class, 'edit'])->name('employees.edit')->middleware('auth');
Route::put('/employees/{id}', [employeeController::class, 'update'])->name('employees.update')->middleware('auth');
Route::delete('/employees/{id}', [employeeController::class, 'destroy'])->name('employees.destroy')->middleware('auth');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');

Route::middleware('auth')->group(function () {
    // Department Routes
    Route::get('/department', [departmentController::class, 'index'])->name('department.index');
    Route::get('/department/create', [departmentController::class, 'create'])->name('department.create');
    Route::post('/department', [departmentController::class, 'store'])->name('department.store');
    Route::get('/department/{id}/edit', [departmentController::class, 'edit'])->name('department.edit');
    Route::put('/department/{id}', [departmentController::class, 'update'])->name('department.update');
    Route::delete('/department/{id}', [departmentController::class, 'destroy'])->name('department.destroy');
    Route::get('/department/{id}/delete', [departmentController::class, 'showDeleteConfirmation'])->name('department.delete_confirmation');
    
});

Route::get('/profile', [employee_user_viewController::class, 'index'])->name('profile-information')->middleware('auth');

Route::get('/attendance', [attendanceController::class, 'index'])->name('attendance')->middleware('auth');
Route::get('/leaves', [leavesController::class, 'index'])->name('leaves')->middleware('auth');
Route::get('/payroll', [payrollController::class, 'index'])->name('payroll')->middleware('auth');
Route::get('/performance', [performanceController::class, 'index'])->name('performance')->middleware('auth');






//ADMIN
    Route::middleware(['role:admin'])->group(function () {
        // Define your admin routes here
        Route::get('/admin/dashboard', function () {
            return view('dashboard');});
    });
//MANAGER
    Route::middleware(['role:manager'])->group(function () {
        // Define your manager routes here
        Route::get('/manager/dashboard', function () {
            return view('dashboard');});
    });
//USER
    Route::middleware(['role:user'])->group(function () {
        // Define your user routes here
        Route::get('/user/dashboard', function () {
            return view('dashboard');});
    });
    
    
    