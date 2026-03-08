<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\JenisSuratController;
use App\Http\Controllers\Admin\PermohonanController;
use App\Http\Controllers\Admin\InformasiKelurahanController;
use App\Http\Controllers\User\PermohonanUserController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

// =========================================================
// PUBLIC ROUTES — tidak perlu login
// =========================================================
Route::get('/',                 fn () => view('home'))             ->name('home');
Route::get('/profil',           fn () => view('profil'))           ->name('profil');
Route::get('/layanan',          fn () => view('layanan'))          ->name('layanan');
Route::get('/informasi',        fn () => view('informasi'))        ->name('informasi');
Route::get('/informasi/berita', fn () => view('informasi-berita')) ->name('informasi.berita');
Route::get('/kontak',           fn () => view('kontak'))           ->name('kontak');

// =========================================================
// ADMIN AREA
// =========================================================
Route::prefix('admin')->group(function () {

    Route::get('/login',  [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        Route::resource('jenis-surat', JenisSuratController::class);

        Route::get('permohonan',              [PermohonanController::class, 'index'])  ->name('permohonan.index');
        Route::get('permohonan/{id}',         [PermohonanController::class, 'show'])   ->name('permohonan.show');
        Route::put('permohonan/{id}/approve', [PermohonanController::class, 'approve'])->name('permohonan.approve');
        Route::put('permohonan/{id}/reject',  [PermohonanController::class, 'reject']) ->name('permohonan.reject');

        Route::resource('informasi-admin', InformasiKelurahanController::class);
    });
});

// =========================================================
// USER AREA — wajib login (permohonan & profil)
// =========================================================
Route::middleware('auth')->group(function () {

    // Tidak ada lagi /dashboard — setelah login user ke halaman home (/)

    Route::get('/permohonan',        [PermohonanUserController::class, 'index'])  ->name('user.permohonan.index');
    Route::get('/permohonan/create', [PermohonanUserController::class, 'create']) ->name('user.permohonan.create');
    Route::post('/permohonan',       [PermohonanUserController::class, 'store'])  ->name('user.permohonan.store');

    Route::get('/profile',  [ProfileController::class, 'edit'])  ->name('profile.edit');
    Route::put('/profile',  [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';