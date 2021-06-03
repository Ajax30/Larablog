<?php

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

Route::get('/', [App\Http\Controllers\Frontend\HomepageController::class, 'index'])->name('homepage');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/profile', [App\Http\Controllers\Dashboard\UserProfileController::class, 'index'])->name('profile');

Route::post('/dashboard/profile/update', [App\Http\Controllers\Dashboard\UserProfileController::class, 'update'])->name('profile.update');

Route::post('/dashboard/profile/deleteavatar/{id}/{fileName}', [App\Http\Controllers\Dashboard\UserProfileController::class, 'deleteavatar'])->name('profile.deleteavatar');