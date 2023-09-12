<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
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

Route::get('login', [AuthController::class, 'loginView'])->name('auth.login.view');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('register', [AuthController::class, 'registerView'])->name('auth.register.view');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/', [DashboardController::class, 'dashboardView'])->name('dashboard.view');
    Route::get('edit-profile', [AuthController::class, 'editView'])->name('auth.edit.view');
    Route::post('edit-profile', [AuthController::class, 'edit'])->name('auth.edit');
    Route::get('reset-password', [AuthController::class, 'resetView'])->name('auth.reset.view');
    Route::post('reset-password', [AuthController::class, 'reset'])->name('auth.reset');

    Route::group(['prefix' => 'domain', 'as' => 'domain.'], function () {
        Route::get('check', [DomainController::class, 'checkView'])->name('check.view');
        Route::post('check', [DomainController::class, 'check'])->name('check');
        Route::get('blacklist', [DomainController::class, 'blacklistView'])->name('blacklist.view');
        Route::post('blacklist', [DomainController::class, 'blacklist'])->name('blacklist');
        Route::get('feedback', [DomainController::class, 'feedbackView'])->name('feedback.view');
        Route::post('feedback', [DomainController::class, 'feedback'])->name('feedback');
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('domain', \App\Http\Controllers\Admin\DomainController::class);

    });
});
