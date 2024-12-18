<?php

use App\Http\Controllers\employeeController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\employee_user_viewController;
use App\Http\Controllers\leavesController;
use App\Http\Controllers\paymentFrequencyController;
use App\Http\Controllers\salaryController;
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



Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index')->middleware('auth');
Route::get('/employee', [employeeController::class, 'index'])->name('employees')->middleware('auth');
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

Route::middleware(['auth'])->group(function () {
    Route::get('/leaves', [leavesController::class, 'index'])->name('leaves.index');
    Route::get('/leaves/create', [leavesController::class, 'create'])->name('leaves.create');
    Route::post('/leaves', [leavesController::class, 'store'])->name('leaves.store');
    Route::get('/leaves/{leave}/edit', [leavesController::class, 'edit'])->name('leaves.edit');
    Route::put('/leaves/{leave}', [leavesController::class, 'update'])->name('leaves.update');
    Route::delete('/leaves/{leave}', [leavesController::class, 'destroy'])->name('leaves.destroy');
    Route::get('/leaves/{leave}', [leavesController::class, 'show'])->name('leaves.show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/attendance', [attendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance/login', [attendanceController::class, 'login'])->name('attendance.login');
    Route::post('/attendance/logout', [attendanceController::class, 'logout'])->name('attendance.logout');
    Route::get('/attendance/history', [attendanceController::class, 'showAttendance'])->name('attendance.history');
});

Route::middleware(['auth'])->group(function () {
    Route::post('performance/store', [performanceController::class, 'store'])->name('performance.store');
    Route::get('performance', [performanceController::class, 'index'])->name('performance.index');
    Route::get('/performance/create', [performanceController::class, 'create'])->name('performance.create');
});

//PROFILE ROUTES
Route::get('/profile', [employee_user_viewController::class, 'index'])->name('profile-information')->middleware('auth');


//SALARIES ROUTES
// Secure the salaries route
Route::get('/salaries', [salaryController::class, 'index'])->name('salary')->middleware('auth');
Route::post('/salaries', [salaryController::class, 'store'])->name('salaries.store')->middleware('auth');

// Route for viewing the salary details
Route::get('/salary/{salary_id}', [SalaryController::class, 'show'])->name('salary.view');
// Route for displaying the edit form for a salary
Route::get('/salary/{salary_id}/edit', [SalaryController::class, 'edit'])->name('salary.edit');
// Route for updating the salary details
Route::put('/salary/{salary_id}', [SalaryController::class, 'update'])->name('salary.update');
// Route for deleting a salary
Route::delete('/salaries/{salary_id}', [salaryController::class, 'destroy'])->name('salary.destroy');


// PAYMENT FREQUENCY ROUTES
Route::get('/payment-frequencies', [paymentFrequencyController::class, 'index'])->name('payment-frequency.index')->middleware('auth');
Route::get('/payment-frequencies/create', [paymentFrequencyController::class, 'create'])->name('payment-frequency.create')->middleware('auth');
Route::post('/payment-frequencies', [paymentFrequencyController::class, 'store'])->name('payment-frequency.store')->middleware('auth');
Route::get('/payment-frequency/{payment_frequency_id}/edit', [paymentFrequencyController::class, 'edit'])->name('payment-frequency.edit')->middleware('auth');
Route::put('/payment-frequency/{payment_frequency_id}', [paymentFrequencyController::class, 'update'])->name('payment-frequency.update')->middleware('auth');
Route::delete('/payment-frequencies/{id}', [paymentFrequencyController::class, 'destroy'])->name('payment-frequency.destroy')->middleware('auth');
Route::resource('payment-frequency', PaymentFrequencyController::class);
Route::get('/payment-frequency/{payment_frequency_id}', [paymentFrequencyController::class, 'show'])->name('payment-frequency.show')->middleware('auth');  // ** Show Route**

//ADMIN
Route::middleware(['role:admin'])->group(function () {
    // Define your admin routes here
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    });
});
//MANAGER
Route::middleware(['role:manager'])->group(function () {
    // Define your manager routes here
    Route::get('/manager/dashboard', function () {
        return view('dashboard');
    });
});
//USER
Route::middleware(['role:user'])->group(function () {
    // Define your user routes here
    Route::get('/user/dashboard', function () {
        return view('dashboard');
    });
});


//DASHBOARD ROUTES

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


