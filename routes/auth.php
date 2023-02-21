<?php

// use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\AuthUMKMController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\Customer\DashboardController;
// use App\Http\Controllers\Customer\RegisterController as CustomerRegisterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Customer\RegisterController as UMKMRegisterController;
use Illuminate\Support\Facades\Route;

//register
Route::get('admin/register', [RegisterController::class, 'register']);
Route::post('store', [RegisterController::class, 'store'])->name('store');

//login
Route::get('admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login_action'])->name('admin.login_action');

//logout
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

//password

//umkm approve
Route::middleware(['auth'])->group(function(){
    // Route::get('approval', [DashboardController::class, 'approval'])->name('approval');
    
    // Route::middleware(['approved'])->group(function (){
    //     Route::get('login-umkm', [AuthUMKMController::class, 'login'])->name('login-umkm');
    // });
});

//regis umkm
// Route::get('umkm/', [AuthUMKMController::class, 'index']);
Route::get('umkm/register', [UMKMRegisterController::class, 'register'])->name('umkm.register-umkm');
Route::post('umkm/register', [UMKMRegisterController::class, 'store'])->name('umkm.storeumkm');

//login umkm
Route::get('umkm/login', [AuthUMKMController::class, 'login'])->name('umkm.login-umkm');
Route::post('umkm/login', [AuthUMKMController::class, 'login_action'])->name('umkm.login_action_umkm');

//logout umkm
Route::post('/logout', [AuthUMKMController::class, 'logout'])->name('umkm.logout');