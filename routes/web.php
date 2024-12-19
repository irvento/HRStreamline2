<?php

use App\Http\Controllers\employee_infoController;
use App\Http\Controllers\employeedetailController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\employee_user_viewController;
use App\Http\Controllers\leavesController;
use App\Http\Controllers\paymentFrequencyController;
use App\Http\Controllers\qualificationsController;
use App\Http\Controllers\languagesController;
use App\Http\Controllers\languagesSetupController;
use App\Http\Controllers\certificatesController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\skillsController;
use App\Http\Controllers\SalaryController;
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


Route::middleware('auth')->group(function () {
    //EMPLOYEEE ROUTES
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employee', [employeeController::class, 'index'])->name('employees');
    Route::get('/employees/create', [employeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', action: [employeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{id}/edit', [employeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{id}', [employeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{id}', [employeeController::class, 'destroy'])->name('employees.destroy');
    Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');

    //employee view
    Route::get('/employeedetails/{id}', [employeedetailController::class, 'index'])->name('employees.details');


    //DEPARTMENT ROUTES
    Route::get('/department', [departmentController::class, 'index'])->name('department.index');
    Route::get('/department/create', [departmentController::class, 'create'])->name('department.create');
    Route::post('/department', [departmentController::class, 'store'])->name('department.store');
    Route::get('/department/{id}/edit', [departmentController::class, 'edit'])->name('department.edit');
    Route::put('/department/{id}', [departmentController::class, 'update'])->name('department.update');
    Route::delete('/department/{id}', [departmentController::class, 'destroy'])->name('department.destroy');
    Route::get('/department/{id}/delete', [departmentController::class, 'showDeleteConfirmation'])->name('department.delete_confirmation');

    //LEAVES ROUTES
    Route::get('/leaves', [leavesController::class, 'index'])->name('leaves.index');
    Route::get('/leaves/create', [leavesController::class, 'create'])->name('leaves.create');
    Route::post('/leaves', [leavesController::class, 'store'])->name('leaves.store');
    Route::get('/leaves/{leave}/edit', [leavesController::class, 'edit'])->name('leaves.edit');
    Route::put('/leaves/{leave}', [leavesController::class, 'update'])->name('leaves.update');
    Route::delete('/leaves/{leave}', [leavesController::class, 'destroy'])->name('leaves.destroy');
    Route::get('/leaves/{leave}', [leavesController::class, 'show'])->name('leaves.show');

    //ATTENDANCE ROUTES
    Route::get('/attendance', [attendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance/login', [attendanceController::class, 'login'])->name('attendance.login');
    Route::post('/attendance/logout', [attendanceController::class, 'logout'])->name('attendance.logout');
    Route::get('/attendance/history', [attendanceController::class, 'showAttendance'])->name('attendance.history');

    //PERFORMANCE ROUTES
    Route::post('performance/store', [performanceController::class, 'store'])->name('performance.store');
    Route::get('performance', [performanceController::class, 'index'])->name('performance.index');
    Route::get('/performance/create', [performanceController::class, 'create'])->name('performance.create');
    Route::get('performance/{id}/edit', [performanceController::class, 'edit'])->name('performance.edit'); // Show form to edit a rating
    Route::put('performance/{id}', [performanceController::class, 'update'])->name('performance.update'); // Update an existing rating
    Route::delete('performance/{id}', [performanceController::class, 'destroy'])->name('performance.destroy');

    //SALARIES ROUTES
    Route::get('/salaries', [salaryController::class, 'index'])->name('salary');
    Route::post('/salaries', [salaryController::class, 'store'])->name('salaries.store');
    Route::get('/payment-frequencies', [paymentFrequencyController::class, 'index']);
    Route::get('/salary/{salary_id}', [SalaryController::class, 'show'])->name('salary.view');
    Route::get('/salary/{salary_id}/edit', [SalaryController::class, 'edit'])->name('salary.edit');
    Route::put('/salary/{salary_id}', [SalaryController::class, 'update'])->name('salary.update');
    Route::delete('/salaries/{salary_id}', [salaryController::class, 'destroy'])->name('salary.destroy');

    // PAYMENT FREQUENCY ROUTES
    Route::get('/payment-frequencies', [paymentFrequencyController::class, 'index'])->name('payment-frequency.index')->middleware('auth');
    Route::get('/payment-frequencies/create', [paymentFrequencyController::class, 'create'])->name('payment-frequency.create')->middleware('auth');
    Route::post('/payment-frequencies', [paymentFrequencyController::class, 'store'])->name('payment-frequency.store')->middleware('auth');
    Route::get('/payment-frequency/{payment_frequency_id}/edit', [paymentFrequencyController::class, 'edit'])->name('payment-frequency.edit')->middleware('auth');
    Route::put('/payment-frequency/{payment_frequency_id}', [paymentFrequencyController::class, 'update'])->name('payment-frequency.update')->middleware('auth');
    Route::delete('/payment-frequencies/{id}', [paymentFrequencyController::class, 'destroy'])->name('payment-frequency.destroy')->middleware('auth');
    Route::resource('payment-frequency', PaymentFrequencyController::class);
    Route::get('/payment-frequency/{payment_frequency_id}', [paymentFrequencyController::class, 'show'])->name('payment-frequency.show')->middleware('auth');

    //JOB ROUTES
    Route::get('/jobs', [jobController::class, 'index'])->name('job.index');
    Route::get('/jobs/create', [jobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [jobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}/edit', [jobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [jobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [jobController::class, 'destroy'])->name('jobs.destroy');
    Route::get('/jobs/{job}', [jobController::class, 'show'])->name('jobs.show');

    //ASSIGN ROUTES
    Route::get('/employee-info', [employee_infoController::class, 'index'])->name('employee_info.index');
    Route::get('/employee-info/create', [employee_infoController::class, 'create'])->name('employee_info.create');
    Route::post('/employee-info', [employee_infoController::class, 'store'])->name('employee_info.store');
    Route::get('/employee-info/{id}/edit', [employee_infoController::class, 'edit'])->name('employee_info.edit');
    Route::put('/employee-info/{id}', [employee_infoController::class, 'update'])->name('employee_info.update');
    Route::delete('/employee-info/{id}', [employee_infoController::class, 'destroy'])->name('employee_info.destroy');


    //PROFILE ROUTES
    Route::get('/profile', [employee_user_viewController::class, 'index'])->name('profile-information');

    // QUALIFICATIONS ROUTES
    Route::get('/qualifications', [qualificationsController::class, 'index'])->name('qualifications.index');

    // Certificates Routes
    Route::get('/certificates', [certificatesController::class, 'index'])->name('certificates.index');
    Route::get('certificates/create', [certificatesController::class, 'create'])->name('certificates.create');
    Route::post('certificates', [certificatesController::class, 'store'])->name('certificates.store');
    Route::get('certificates/{certificate}', [certificatesController::class, 'show'])->name('certificates.show');
    Route::get('certificates/{certificate}/edit', [certificatesController::class, 'edit'])->name('certificates.edit');
    Route::put('certificates/{certificate}', [certificatesController::class, 'update'])->name('certificates.update');
    Route::delete('certificates/{certificate}', [certificatesController::class, 'destroy'])->name('certificates.destroy');

    // Education Routes
    Route::get('/education', [educationController::class, 'index'])->name('education.index');
    Route::get('/education/create', [educationController::class, 'create'])->name('education.create');
    Route::post('/education', [educationController::class, 'store'])->name('education.store');
    Route::get('/education/{education_id}', [educationController::class, 'show'])->name('education.show');
    Route::get('/education/{education_id}/edit', [educationController::class, 'edit'])->name('education.edit');
    Route::put('/education/{education_id}', [educationController::class, 'update'])->name('education.update');
    Route::delete('/education/{education_id}', [educationController::class, 'destroy'])->name('education.destroy');

    // Skills Routes
    Route::get('/skills', [skillsController::class, 'index'])->name('skills.index');
    Route::get('/skills/create', [skillsController::class, 'create'])->name('skills.create');
    Route::post('/skills', [skillsController::class, 'store'])->name('skills.store');
    Route::get('/skills/{skill_id}/edit', [skillsController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{skill_id}', [skillsController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill_id}', [skillsController::class, 'destroy'])->name('skills.destroy');

    // Languages Routes
    Route::get('/languages', [languagesController::class, 'index'])->name('languages.index');
    Route::post('/languages', [languagesController::class, 'store'])->name('languages.store');
    Route::delete('/languages/{language_id}', [languagesController::class, 'destroy'])->name('languages.destroy');
    Route::get('/languages/{language_id}/edit', [languagesController::class, 'edit'])->name('languages.edit');
    Route::put('/languages/{language_id}', [languagesController::class, 'update'])->name('languages.update');

    // Language Setup Routes
    Route::get('/language_setup', [languagesSetupController::class, 'index'])->name('languageSetup.index');
    Route::get('/language_setup/create', [languagesSetupController::class, 'create'])->name('languageSetup.create'); // Fixed typo here
    Route::post('/language-setup', [languagesSetupController::class, 'store'])->name('languageSetup.store'); // Corrected route
    Route::get('/language-setup/{languagesetup_id}/edit', [languagesSetupController::class, 'edit'])->name('languageSetup.edit');
    Route::put('/language-setup/{languagesetup_id}', [languagesSetupController::class, 'update'])->name('languageSetup.update');
    Route::delete('/language-setup/{languagesetup_id}', [languagesSetupController::class, 'destroy'])->name('languageSetup.destroy');

});




Route::get('/reports', function () {
    return view('report');
});



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


