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
    Route::get('/roles', [App\Http\Controllers\admin\RoleController::class, 'index'])->name('admin.role.index');
    
    // Route Kode Tindakan Terapi - CRUD
    Route::get('/kode-tindakan-terapi', [App\Http\Controllers\admin\KodeTindakanTerapiController::class, 'index'])->name('admin.kode_tindakan_terapi.index');
    Route::get('/kode-tindakan-terapi/create', [App\Http\Controllers\admin\KodeTindakanTerapiController::class, 'create'])->name('admin.kode_tindakan_terapi.create');
    Route::post('/kode-tindakan-terapi', [App\Http\Controllers\admin\KodeTindakanTerapiController::class, 'store'])->name('admin.kode_tindakan_terapi.store');
    Route::get('/kode-tindakan-terapi/{id}/edit', [App\Http\Controllers\admin\KodeTindakanTerapiController::class, 'edit'])->name('admin.kode_tindakan_terapi.edit');
    Route::put('/kode-tindakan-terapi/{id}', [App\Http\Controllers\admin\KodeTindakanTerapiController::class, 'update'])->name('admin.kode_tindakan_terapi.update');
    Route::delete('/kode-tindakan-terapi/{id}', [App\Http\Controllers\admin\KodeTindakanTerapiController::class, 'destroy'])->name('admin.kode_tindakan_terapi.destroy');
    
    // Route Pemilik - CRUD
    Route::get('/pemilik', [App\Http\Controllers\admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
    Route::get('/pemilik/create', [App\Http\Controllers\admin\PemilikController::class, 'create'])->name('admin.pemilik.create');
    Route::post('/pemilik', [App\Http\Controllers\admin\PemilikController::class, 'store'])->name('admin.pemilik.store');
    Route::get('/pemilik/{id}/edit', [App\Http\Controllers\admin\PemilikController::class, 'edit'])->name('admin.pemilik.edit');
    Route::put('/pemilik/{id}', [App\Http\Controllers\admin\PemilikController::class, 'update'])->name('admin.pemilik.update');
    Route::delete('/pemilik/{id}', [App\Http\Controllers\admin\PemilikController::class, 'destroy'])->name('admin.pemilik.destroy');
    
    // Route Pet - CRUD
    Route::get('/pet', [App\Http\Controllers\admin\PetController::class, 'index'])->name('admin.pet.index');
    Route::get('/pet/create', [App\Http\Controllers\admin\PetController::class, 'create'])->name('admin.pet.create');
    Route::post('/pet', [App\Http\Controllers\admin\PetController::class, 'store'])->name('admin.pet.store');
    Route::get('/pet/{id}/edit', [App\Http\Controllers\admin\PetController::class, 'edit'])->name('admin.pet.edit');
    Route::put('/pet/{id}', [App\Http\Controllers\admin\PetController::class, 'update'])->name('admin.pet.update');
    Route::delete('/pet/{id}', [App\Http\Controllers\admin\PetController::class, 'destroy'])->name('admin.pet.destroy');
    
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
    Route::get('/roles/create', [App\Http\Controllers\admin\RoleController::class, 'create'])->name('admin.role.create');
    Route::post('/roles', [App\Http\Controllers\admin\RoleController::class, 'store'])->name('admin.role.store');
    Route::get('/roles/{id}/edit', [App\Http\Controllers\admin\RoleController::class, 'edit'])->name('admin.role.edit');
    Route::put('/roles/{id}', [App\Http\Controllers\admin\RoleController::class, 'update'])->name('admin.role.update');
    Route::delete('/roles/{id}', [App\Http\Controllers\admin\RoleController::class, 'destroy'])->name('admin.role.destroy');

    // Route Users - CRUD
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');

    // Route Detail Rekam Medis - CRUD
    Route::get('/detail-rekam-medis', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'index'])->name('admin.detail_rekam_medis.index');
    Route::get('/detail-rekam-medis/create', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'create'])->name('admin.detail_rekam_medis.create');
    Route::post('/detail-rekam-medis', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'store'])->name('admin.detail_rekam_medis.store');
    Route::get('/detail-rekam-medis/{id}/edit', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'edit'])->name('admin.detail_rekam_medis.edit');
    Route::put('/detail-rekam-medis/{id}', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'update'])->name('admin.detail_rekam_medis.update');
    Route::delete('/detail-rekam-medis/{id}', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'destroy'])->name('admin.detail_rekam_medis.destroy');

    // Route Pet - CRUD
    Route::get('/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('admin.pet.index');
    Route::get('/pet/create', [App\Http\Controllers\Admin\PetController::class, 'create'])->name('admin.pet.create');
    Route::post('/pet', [App\Http\Controllers\Admin\PetController::class, 'store'])->name('admin.pet.store');
    Route::get('/pet/{id}/edit', [App\Http\Controllers\Admin\PetController::class, 'edit'])->name('admin.pet.edit');
    Route::put('/pet/{id}', [App\Http\Controllers\Admin\PetController::class, 'update'])->name('admin.pet.update');
    Route::delete('/pet/{id}', [App\Http\Controllers\Admin\PetController::class, 'destroy'])->name('admin.pet.destroy');

    // Route Rekam Medis - CRUD
    Route::get('/rekam-medis', [App\Http\Controllers\Admin\RekamMedisController::class, 'index'])->name('admin.rekam_medis.index');
    Route::get('/rekam-medis/create', [App\Http\Controllers\Admin\RekamMedisController::class, 'create'])->name('admin.rekam_medis.create');
    Route::post('/rekam-medis', [App\Http\Controllers\Admin\RekamMedisController::class, 'store'])->name('admin.rekam_medis.store');
    Route::get('/rekam-medis/{id}/edit', [App\Http\Controllers\Admin\RekamMedisController::class, 'edit'])->name('admin.rekam_medis.edit');
    Route::put('/rekam-medis/{id}', [App\Http\Controllers\Admin\RekamMedisController::class, 'update'])->name('admin.rekam_medis.update');
    Route::delete('/rekam-medis/{id}', [App\Http\Controllers\Admin\RekamMedisController::class, 'destroy'])->name('admin.rekam_medis.destroy');

    // Route Temu Dokter - CRUD
    Route::get('/temu-dokter', [App\Http\Controllers\Admin\TemuDokterController::class, 'index'])->name('admin.temu_dokter.index');
    Route::get('/temu-dokter/create', [App\Http\Controllers\Admin\TemuDokterController::class, 'create'])->name('admin.temu_dokter.create');
    Route::post('/temu-dokter', [App\Http\Controllers\Admin\TemuDokterController::class, 'store'])->name('admin.temu_dokter.store');
    Route::get('/temu-dokter/{id}/edit', [App\Http\Controllers\Admin\TemuDokterController::class, 'edit'])->name('admin.temu_dokter.edit');
    Route::put('/temu-dokter/{id}', [App\Http\Controllers\Admin\TemuDokterController::class, 'update'])->name('admin.temu_dokter.update');
    Route::delete('/temu-dokter/{id}', [App\Http\Controllers\Admin\TemuDokterController::class, 'destroy'])->name('admin.temu_dokter.destroy');
});

// Route Resepsionis - Protected dengan middleware isResepsionis
Route::middleware(['auth', 'isResepsionis'])->prefix('resepsionis')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Resepsionis\ResepsionisDashboardController::class, 'index'])->name('resepsionis.dashboard');
    
    // Pet - Full CRUD
    Route::get('/pet', [App\Http\Controllers\Resepsionis\PetController::class, 'index'])->name('resepsionis.pet.index');
    Route::get('/pet/create', [App\Http\Controllers\Resepsionis\PetController::class, 'create'])->name('resepsionis.pet.create');
    Route::post('/pet', [App\Http\Controllers\Resepsionis\PetController::class, 'store'])->name('resepsionis.pet.store');
    Route::get('/pet/{id}/edit', [App\Http\Controllers\Resepsionis\PetController::class, 'edit'])->name('resepsionis.pet.edit');
    Route::put('/pet/{id}', [App\Http\Controllers\Resepsionis\PetController::class, 'update'])->name('resepsionis.pet.update');
    Route::delete('/pet/{id}', [App\Http\Controllers\Resepsionis\PetController::class, 'destroy'])->name('resepsionis.pet.destroy');
    
    // Pemilik - Full CRUD
    Route::get('/pemilik', [App\Http\Controllers\Resepsionis\PemilikController::class, 'index'])->name('resepsionis.pemilik.index');
    Route::get('/pemilik/create', [App\Http\Controllers\Resepsionis\PemilikController::class, 'create'])->name('resepsionis.pemilik.create');
    Route::post('/pemilik', [App\Http\Controllers\Resepsionis\PemilikController::class, 'store'])->name('resepsionis.pemilik.store');
    Route::get('/pemilik/{id}/edit', [App\Http\Controllers\Resepsionis\PemilikController::class, 'edit'])->name('resepsionis.pemilik.edit');
    Route::put('/pemilik/{id}', [App\Http\Controllers\Resepsionis\PemilikController::class, 'update'])->name('resepsionis.pemilik.update');
    Route::delete('/pemilik/{id}', [App\Http\Controllers\Resepsionis\PemilikController::class, 'destroy'])->name('resepsionis.pemilik.destroy');
    
    // Temu Dokter - Full CRUD
    Route::get('/temu-dokter', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'index'])->name('resepsionis.temu_dokter.index');
    Route::get('/temu-dokter/create', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'create'])->name('resepsionis.temu_dokter.create');
    Route::post('/temu-dokter', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'store'])->name('resepsionis.temu_dokter.store');
    Route::get('/temu-dokter/{id}/edit', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'edit'])->name('resepsionis.temu_dokter.edit');
    Route::put('/temu-dokter/{id}', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'update'])->name('resepsionis.temu_dokter.update');
    Route::delete('/temu-dokter/{id}', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'destroy'])->name('resepsionis.temu_dokter.destroy');
});

// Route Dokter - Protected dengan middleware isDokter
Route::middleware(['auth', 'isDokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Dokter\DokterDashboardController::class, 'index'])->name('dokter.dashboard');
    
    // Pasien - View Only
    Route::get('/pasien', [App\Http\Controllers\Dokter\PasienController::class, 'index'])->name('dokter.pasien.index');
    
    // Rekam Medis - View Only
    Route::get('/rekam-medis', [App\Http\Controllers\Dokter\RekamMedisController::class, 'index'])->name('dokter.rekam_medis.index');
    
    // Detail Rekam Medis - Full CRUD
    Route::get('/detail-rekam-medis', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'index'])->name('dokter.detail_rekam_medis.index');
    Route::get('/detail-rekam-medis/create', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'create'])->name('dokter.detail_rekam_medis.create');
    Route::post('/detail-rekam-medis', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'store'])->name('dokter.detail_rekam_medis.store');
    Route::get('/detail-rekam-medis/{id}/edit', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'edit'])->name('dokter.detail_rekam_medis.edit');
    Route::put('/detail-rekam-medis/{id}', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'update'])->name('dokter.detail_rekam_medis.update');
    Route::delete('/detail-rekam-medis/{id}', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'destroy'])->name('dokter.detail_rekam_medis.destroy');
    
    // Profil - View Own
    Route::get('/profil', [App\Http\Controllers\Dokter\ProfilController::class, 'index'])->name('dokter.profil.index');
});

// Route Perawat - Protected dengan middleware isPerawat
Route::middleware(['auth', 'isPerawat'])->prefix('perawat')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Perawat\PerawatDashboardController::class, 'index'])->name('perawat.dashboard');
    
    // Pasien - View Only
    Route::get('/pasien', [App\Http\Controllers\Perawat\PasienController::class, 'index'])->name('perawat.pasien.index');
    
    // Rekam Medis - Full CRUD
    Route::get('/rekam-medis', [App\Http\Controllers\Perawat\RekamMedisController::class, 'index'])->name('perawat.rekam_medis.index');
    Route::get('/rekam-medis/create', [App\Http\Controllers\Perawat\RekamMedisController::class, 'create'])->name('perawat.rekam_medis.create');
    Route::post('/rekam-medis', [App\Http\Controllers\Perawat\RekamMedisController::class, 'store'])->name('perawat.rekam_medis.store');
    Route::get('/rekam-medis/{id}/edit', [App\Http\Controllers\Perawat\RekamMedisController::class, 'edit'])->name('perawat.rekam_medis.edit');
    Route::put('/rekam-medis/{id}', [App\Http\Controllers\Perawat\RekamMedisController::class, 'update'])->name('perawat.rekam_medis.update');
    Route::delete('/rekam-medis/{id}', [App\Http\Controllers\Perawat\RekamMedisController::class, 'destroy'])->name('perawat.rekam_medis.destroy');
    
    // Detail Rekam Medis - View Only
    Route::get('/detail-rekam-medis', [App\Http\Controllers\Perawat\DetailRekamMedisController::class, 'index'])->name('perawat.detail_rekam_medis.index');
    
    // Profil - View Own
    Route::get('/profil', [App\Http\Controllers\Perawat\ProfilController::class, 'index'])->name('perawat.profil.index');
});

// Route Pemilik - Protected dengan middleware isPemilik
Route::middleware(['auth', 'isPemilik'])->prefix('pemilik')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Pemilik\PemilikDashboardController::class, 'index'])->name('pemilik.dashboard');
    
    // Temu Dokter - View Own Only
    Route::get('/temu-dokter', [App\Http\Controllers\Pemilik\TemuDokterController::class, 'index'])->name('pemilik.temu_dokter.index');
    
    // Rekam Medis - View Own Pets Only
    Route::get('/rekam-medis', [App\Http\Controllers\Pemilik\RekamMedisController::class, 'index'])->name('pemilik.rekam_medis.index');
    
    // Profil - View Own + Pets
    Route::get('/profil', [App\Http\Controllers\Pemilik\ProfilController::class, 'index'])->name('pemilik.profil.index');
});

