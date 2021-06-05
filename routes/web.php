<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserProfileController;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::post('/dashboard/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::post('/dashboard/profile/deleteavatar/{id}/{fileName}', [UserProfileController::class, 'deleteavatar'])->name('profile.deleteavatar');
});