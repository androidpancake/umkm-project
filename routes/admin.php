<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ListUserUMKMController;
use App\Http\Controllers\Admin\ComplaintUMKMController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\DashboardAdminController;

Route::group(['middleware' => 'auth:webadmin'], function(){
    Route::get('admin/daftarumkm', [ListUserUMKMController::class, 'index'])->name('admin.daftarumkm');
    Route::get('admin/view/{umkm_id}', [ListUserUMKMController::class, 'show'])->name('admin.profilumkm');
    Route::get('admin/status/{id}', [ListUserUMKMController::class, 'status'])->name('admin.approval');
    Route::get('admin/complaint', [ComplaintUMKMController::class, 'complaint'])->name('admin.complaint');
    Route::get('admin/complaint-handled/{id}', [ComplaintUMKMController::class, 'complaint_handled'])->name('admin.complaint_handled');
    Route::post('admin/reply-message/{id}', [ComplaintUMKMController::class, 'reply_message'])->name('admin.reply_message');
    Route::get('admin/complaint-done', [ComplaintUMKMController::class, 'complaint_done'])->name('admin.complaint_done');
    // Route::post('admin/complaint-action', [ComplaintUMKMController::class, 'complaint_action'])->name('admin.complaint_action');
});

?>