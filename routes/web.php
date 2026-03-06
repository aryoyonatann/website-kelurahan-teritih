<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\JenisSuratController;
use App\Http\Controllers\Admin\PermohonanController;
use App\Http\Controllers\Admin\InformasiKelurahanController;
use App\Http\Controllers\User\PermohonanUserController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

// =====================
// PUBLIC ROUTES (tanpa login)
// =====================
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/profil', function () {
    return view('profil');
})->name('profil'); // <-- tidak pakai middleware auth

Route::prefix('admin')->group(function () {

    // =====================
    // LOGIN ADMIN
    // =====================
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])
        ->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);

    // =====================
    // AREA ADMIN (LOGIN REQUIRED)
    // =====================
    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::post('/logout', [AdminLoginController::class, 'logout'])
            ->name('admin.logout');

        Route::resource('jenis-surat', JenisSuratController::class);

        Route::get('permohonan', [PermohonanController::class, 'index'])
            ->name('permohonan.index');

        Route::get('permohonan/{id}', [PermohonanController::class, 'show'])
            ->name('permohonan.show');

        Route::put('permohonan/{id}/approve', [PermohonanController::class, 'approve'])
            ->name('permohonan.approve');

        Route::put('permohonan/{id}/reject', [PermohonanController::class, 'reject'])
            ->name('permohonan.reject');

        Route::resource('informasi', InformasiKelurahanController::class);
    });
});

// =====================
// USER AREA (wajib login)
// =====================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // Permohonan — wajib login
    Route::get('/permohonan', [PermohonanUserController::class, 'index'])
        ->name('user.permohonan.index');

    Route::get('/permohonan/create', [PermohonanUserController::class, 'create'])
        ->name('user.permohonan.create');

    Route::post('/permohonan', [PermohonanUserController::class, 'store'])
        ->name('user.permohonan.store');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});

require __DIR__.'/auth.php';