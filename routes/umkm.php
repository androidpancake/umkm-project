<?php

use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\Customer\CategoryController;
use App\Http\Controllers\Customer\KasController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\StatistikController;
use App\Http\Controllers\Customer\TransactionController;
use App\Http\Controllers\GalleryProductController;
use App\Http\Controllers\TransactionDetailController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:web'], function(){

    //profile
    Route::get('umkm/profil', [ProfileController::class, 'index'])->name('umkm.profile');
    Route::get('umkm/profil/umkm', [ProfileController::class, 'umkm'])->name('umkm.profilumkm');
    Route::get('umkm/profil/security', [ProfileController::class, 'security'])->name('umkm.security');
    Route::put('umkm/profil/{userumkm_id}', [ProfileController::class, 'update_profile'])->name('umkm.updateprofile');
    Route::put('umkm/profil/umkm/{userumkm_id}', [ProfileController::class, 'update_umkm'])->name('umkm.updateumkm');
    Route::post('umkm/profil/update/password/{userumkm_id}', [ProfileController::class, 'update_password'])->name('umkm.update_password');
    
    //produk
    Route::resource('umkm/product', ProductController::class);
    // Route::get('umkm/produk', [ProductController::class, 'index'])->name('umkm.produk');
    // Route::get('umkm/produk/tambah', [ProductController::class, 'create'])->name('product.create');
    // Route::post('umkm/produk/tambah', [ProductController::class, 'process_create'])->name('umkm.processproduk');
    // Route::get('umkm/produk/{product}/edit', [ProductController::class, 'process_update'])->name('umkm.processupdate');
    
    //complaint
    Route::get('umkm/complaint', [ComplaintController::class, 'complaint'])->name('umkm.complaint');
    Route::post('umkm/complaint-action', [ComplaintController::class, 'complaint_action'])->name('umkm.complaint_action');
    Route::post('umkm/reply-message/{id}', [ComplaintController::class, 'reply_message'])->name('umkm.reply_message');
    Route::get('umkm/complaint-done/{id}', [ComplaintController::class, 'complaint_done'])->name('umkm.complaint_done');

    //gallery
    Route::resource('umkm/gallery', GalleryProductController::class);

    //category
    Route::resource('umkm/category', CategoryController::class);

    //transaction
    Route::get('umkm/transaction/', [TransactionController::class, 'index'])->name('transaction.index');
    Route::post('umkm/transaction/', [TransactionController::class, 'create'])->name('transaction.create');
    Route::get('umkm/transaction/show/{transaction_id}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::put('umkm/transaction/update/{transaction_id}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::delete('umkm/transaction/{transaction_id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
    Route::put('umkm/transaction/reset/{transaction_id}', [TransactionController::class, 'reset'])->name('transaction.reset');

    //transactiondetail
    Route::post('umkm/transaction/detail/{transaction_detail_id}', [TransactionDetailController::class, 'store'])->name('detail.store');
    Route::delete('umkm/transaction/detail/{transaction_detail_id}', [TransactionDetailController::class, 'destroy'])->name('detail.destroy');
    Route::get('umkm/product/result', [TransactionDetailController::class, 'search'])->name('search.product');

    //kas
    Route::get('umkm/kas', [KasController::class, 'index'])->name('kas.index');
    Route::put('umkm/kas/reset/{id}', [KasController::class, 'reset'])->name('kas.reset');

    //statistik
    Route::get('umkm/statistik', [StatistikController::class, 'index'])->name('statistik.index');
})
?>