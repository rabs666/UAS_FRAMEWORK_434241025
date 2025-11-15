<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Site\SiteController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('site.cek-koneksi');

// Authentication Routes
Auth::routes();

// Protected Routes - Semua route di bawah ini memerlukan authentication
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');

// Route Admin - Protected dengan middleware isAdministrator
Route::middleware(['auth', 'isAdministrator'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/jenis-hewan', [App\Http\Controllers\admin\JenisHewanController::class, 'index'])->name('admin.jenis_hewan.index');
    Route::get('/kategori', [App\Http\Controllers\admin\KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/kategori-klinis', [App\Http\Controllers\admin\KategoriKlinisController::class, 'index'])->name('admin.kategori_klinis.index');
    Route::get('/ras-hewan', [App\Http\Controllers\admin\RasHewanController::class, 'index'])->name('admin.ras_hewan.index');
    Route::get('/roles', [App\Http\Controllers\admin\RoleController::class, 'index'])->name('admin.roles.index');
    
    // Route Pemilik - CRUD
    Route::get('/pemilik', [App\Http\Controllers\admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
    Route::get('/pemilik/create', [App\Http\Controllers\admin\PemilikController::class, 'create'])->name('admin.pemilik.create');
    Route::post('/pemilik', [App\Http\Controllers\admin\PemilikController::class, 'store'])->name('admin.pemilik.store');
    Route::get('/pemilik/{id}/edit', [App\Http\Controllers\admin\PemilikController::class, 'edit'])->name('admin.pemilik.edit');
    Route::put('/pemilik/{id}', [App\Http\Controllers\admin\PemilikController::class, 'update'])->name('admin.pemilik.update');
    Route::delete('/pemilik/{id}', [App\Http\Controllers\admin\PemilikController::class, 'destroy'])->name('admin.pemilik.destroy');
    // Route Jenis Hewan - CRUD
    Route::get('jenis-hewan/create', [App\Http\Controllers\admin\JenisHewanController::class, 'create'])->name('admin.jenis_hewan.create');
    Route::post('jenis-hewan', [App\Http\Controllers\admin\JenisHewanController::class, 'store'])->name('admin.jenis_hewan.store');
    Route::get('jenis-hewan/{id}/edit', [App\Http\Controllers\admin\JenisHewanController::class, 'edit'])->name('admin.jenis_hewan.edit');
    Route::put('jenis-hewan/{id}', [App\Http\Controllers\admin\JenisHewanController::class, 'update'])->name('admin.jenis_hewan.update');
    Route::delete('jenis-hewan/{id}', [App\Http\Controllers\admin\JenisHewanController::class, 'destroy'])->name('admin.jenis_hewan.destroy');
    
    // Route Kategori - CRUD
    Route::get('/kategori/create', [App\Http\Controllers\admin\KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/kategori', [App\Http\Controllers\admin\KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/kategori/{id}/edit', [App\Http\Controllers\admin\KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/kategori/{id}', [App\Http\Controllers\admin\KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/kategori/{id}', [App\Http\Controllers\admin\KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
    
    // Route Kategori Klinis - CRUD
    Route::get('/kategori-klinis/create', [App\Http\Controllers\admin\KategoriKlinisController::class, 'create'])->name('admin.kategori_klinis.create');
    Route::post('/kategori-klinis', [App\Http\Controllers\admin\KategoriKlinisController::class, 'store'])->name('admin.kategori_klinis.store');
    Route::get('/kategori-klinis/{id}/edit', [App\Http\Controllers\admin\KategoriKlinisController::class, 'edit'])->name('admin.kategori_klinis.edit');
    Route::put('/kategori-klinis/{id}', [App\Http\Controllers\admin\KategoriKlinisController::class, 'update'])->name('admin.kategori_klinis.update');
    Route::delete('/kategori-klinis/{id}', [App\Http\Controllers\admin\KategoriKlinisController::class, 'destroy'])->name('admin.kategori_klinis.destroy');
    
    // Route Ras Hewan - CRUD
    Route::get('/ras-hewan/create', [App\Http\Controllers\admin\RasHewanController::class, 'create'])->name('admin.ras_hewan.create');
    Route::post('/ras-hewan', [App\Http\Controllers\admin\RasHewanController::class, 'store'])->name('admin.ras_hewan.store');
    Route::get('/ras-hewan/{id}/edit', [App\Http\Controllers\admin\RasHewanController::class, 'edit'])->name('admin.ras_hewan.edit');
    Route::put('/ras-hewan/{id}', [App\Http\Controllers\admin\RasHewanController::class, 'update'])->name('admin.ras_hewan.update');
    Route::delete('/ras-hewan/{id}', [App\Http\Controllers\admin\RasHewanController::class, 'destroy'])->name('admin.ras_hewan.destroy');
    
    // Route Roles - CRUD
    Route::get('/roles/create', [App\Http\Controllers\admin\RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/roles', [App\Http\Controllers\admin\RoleController::class, 'store'])->name('admin.roles.store');

    // Route Users - CRUD
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
});

// Route Resepsionis - Protected dengan middleware isResepsionis
Route::middleware(['auth', 'isResepsionis'])->prefix('resepsionis')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Resepsionis\ResepsionisDashboardController::class, 'index'])->name('resepsionis.dashboard');
});

// Route Dokter - Protected dengan middleware isDokter
Route::middleware(['auth', 'isDokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Dokter\DokterDashboardController::class, 'index'])->name('dokter.dashboard');
});

// Route Perawat - Protected dengan middleware isPerawat
Route::middleware(['auth', 'isPerawat'])->prefix('perawat')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Perawat\PerawatDashboardController::class, 'index'])->name('perawat.dashboard');
});

// Route Pemilik - Protected dengan middleware isPemilik
Route::middleware(['auth', 'isPemilik'])->prefix('pemilik')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Pemilik\PemilikDashboardController::class, 'index'])->name('pemilik.dashboard');
});

