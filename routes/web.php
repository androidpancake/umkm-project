<?php

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\Customer\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('umkm.dashboard');
})->middleware('auth:web');

// Route::get('approval', [DashboardController::class, 'approval'])->name('approval');
// Route::get('admin/', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

Route::group(['middleware' => 'auth:webadmin'], function(){
    Route::get('admin/', [DashboardAdminController::class, 'index'])->name('admin.dashboard')->middleware('auth:webadmin');
});

Route::get('approval', [DashboardController::class, 'approval'])->name('umkm.approval');

Route::group(['middleware' => 'auth:web'], function(){
    Route::get('umkm/', [DashboardController::class, 'dashboard'])->name('umkm.dashboard')->middleware('auth:web');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/umkm.php';


