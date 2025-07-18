<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ErrorHandlingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Models\Order;

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
    Route::get('/jasa/{jasa}/edit', [JasaController::class, 'edit'])->name('admin.jasa.edit');
    Route::put('/admin/jasa/{jasa}', [JasaController::class, 'update'])->name('admin.jasa.update');
    Route::delete('/admin/jasa/{jasa}', [JasaController::class, 'destroy'])->name('admin.jasa.destroy');

    // Transaksi routes menggunakan OrderController
    Route::get('/admin/transaksi', [OrderController::class, 'index'])->name('admin.transaksi.index');
    Route::get('/admin/transaksi/create', [OrderController::class, 'create'])->name('admin.transaksi.create');
    Route::post('/admin/transaksi', [OrderController::class, 'store'])->name('admin.transaksi.store');
    Route::get('/transaksi/{transaksi}/edit', [OrderController::class, 'edit'])->name('admin.transaksi.edit');
    Route::put('/admin/transaksi/{transaksi}', [OrderController::class, 'update'])->name('admin.transaksi.update');
    Route::delete('/admin/transaksi/{transaksi}', [OrderController::class, 'destroy'])->name('admin.transaksi.destroy');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/events', [OrderController::class, 'events'])->name('orders.events');
    Route::get('/pay', [PaymentController::class, 'index']);
    Route::post('/payment/{order_id}', [PaymentController::class, 'pay'])->name('pay.start');
    Route::bind('order', function ($value) {
        return Order::where('order_id', $value)->firstOrFail();
    });
    Route::get('/payment/success/{order}', [OrderController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/pending/{order}', [OrderController::class, 'paymentPending'])->name('payment.pending');
    Route::get('/payment/expired/{order}', [OrderController::class, 'paymentExpired'])->name('payment.expired');
    Route::get('/payment/expired', [OrderController::class, 'paymentExpiredDefault'])->name('payment.expired_default');
    Route::get('/my-orders/{customer_id}', [OrderController::class, 'myOrders'])->name('orders.my');
});
