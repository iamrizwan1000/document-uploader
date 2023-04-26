<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Front\UserController;
use \App\Http\Controllers\Admin\UserController as AdminUserController;
use \App\Http\Controllers\Front\DocumentController;


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
    return \Inertia\Inertia::render('Front/Auth/Login');
})->name('home');

// new
Route::controller(AuthController::class)
    ->group(function () {
        Route::get('register', 'showRegister')->name('showRegister');
        Route::post('/register', 'register')->name('register');
        Route::get('/login', 'showLogin')->name('showLogin');
        Route::post('/login', 'login')->name('login');
        Route::post('/jump-to-dashboard/{token}', 'jumpToDashboard')->name('jumpToDashboard');
        Route::get('/verify/email/{token}', 'verifyEmail')->name('verifyEmail');
        Route::get('/re-send/verify/email', 'resendVerifyEmail')->name('resendVerifyEmail');
        Route::get('/forgot/password', 'forgotPassword')->name('forgotPassword');
        Route::post('/forgot/password', 'resetPassword')->name('resetPassword');
        Route::get('/reset/password', 'resetEmailPassword')->name('resetEmailPassword');
        Route::post('/update/password', 'updatePassword')->name('updatePassword');
    });


Route::get('/dashboard', [UserDashboardController::class,'index'])->name('dashboard')->middleware(['auth']);
Route::middleware(['auth'])->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::post('/user', [UserController::class, 'updateProfile'])->name('updateProfile');
        Route::get('/document/create', [DocumentController::class, 'create'])->name('document.create');
        Route::post('/document/store', [DocumentController::class, 'store'])->name('document.store');
    });

Route::controller(AdminAuthController::class)->prefix('admin')
    ->name('admin.')->group(function () {
        Route::get('register', 'showRegister')->name('showRegister');
        Route::post('/register', 'register')->name('register');
        Route::get('/login', 'showLogin')->name('showLogin');
        Route::post('/login', 'login')->name('login');
    });

Route::middleware(['CheckAdmin'])->prefix('admin')
    ->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/user', [AdminUserController::class, 'index'])->name('user');
        Route::get('/user/view/{id}', [AdminUserController::class, 'view'])->name('user.view');
        Route::get('/user/profile/{id}', [AdminUserController::class, 'profile'])->name('user.profile');
        Route::post('/user', [AdminUserController::class, 'updateProfile'])->name('user.updateProfile');
    });


Route::post('/logout', [\App\Http\Controllers\Front\AuthController::class, 'logout'])
    ->name('logout');

Route::post('/admin/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])
    ->name('admin.logout');

