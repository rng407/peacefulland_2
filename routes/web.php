<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CaregiverController;
use App\Http\Middleware\CheckAdmin;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {

    // Bagian login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Bagian Lupa Password
    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    // Bagian reset password
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});


// --- Authenticated Routes (untuk yang sudah login) ---
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index'); // Ini yang benar;


    // mengganti password bagi caregiver
    Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('password.change'); // Form Ganti Password
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.change.post'); // Proses Ganti Password

    // Bagian resources
    Route::resource('activities', ActivityController::class); //Jika ada
    Route::resource('medicines', MedicineController::class); //Jika ada
    Route::resource('patients', PatientController::class);
    Route::middleware(CheckAdmin::class)->group(function () {
        Route::resource('caregivers', CaregiverController::class);

        // Bagian Register
        Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register']);
    });
});
