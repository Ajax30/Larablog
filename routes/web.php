<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserProfileController;
use App\Http\Controllers\Dashboard\AuthorController;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::match(['get', 'post'],'/dashboard/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::post('/dashboard/profile/deleteavatar/{id}/{fileName}', [UserProfileController::class, 'deleteavatar'])->name('profile.deleteavatar');

    //User roles
    Route::get('/dashboard/author', [AuthorController::class, 'index']);
});
