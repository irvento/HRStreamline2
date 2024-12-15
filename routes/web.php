<?php

use App\Http\Controllers\employee_user_viewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/employee', [employee_user_viewController::class, 'show'])->middleware('auth');

Route::get('/profile', [employee_user_viewController::class, 'index'])->name('profile-information')->middleware('auth');

Route::get('/manager/dashboard', function () {
    return view('dashboard');});
Route::get('/admin/dashboard', function () {
    return view('dashboard');});