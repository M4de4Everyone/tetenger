<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\Admin\SiteController as AdminSiteController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', [SiteController::class, 'home'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| Registrasi
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
});


/*
|--------------------------------------------------------------------------
| Dashboard Pengguna
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'role:pengguna'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Dashboard Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Daftar dan Detail Situs
|--------------------------------------------------------------------------
*/

Route::get('/situs', [SiteController::class, 'index'])
    ->name('sites.index');

Route::get('/situs/{sites_id}', [SiteController::class, 'show'])
    ->whereNumber('sites_id')
    ->name('sites.show');

Route::get('/situs/{sites_id}/galeri', [GalleryController::class, 'index'])
    ->whereNumber('sites_id')
    ->name('galleries.index');

Route::get('/situs/{sites_id}/timeline', [TimelineController::class, 'index'])
    ->whereNumber('sites_id')
    ->name('timeline.index');

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/sites', [AdminSiteController::class, 'index'])
            ->name('sites.index');
        });