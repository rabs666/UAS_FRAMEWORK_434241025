# 📚 TUTORIAL LENGKAP - TUGAS B: SISTEM ROLE-BASED ACCESS CONTROL

## 🎯 TUJUAN PEMBELAJARAN
Setelah menyelesaikan tutorial ini, Anda akan memahami:
1. Cara membuat sistem multi-role dalam Laravel
2. Implementasi CRUD untuk setiap role
3. Penerapan middleware untuk kontrol akses
4. Template layouting untuk berbagai role
5. Relasi database dan query builder

---

## 📖 DAFTAR ISI
1. [Konsep Dasar](#konsep-dasar)
2. [Struktur Database](#struktur-database)
3. [Setup Migration](#setup-migration)
4. [Buat Model](#buat-model)
5. [Buat Controller](#buat-controller)
6. [Buat View](#buat-view)
7. [Setup Routes](#setup-routes)
8. [Testing](#testing)

---

## 1️⃣ KONSEP DASAR

### Apa itu RBAC?
**Role-Based Access Control (RBAC)** = Sistem dimana setiap user punya peran, dan setiap peran punya hak akses berbeda.

### Istilah Penting:

| Istilah | Arti | Contoh |
|---------|------|--------|
| **CRUD** | Create, Read, Update, Delete | Tambah, Lihat, Edit, Hapus |
| **Master Data** | Data referensi (jarang berubah) | Jenis Hewan, Kategori |
| **Transaksional** | Data transaksi (sering berubah) | Rekam Medis, Appointment |
| **View** | Hanya lihat data | Dokter lihat data pasien |
| **Middleware** | Filter/penjaga route | Cek apakah user = dokter |
| **Foreign Key (FK)** | Penghubung antar tabel | `idpemilik` di Pet → tabel Pemilik |
| **Primary Key (PK)** | ID unik tabel | `id_pet`, `idrekam_medis` |
| **Query Builder** | Cara Laravel query database | `DB::table('pet')->get()` |
| **Blade** | Template engine Laravel | File `.blade.php` |
| **Route** | Alamat URL aplikasi | `/admin/dashboard` |
| **Controller** | Logika bisnis aplikasi | PetController.php |
| **Model** | Representasi tabel database | Pet.php |

---

## 2️⃣ STRUKTUR DATABASE

### Tabel yang Sudah Ada:
✅ **users** - Data user (email, password)
✅ **role** - Role user (Admin, Dokter, Perawat, Resepsionis, Pemilik)
✅ **dokter** - Data lengkap dokter (alamat, no_hp, bidang_dokter)
✅ **perawat** - Data lengkap perawat (alamat, no_hp, pendidikan)
✅ **pemilik** - Data pemilik hewan
✅ **jenis_hewan** - Jenis hewan (Anjing, Kucing, Burung)
✅ **ras_hewan** - Ras hewan (Golden Retriever, Persian)
✅ **kategori** - Kategori tindakan
✅ **kategori_klinis** - Kategori klinis
✅ **kode_tindakan_terapi** - Kode tindakan medis

### Tabel yang Perlu Dibuat:

#### A. **pet** (Hewan Peliharaan)
```
id_pet (PK) → ID unik pet
nama_pet → Nama hewan
jenis_kelamin → L/P
tanggal_lahir → Tanggal lahir hewan
idras_hewan (FK) → Hubung ke ras_hewan
idpemilik (FK) → Hubung ke pemilik
```

#### B. **rekam_medis** (Rekam Medis Utama)
```
idrekam_medis (PK) → ID unik rekam medis
id_pet (FK) → Pet yang diperiksa
tanggal_rekam_medis → Tanggal periksa
keluhan → Keluhan awal
diagnosa → Diagnosa umum
id_perawat (FK) → Perawat yang handle
id_dokter (FK) → Dokter yang handle
```

#### C. **detail_rekaman_medis** (Detail Tindakan)
```
iddetail_rekaman_medis (PK) → ID detail
idrekam_medis (FK) → Rekam medis mana
idkode_tindakan_terapi (FK) → Tindakan apa
hasil_pemeriksaan → Hasil detail
catatan → Catatan dokter
```

#### D. **temu_dokter** (Appointment/Jadwal)
```
id_temu_dokter (PK) → ID appointment
id_pet (FK) → Pet yang mau diperiksa
id_dokter (FK) → Dokter yang dituju
tanggal_temu → Tanggal appointment
jam_temu → Jam appointment
keluhan_awal → Keluhan awal
status → pending/confirmed/done/cancelled
```

---

## 3️⃣ SETUP MIGRATION

### Langkah 1: Buat Migration Files

```bash
php artisan make:migration create_pet_table
php artisan make:migration create_rekam_medis_table
php artisan make:migration create_detail_rekaman_medis_table
php artisan make:migration create_temu_dokter_table
```

### Langkah 2: Isi Migration

**File:** `database/migrations/xxxx_create_pet_table.php`

```php
public function up(): void
{
    Schema::create('pet', function (Blueprint $table) {
        $table->id('id_pet');
        $table->string('nama_pet', 100);
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->date('tanggal_lahir');
        $table->unsignedBigInteger('idras_hewan');
        $table->unsignedBigInteger('idpemilik');
        
        // Foreign keys
        $table->foreign('idras_hewan')->references('idras_hewan')->on('ras_hewan')->onDelete('cascade');
        $table->foreign('idpemilik')->references('idpemilik')->on('pemilik')->onDelete('cascade');
        
        $table->timestamps();
    });
}
```

**Penjelasan:**
- `id('id_pet')` → Primary key dengan nama `id_pet`
- `string('nama_pet', 100)` → Kolom text max 100 karakter
- `enum('jenis_kelamin', ['L', 'P'])` → Hanya boleh L atau P
- `unsignedBigInteger` → Tipe data untuk foreign key
- `foreign()->references()->on()` → Definisi hubungan ke tabel lain
- `onDelete('cascade')` → Kalau data induk dihapus, ini ikut terhapus

### Langkah 3: Jalankan Migration

```bash
php artisan migrate
```

**Penjelasan:**
Migration akan membuat tabel di database sesuai yang sudah didefinisikan.

---

## 4️⃣ BUAT MODEL

Model = representasi tabel dalam bentuk PHP class.

### Langkah 1: Buat Model Files

```bash
php artisan make:model Pet
php artisan make:model Rekam_Medis
php artisan make:model Detail_Rekaman_Medis
php artisan make:model TemuDokter
```

### Langkah 2: Konfigurasi Model

**File:** `app/Models/Pet.php`

```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pet';  // Nama tabel
    protected $primaryKey = 'id_pet';  // Primary key
    
    protected $fillable = [  // Kolom yang boleh diisi mass assignment
        'nama_pet',
        'jenis_kelamin',
        'tanggal_lahir',
        'idras_hewan',
        'idpemilik'
    ];
    
    // Relasi ke Ras Hewan
    public function rasHewan()
    {
        return $this->belongsTo(RasHewan::class, 'idras_hewan', 'idras_hewan');
    }
    
    // Relasi ke Pemilik
    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'idpemilik', 'idpemilik');
    }
    
    // Relasi ke Rekam Medis (satu pet punya banyak rekam medis)
    public function rekamMedis()
    {
        return $this->hasMany(Rekam_Medis::class, 'id_pet', 'id_pet');
    }
}
```

**Penjelasan:**
- `$table` → Nama tabel di database
- `$primaryKey` → Kolom primary key
- `$fillable` → Kolom yang boleh diisi lewat `create()` atau `update()`
- `belongsTo` → Relasi many-to-one (banyak pet ke 1 pemilik)
- `hasMany` → Relasi one-to-many (1 pet punya banyak rekam medis)

---

## 5️⃣ BUAT CONTROLLER

Controller = tempat logika bisnis (ambil data, simpan data, validasi).

### Untuk Admin (Full CRUD)

**File:** `app/Http/Controllers/admin/PetController.php`

```php
<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    // Tampilkan semua pet
    public function index()
    {
        $pets = DB::table('pet')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->select('pet.*', 'ras_hewan.nama_ras', 'pemilik.nama_pemilik')
            ->paginate(10);
            
        return view('Admin.Pet.index', compact('pets'));
    }
    
    // Form tambah pet
    public function create()
    {
        $rasHewan = DB::table('ras_hewan')->get();
        $pemilik = DB::table('pemilik')->get();
        
        return view('Admin.Pet.create', compact('rasHewan', 'pemilik'));
    }
    
    // Simpan pet baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pet' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
            'idpemilik' => 'required|exists:pemilik,idpemilik'
        ]);
        
        DB::table('pet')->insert([
            'nama_pet' => $validated['nama_pet'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'idras_hewan' => $validated['idras_hewan'],
            'idpemilik' => $validated['idpemilik'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        return redirect()->route('admin.pet.index')
            ->with('success', 'Pet berhasil ditambahkan');
    }
}
```

**Penjelasan:**
- `DB::table()` → Query builder Laravel
- `join()` → Gabung tabel untuk ambil data relasi
- `validate()` → Validasi input
- `required` → Wajib diisi
- `exists:table,column` → Cek data ada di tabel lain
- `compact()` → Kirim variabel ke view

### Untuk Dokter (View Only)

**File:** `app/Http/Controllers/dokter/PasienController.php`

```php
public function index()
{
    // Dokter hanya bisa lihat, tidak bisa edit/hapus
    $pasien = DB::table('pet')
        ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
        ->select('pet.*', 'pemilik.nama_pemilik', 'pemilik.no_hp')
        ->paginate(10);
        
    return view('Dokter.Pasien.index', compact('pasien'));
}
```

---

## 6️⃣ HAK AKSES SETIAP ROLE

### ADMIN
✅ CRUD semua master data (Jenis Hewan, Ras, Kategori, dll)
✅ CRUD semua transaksional (Pet, Rekam Medis, Temu Dokter)
✅ Akses penuh ke semua fitur

**Controller:** `app/Http/Controllers/Admin/`
**Route Prefix:** `/admin`
**Middleware:** `isAdministrator`

### DOKTER
✅ View data pasien (pet)
✅ View rekam medis
✅ CRUD detail rekam medis (tambah tindakan)
✅ View profil dokter sendiri

**Controller:** `app/Http/Controllers/Dokter/`
**Route Prefix:** `/dokter`
**Middleware:** `isDokter`

### PERAWAT
✅ View data pasien
✅ CRUD rekam medis utama
✅ View detail rekam medis
✅ View profil perawat sendiri

**Controller:** `app/Http/Controllers/Perawat/`
**Route Prefix:** `/perawat`
**Middleware:** `isPerawat`

### RESEPSIONIS
✅ CRUD pet dan pemilik
✅ CRUD temu dokter (appointment)

**Controller:** `app/Http/Controllers/Resepsionis/`
**Route Prefix:** `/resepsionis`
**Middleware:** `isResepsionis`

### PEMILIK
✅ View jadwal temu dokter miliknya
✅ View rekam medis pet miliknya
✅ View profil dan pet yang dimiliki

**Controller:** `app/Http/Controllers/Pemilik/`
**Route Prefix:** `/pemilik`
**Middleware:** `isPemilik`

---

## 7️⃣ TEMPLATE LAYOUTING

### Struktur Layout per Role

```
resources/views/
├── layouts/
│   ├── admin.blade.php      → Layout untuk admin
│   ├── dokter.blade.php     → Layout untuk dokter
│   ├── perawat.blade.php    → Layout untuk perawat
│   ├── resepsionis.blade.php
│   └── pemilik.blade.php
├── Admin/
│   ├── Pet/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
├── Dokter/
│   ├── Pasien/
│   └── RekamMedis/
├── Perawat/
│   ├── Pasien/
│   └── RekamMedis/
└── ...
```

### Contoh Layout Admin

**File:** `resources/views/layouts/admin.blade.php`

```html
<!DOCTYPE html>
<html>
<head>
    <title>Admin - @yield('title')</title>
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
</head>
<body>
    @include('layouts.admin.navbar')
    @include('layouts.admin.sidebar')
    
    <main>
        @yield('content')
    </main>
    
    @include('layouts.admin.footer')
    <script src="/assets/js/adminlte.min.js"></script>
</body>
</html>
```

---

## 8️⃣ ROUTING STRATEGY

### Admin Routes

```php
Route::middleware(['auth', 'isAdministrator'])->prefix('admin')->group(function () {
    // Master Data
    Route::resource('pet', PetController::class);
    Route::resource('rekam-medis', RekamMedisController::class);
    
    // dst...
});
```

### Dokter Routes

```php
Route::middleware(['auth', 'isDokter'])->prefix('dokter')->group(function () {
    Route::get('/pasien', [PasienController::class, 'index']);
    Route::get('/rekam-medis', [RekamMedisController::class, 'index']);
    Route::resource('/detail-rekam-medis', DetailRekamMedisController::class);
    Route::get('/profil', [ProfilController::class, 'show']);
});
```

---

## 9️⃣ LANGKAH IMPLEMENTASI

### Step 1: Setup Database
```bash
php artisan migrate
php artisan db:seed  # Isi data awal
```

### Step 2: Buat Controllers
```bash
php artisan make:controller Admin/PetController
php artisan make:controller Dokter/PasienController
# dst untuk semua role...
```

### Step 3: Buat Views
Buat folder dan file view sesuai struktur di atas.

### Step 4: Setup Routes
Tambahkan semua route di `routes/web.php`

### Step 5: Testing
Test setiap fitur per role:
- Login sebagai Admin → test CRUD
- Login sebagai Dokter → test view & CRUD detail
- dst...

---

## 🔟 CHECKLIST PROGRESS

### ADMIN
- [ ] CRUD Jenis Hewan
- [ ] CRUD Ras Hewan
- [ ] CRUD Kategori
- [ ] CRUD Kategori Klinis
- [ ] CRUD Role
- [ ] CRUD Pemilik
- [ ] CRUD Pet
- [ ] CRUD Kode Tindakan
- [ ] CRUD User
- [ ] CRUD Rekam Medis
- [ ] CRUD Detail Rekam Medis
- [ ] CRUD Temu Dokter

### DOKTER
- [ ] View Data Pasien (Pet)
- [ ] View Rekam Medis
- [ ] CRUD Detail Rekam Medis
- [ ] View Profil Dokter

### PERAWAT
- [ ] View Data Pasien
- [ ] CRUD Rekam Medis
- [ ] View Detail Rekam Medis
- [ ] View Profil Perawat

### RESEPSIONIS
- [ ] CRUD Pet
- [ ] CRUD Pemilik
- [ ] CRUD Temu Dokter

### PEMILIK
- [ ] View Jadwal Temu Dokter
- [ ] View Rekam Medis Pet
- [ ] View Profil & Pet Milik Sendiri

---

## 📝 TIPS & BEST PRACTICES

1. **Selalu Validasi Input**
   ```php
   $request->validate([
       'nama' => 'required|string|max:255'
   ]);
   ```

2. **Gunakan Try-Catch untuk Error Handling**
   ```php
   try {
       DB::table('pet')->insert($data);
   } catch (\Exception $e) {
       return back()->with('error', $e->getMessage());
   }
   ```

3. **Protect Routes dengan Middleware**
   ```php
   Route::middleware(['auth', 'isDokter'])->group(function () {
       // routes here
   });
   ```

4. **Gunakan Flash Messages**
   ```php
   return redirect()->route('admin.pet.index')
       ->with('success', 'Data berhasil disimpan');
   ```

5. **Pagination untuk Data Banyak**
   ```php
   $data = DB::table('pet')->paginate(10);
   ```

---

## 🎓 KESIMPULAN

Setelah menyelesaikan tutorial ini, Anda sudah:
✅ Memahami konsep RBAC
✅ Bisa membuat migration dan model
✅ Bisa membuat controller untuk berbagai role
✅ Bisa setup routing dengan middleware
✅ Bisa membuat template layouting

**Next Steps:**
1. Implementasikan satu per satu sesuai checklist
2. Test setiap fitur
3. Fix bug yang muncul
4. Deploy ke production

---

**Good Luck! 🚀**
