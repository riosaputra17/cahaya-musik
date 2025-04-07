<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ErrorHandlingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JasaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/error-unauthorized', [ErrorHandlingController::class, 'errorUnauthorized'])->name('error-unauthorized');

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard-customer', [HomeController::class, 'index'])->name('home');
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    Route::get('/admin/jasa', [JasaController::class, 'index'])->name('jasa.index');
    Route::get('/admin/jasa/create', [JasaController::class, 'create'])->name('admin.jasa.create');
    Route::post('/admin/jasa', [JasaController::class, 'store'])->name('admin.jasa.store');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
});
