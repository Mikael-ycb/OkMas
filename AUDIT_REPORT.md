# 🔍 Komprehensif Audit Kodingan - OkMas Puskesmas

**Tanggal Audit:** 3 Desember 2025
**Status:** ⚠️ DITEMUKAN BANYAK ERROR & ISSUE

---

## 📋 Daftar Error yang Ditemukan

### 🔴 CRITICAL ERRORS (Harus Diperbaiki)

#### 1. **laporanAdmin/edit.blade.php** - ROUTE MISMATCH
**File:** `resources/views/laporanAdmin/edit.blade.php:6`
```php
<form action="{{ route('laporanAdmin.update', $laporan->id) }}" method="POST">
```
**Masalah:** Route expects `id_akun` parameter, bukan `id`
**Solusi:** Ganti ke `$laporan->id_akun`
```php
<form action="{{ route('laporanAdmin.update', $laporan->id_akun) }}" method="POST">
```

---

#### 2. **laporanAdmin/edit.blade.php** - UNDEFINED ID_LAPORAN
**File:** `resources/views/laporanAdmin/edit.blade.php`
**Masalah:** Baris 60 mereferensikan `$laporan->id` tapi seharusnya `$laporan->id_akun` untuk route
**Solusi:** Update route reference ke id_akun

---

#### 3. **ResepObatController.php** - TYPO FIELD NAME
**File:** `app/Http/Controllers/ResepObatController.php:25`
```php
'laporan.periksa.janjiTemu.dokter'
```
**Masalah:** Field `dokter` tidak ada, seharusnya `dokter_id` atau relasi `dokter()`
**Solusi:** Sesuaikan dengan nama relasi yang benar di model

---

#### 4. **LaporanPasienController.php** - MISSING FIELD
**File:** `app/Http/Controllers/LaporanPasienController.php:14`
```php
'resepObat.detail.obat',
```
**Masalah:** `resepObat` adalah `hasMany` tapi eager loading bisa menghasilkan N+1 query
**Solusi:** Pastikan relasi sudah correct atau gunakan with di query

---

#### 5. **PeriksaController.php** - NULL POINTER EXCEPTION
**File:** `app/Http/Controllers/PeriksaController.php:109`
```php
'anamnesis' => $periksa->janjiTemu->keluhan,
```
**Masalah:** Bisa null jika `janjiTemu` tidak ada
**Solusi:** Tambah null check
```php
'anamnesis' => $periksa->janjiTemu?->keluhan ?? '-',
```

---

### 🟡 MAJOR ISSUES

#### 6. **AdminDashboard/index.blade.php** - DUPLICATE ROUTES
**File:** `resources/views/adminDashboard/index.blade.php:136-145`
```php
<a href="{{ route('laporanAdmin.create', ['id_akun' => $jt?->id_akun]) }}">
    ✗ Decline
</a>
<a href="{{ route('laporanAdmin.create', ['id_akun' => $jt?->id_akun]) }}">
    ✓ Approve
</a>
```
**Masalah:** KEDUA BUTTON mengarah ke route yang sama (laporanAdmin.create)
**Solusi:** Seharusnya ada action berbeda (approve/decline)

---

#### 7. **web.php** - DUPLICATE ROUTES
**File:** `routes/web.php`
**Masalah:** Ada multiple route definitions untuk hal yang sama:
- Lines 45-52: laporanAdmin routes (OUTSIDE admin middleware)
- Lines 153-160: laporanAdmin routes (INSIDE admin middleware)

**Detail:**
```php
// ❌ DUPLIKAT 1 (Line 45-52) - Tanpa middleware auth/admin
Route::middleware(['auth', 'admin'])->prefix('laporanAdmin')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name('laporanAdmin.index');
    ...
});

// ❌ DUPLIKAT 2 (Line 153-160) - Dengan middleware auth/admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('laporanAdmin')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('laporanAdmin.index');
        ...
    });
});
```
**Solusi:** Hapus salah satu duplikat

---

#### 8. **web.php** - DUPLICATE ROUTES (CONTINUED)
**File:** `routes/web.php`
**Masalah:** Lebih banyak duplikat untuk routes lain:
- `updateBeritaAdmin` (Lines 59-66 dan 170-177)
- `daftarPeriksaAdmin` (Lines 68-75 dan 179-186)
- `akunPasienAdmin` (Lines 77-85 dan 188-196)
- `obatAdmin` (Lines 87-95 dan 198-206)
- `dokterAdmin` (Lines 97-105 dan 208-216)
- `klaster` (Lines 107-114 dan 218-225)
- `resep` (Lines 127-134 dan 240-247)

---

#### 9. **web.php** - OUTSIDE MIDDLEWARE ROUTES
**File:** `routes/web.php:107-114`
```php
Route::prefix('klaster')->group(function () {
    Route::get('/', [KlasterController::class, 'index'])->name('klaster.index');
    // ... tanpa middleware
});
```
**Masalah:** Klaster routes tidak dilindungi middleware auth/admin
**Solusi:** Pindahkan ke dalam admin middleware group

---

#### 10. **web.php** - UNPROTECTED RESEP ROUTES
**File:** `routes/web.php:127-134`
```php
Route::prefix('resep')->group(function () {
    Route::get('/', [ResepObatController::class, 'index'])->name('resep.index');
    // ... tanpa middleware auth
});
```
**Masalah:** Resep routes tidak dilindungi
**Solusi:** Perlu tambah middleware auth/admin

---

#### 11. **web.php** - DUPLICATE GET-DOKTER ROUTE
**File:** `routes/web.php`
**Masalah:** Ada di Line 116-118 dan Line 267-269
```php
// ❌ DUPLIKAT
Route::get('/get-dokter-by-klaster/{klaster_id}', function ($klaster_id) {
    return \App\Models\Dokter::where('klaster_id', $klaster_id)->get();
});
```
**Solusi:** Hapus duplikat, simpan hanya 1

---

#### 12. **Akun.php Model** - WRONG FOREIGN KEY
**File:** `app/Models/Akun.php:32`
```php
public function resepObat()
{
    return $this->hasMany(ResepObat::class, 'id_pasien', 'id_akun');
}
```
**Masalah:** Column `id_pasien` tidak ada di table `resep_obat`, seharusnya `id_akun`
**Solusi:**
```php
public function resepObat()
{
    return $this->hasMany(ResepObat::class, 'id_akun', 'id_akun');
}
```

---

#### 13. **KontakController.php** - MISSING NULL CHECK
**File:** `app/Http/Controllers/KontakController.php:40`
```python
Kontak::create([
    'nama'   => Auth::user()->nama,
    'email'  => $request->email,  // ❌ Bisa kosong!
    'subjek' => $request->subjek,
    'pesan'  => $request->pesan,
]);
```
**Masalah:** Email tidak divalidasi, bisa kosong
**Solusi:** Tambah validation
```php
$request->validate([
    'email' => 'required|email',
    'subjek' => 'required',
    'pesan' => 'required',
]);
```

---

#### 14. **NotifikasiController.php** - MISSING AUTH CHECK
**File:** `app/Http/Controllers/NotifikasiController.php:10`
```php
public function index()
{
    $notif = NotifikasiPasien::latest()->get();  // ❌ Semua notif, tidak filtered
}
```
**Masalah:** Notifikasi tidak di-filter untuk user yang login
**Solusi:** Tambah filter untuk current user atau null (untuk semua)

---

### 🟠 MEDIUM ISSUES

#### 15. **PeriksaController.php** - MISSING MIDDLEWARE
**File:** Routes di web.php
**Masalah:** Method `formLaporan()` dan `simpanLaporan()` tidak di-protect dengan middleware auth
**Status:** Di luar admin group (Line 165-167)
**Solusi:** Pindahkan ke dalam admin middleware

---

#### 16. **LaporanController.php** - INCOMPLETE UPDATE METHOD
**File:** `app/Http/Controllers/LaporanController.php`
**Masalah:** Edit view mencoba update `$laporan->id` tapi seharusnya `$laporan->id_akun`
**Solusi:** Update method untuk handle id_akun properly

---

#### 17. **AkunPasienController.php** - MISSING UPDATE METHOD
**File:** `app/Http/Controllers/AkunPasienController.php`
**Status:** Method `update()` tidak handle password field
**Masalah:** Password tidak bisa di-update
**Solusi:** Tambah password update logic (dengan hash)

---

#### 18. **ResepObat Model** - MISSING FIELD
**File:** `app/Models/ResepObat.php`
**Masalah:** Field `id_pasien` di fillable tapi seharusnya `id_akun`
**Solusi:** Update model

---

### 🟡 MINOR ISSUES

#### 19. **BeritaController.php** - INEFFICIENT COUNT QUERY
**File:** `app/Http/Controllers/BeritaController.php:15`
```php
$programUnik = Berita::distinct('program')->count('program');
```
**Masalah:** Bisa salah menghitung
**Solusi:**
```php
$programUnik = Berita::distinct()->count('program');
```

---

#### 20. **JanjiTemuController.php** - MISSING KLASTER SYNC
**File:** Method `store()` line 50
**Masalah:** Ketika membuat Periksa, klaster diambil dari janjiTemu tapi di simpan sebagai string
**Solusi:** Pastikan klaster data consistent

---

#### 21. **Routing Inconsistency** - POST vs PUT
**File:** `routes/web.php`
**Masalah:** Beberapa route pakai POST untuk update (should be PUT):
- `akunPasienAdmin` (Line 84): `Route::post('/update/{id}'` - ❌ Should be PUT
- `obatAdmin` (Line 95): `Route::post('/update/{id}'` - ❌ Should be PUT
- `dokterAdmin` (Line 105): `Route::post('/update/{id}'` - ❌ Should be PUT

**Solusi:** Ubah semua ke PUT dan tambah @method('PUT') di form

---

---

## 📊 SUMMARY AUDIT

| Kategori | Jumlah | Status |
|----------|--------|--------|
| 🔴 Critical | 5 | Harus diperbaiki |
| 🟡 Major | 9 | Perlu perbaikan |
| 🟠 Medium | 4 | Sebaiknya diperbaiki |
| 🟡 Minor | 3 | Teknis |
| **TOTAL** | **21** | ⚠️ |

---

## ✅ REKOMENDASI PERBAIKAN (PRIORITAS)

### Priority 1 - CRITICAL (Harus hari ini)
1. ✅ Fix laporanAdmin/edit.blade.php route mismatch
2. ✅ Fix PeriksaController null pointer exception
3. ✅ Fix Akun model resepObat relationship
4. ✅ Remove duplicate routes di web.php
5. ✅ Add admin middleware ke klaster routes

### Priority 2 - MAJOR (Minggu ini)
6. ✅ Fix AdminDashboard duplicate button routes
7. ✅ Add missing validation di KontakController
8. ✅ Fix routing: POST→PUT untuk semua update
9. ✅ Add auth check di NotifikasiController
10. ✅ Fix ResepObatController eager loading

### Priority 3 - MEDIUM (Minggu depan)
11. ✅ Add password update logic di AkunPasienController
12. ✅ Fix BeritaController count query
13. ✅ Review all null checks di views

---

## 🔧 File yang Perlu Di-Update

1. `routes/web.php` - Remove duplicates, add middleware
2. `app/Http/Controllers/LaporanController.php` - Fix id routing
3. `app/Http/Controllers/PeriksaController.php` - Add null checks
4. `app/Http/Controllers/KontakController.php` - Add validation
5. `app/Http/Controllers/ResepObatController.php` - Fix relationships
6. `app/Http/Controllers/AkunPasienController.php` - Add password update
7. `app/Models/Akun.php` - Fix resepObat foreign key
8. `resources/views/laporanAdmin/edit.blade.php` - Fix route parameter
9. `resources/views/adminDashboard/index.blade.php` - Fix button routes
10. `app/Http/Controllers/NotifikasiController.php` - Add auth filter

---

