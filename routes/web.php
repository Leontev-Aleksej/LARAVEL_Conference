<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/apply', [ApplyController::class, 'show'])->middleware('auth')->name('apply.show');
Route::post('/apply', [ApplyController::class, 'store'])->middleware('auth')->name('apply.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/approve/{report}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::post('/admin/reject/{report}', [AdminController::class, 'reject'])->name('admin.reject');
});