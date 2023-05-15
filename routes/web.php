<?php

use Illuminate\Support\Facades\Route;


use \App\Http\Controllers\Front\AuthController;
use \App\Http\Controllers\Front\DocumentController;
use \App\Http\Controllers\Front\UserController;
use \App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;

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
    return \Inertia\Inertia::render('Index');
});


Route::controller(AuthController::class)
    ->group(function () {
        Route::get('register', 'showRegister')->name('showRegister');
        Route::post('/register', 'register')->name('register');
        Route::get('/login', 'showLogin')->name('showLogin');
        Route::post('/login', 'login')->name('login');
        Route::get('/verify/email/{token}', 'verifyEmail')->name('verifyEmail');
        Route::get('/re-send/verify/email', 'resendVerifyEmail')->name('resendVerifyEmail');
        Route::get('/forgot/password', 'forgotPassword')->name('forgotPassword');
        Route::post('/forgot/password', 'resetPassword')->name('resetPassword');
        Route::get('/reset/password', 'resetEmailPassword')->name('resetEmailPassword');
        Route::post('/update/password', 'updatePassword')->name('updatePassword');
    });


Route::middleware(['auth'])->prefix('user')
    ->group(function () {
        Route::get('/document', [DocumentController::class, 'index'])->name('document.index');
        Route::get('/document/create', [DocumentController::class, 'create'])->name('document.create');
        Route::post('/document/store', [DocumentController::class, 'store'])->name('document.store');
        Route::get('/document/edit/{id}', [DocumentController::class, 'edit'])->name('document.edit');
        Route::post('/document/update', [DocumentController::class, 'update'])->name('document.update');
        Route::get('/document/view/{id}', [DocumentController::class, 'view'])->name('document.view');
        Route::post('/document/delete/{id}', [DocumentController::class, 'delete'])->name('document.delete');

        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::post('/user', [UserController::class, 'updateProfile'])->name('updateProfile');
    });

Route::controller(AdminAuthController::class)->prefix('admin')
    ->name('admin.')->group(function () {
        Route::get('/login', 'showLogin')->name('showLogin');
        Route::post('/login', 'login')->name('login');
    });

Route::middleware(['CheckAdmin'])->prefix('admin')
    ->name('admin.')->group(function () {
        Route::get('/profile', [\App\Http\Controllers\Admin\AuthController::class, 'profile'])->name('profile');
        Route::post('/profile', [\App\Http\Controllers\Admin\AuthController::class, 'updateProfile'])->name('updateProfile');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/user', [AdminUserController::class, 'index'])->name('user');
        Route::get('/user/view/{id}', [AdminUserController::class, 'view'])->name('user.view');
        Route::post('/user/delete-document/{id}', [AdminUserController::class, 'deleteDocument'])->name('user.deleteDocument');
        Route::get('/user/profile/{id}', [AdminUserController::class, 'profile'])->name('user.profile');
        Route::post('/user', [AdminUserController::class, 'updateProfile'])->name('user.updateProfile');
    });

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

