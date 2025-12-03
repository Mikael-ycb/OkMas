# ✅ Admin UI Testing Checklist

Panduan lengkap untuk menguji semua halaman admin yang sudah di-upgrade.

## 🎯 Akun Admin Test
- **Username**: admin
- **Password**: admin123

---

## 📋 Checklist Testing

### 1️⃣ **Akun Pasien Admin** (`/akunPasienAdmin`)
**URL**: `http://localhost:8000/akunPasienAdmin`

**Visual Elements**:
- ✅ Header gradient cyan-to-blue
- ✅ Statistik cards: Total Pasien, Role Pasien, Admin & Staff
- ✅ Button "Tambah Akun Baru" (cyan-blue gradient)
- ✅ Cards layout (2 kolom di desktop, 1 di mobile)

**Button Testing**:
- [ ] Klik "Tambah Akun Baru" → Redirect ke `/akunPasienAdmin/create`
- [ ] Klik "Edit" pada card → Redirect ke edit form
- [ ] Klik "Hapus" → Tampil konfirmasi dialog
- [ ] Konfirmasi delete → Hapus data & reload dengan notif sukses
- [ ] Pagination links work correctly

**Data Display**:
- [ ] Nama pasien ditampilkan
- [ ] ID akun dengan format 3 digit (000, 001, dll)
- [ ] Role badge: 🏥 PASIEN (biru), 🔐 ADMIN (merah), ⚕️ DOKTER (ungu)
- [ ] NIK, Username, No. Telepon ditampilkan
- [ ] Empty state muncul jika tidak ada data

---

### 2️⃣ **Data Dokter Admin** (`/dokterAdmin`)
**URL**: `http://localhost:8000/dokterAdmin`

**Visual Elements**:
- ✅ Header gradient purple-to-indigo
- ✅ Statistik cards: Total Dokter, Total Klaster, Rata-rata Dokter
- ✅ Button "Tambah Dokter Baru"
- ✅ Cards layout dengan border purple

**Button Testing**:
- [ ] Klik "Tambah Dokter Baru" → Redirect ke create form
- [ ] Klik "Edit" → Form edit
- [ ] Klik "Hapus" → Konfirmasi & delete
- [ ] Pagination work

**Data Display**:
- [ ] Nama dokter dengan emoji 👨‍⚕️
- [ ] ID dokter ditampilkan
- [ ] Spesialisasi/tipe badge
- [ ] Klaster/departemen info
- [ ] Status ✅ Aktif
- [ ] Empty state jika tidak ada dokter

---

### 3️⃣ **Data Obat Admin** (`/obatAdmin`)
**URL**: `http://localhost:8000/obatAdmin`

**Visual Elements**:
- ✅ Header gradient green-to-emerald
- ✅ Statistik cards: Total Jenis Obat, Total Stok, Stok Menipis
- ✅ Button "Tambah Obat Baru"
- ✅ Cards dengan conditional border (merah jika stok < 10, hijau normal)

**Button Testing**:
- [ ] Klik "Tambah Obat Baru" → Create form
- [ ] Klik "Edit" → Edit form
- [ ] Klik "Hapus" → Konfirmasi & delete
- [ ] Pagination

**Data Display**:
- [ ] Nama obat dengan emoji 💊
- [ ] Badge status: "⚠️ STOK MENIPIS" (merah, animated) jika stok < 10, atau "✅ TERSEDIA" (hijau)
- [ ] Dosis, Penyakit, Stok, EXP ditampilkan
- [ ] Stok warning visual jika < 10 unit
- [ ] Empty state

**Special Feature**:
- [ ] Obat dengan stok < 10 punya border merah & background berbeda
- [ ] Animasi pulse pada badge "STOK MENIPIS"

---

### 4️⃣ **Berita & Informasi Admin** (`/updateBeritaAdmin`)
**URL**: `http://localhost:8000/updateBeritaAdmin`

**Visual Elements**:
- ✅ Header gradient blue-to-cyan
- ✅ Statistik cards: Total Berita, Berita Bulan Ini, Program Unik
- ✅ Button "Buat Berita Baru"
- ✅ Cards layout dengan preview isi

**Button Testing**:
- [ ] Klik "Buat Berita Baru" → Create form
- [ ] Klik "Lihat" → Detail view
- [ ] Klik "Edit" → Edit form
- [ ] Klik "Hapus" → Konfirmasi & delete
- [ ] Pagination

**Data Display**:
- [ ] Judul berita ditampilkan (max 2 lines)
- [ ] Tanggal dalam format "dd M yyyy"
- [ ] Badge program (jika ada)
- [ ] Preview isi (3 lines max dengan ellipsis)
- [ ] Tanggal dibuat & diupdate
- [ ] Empty state

---

### 5️⃣ **Resep Obat Admin** (`/resep`)
**URL**: `http://localhost:8000/resep`

**Visual Elements**:
- ✅ Header gradient orange-to-red
- ✅ Statistik cards (sudah di-upgrade)
- ✅ Cards layout dengan info obat
- ✅ Preview daftar obat dalam card

**Functionality Check**:
- [ ] Detail resep bisa diakses
- [ ] Delete dengan stok restore
- [ ] Pagination work

---

## 🔧 Route Mapping & Verifikasi

### Akun Pasien Routes ✅
```
GET    /akunPasienAdmin          → index (list)
GET    /akunPasienAdmin/create   → create form
POST   /akunPasienAdmin/store    → save
GET    /akunPasienAdmin/edit/{id} → edit form
POST   /akunPasienAdmin/update/{id} → update
DELETE /akunPasienAdmin/{id}     → delete
```

### Dokter Routes ✅
```
GET    /dokterAdmin              → index
GET    /dokterAdmin/create       → create
POST   /dokterAdmin/store        → save
GET    /dokterAdmin/edit/{id}    → edit
POST   /dokterAdmin/update/{id}  → update
DELETE /dokterAdmin/{id}         → delete
```

### Obat Routes ✅
```
GET    /obatAdmin                → index
GET    /obatAdmin/create         → create
POST   /obatAdmin/store          → save
GET    /obatAdmin/edit/{id}      → edit
POST   /obatAdmin/update/{id}    → update
DELETE /obatAdmin/{id}           → delete
```

### Berita Routes ✅
```
GET    /updateBeritaAdmin        → index
GET    /updateBeritaAdmin/create → create
POST   /updateBeritaAdmin/store  → save
GET    /updateBeritaAdmin/edit/{id} → edit
PUT    /updateBeritaAdmin/update/{id} → update
GET    /updateBeritaAdmin/show/{id} → detail
DELETE /updateBeritaAdmin/delete/{id} → delete
```

### Resep Routes ✅
```
GET    /resep                    → index
GET    /resep/create             → create
POST   /resep/store              → save
GET    /resep/{id}               → detail
DELETE /resep/{id}               → delete
```

---

## ⚙️ Technical Checks

### HTML/Form Elements
- [ ] Semua form method POST dengan @csrf
- [ ] Delete form menggunakan @method('DELETE')
- [ ] Confirm dialog menggunakan onsubmit="return confirm(...)"
- [ ] Responsive design: 1 kolom di mobile, 2 di desktop

### Styling
- [ ] Gradient headers berwarna sesuai theme
- [ ] Cards punya shadow & border
- [ ] Hover effects smooth
- [ ] Buttons responsive & accessible
- [ ] Emoji icons muncul dengan benar

### JavaScript
- [ ] Confirm dialog muncul saat delete
- [ ] Tidak ada console errors
- [ ] Form submission bekerja
- [ ] Pagination links berfungsi

---

## 📊 Statistics Calculations

### Akun Pasien
- Total: `$akun->total()`
- Pasien: `$akun->where('role', 'pasien')->count()`
- Admin/Staff: `$akun->whereIn('role', ['admin', 'dokter'])->count()`

### Dokter
- Total: `$dokter->total()`
- Klaster: `$dokter->groupBy('klaster_id')->count()`
- Rata-rata: `total dokter / total klaster`

### Obat
- Total: `$obat->total()`
- Stok: `$obat->sum('stok')`
- Menipis: `$obat->where('stok', '<', 10)->count()`

### Berita
- Total: `$berita->total()`
- Bulan Ini: Berita dengan tanggal bulan/tahun sekarang
- Program: `$berita->pluck('program')->unique()->count()`

---

## 🐛 Potential Issues & Fixes

### Jika Statistik Tidak Muncul
```
Pastikan query di controller eager loading data:
- AkunPasienController index() method
- DokterController index() method
- ObatController index() method
- BeritaController index() method
```

### Jika Buttons Tidak Berfungsi
```
Verify routes di web.php sudah terdefinisi dengan benar
Cek naming convention: berita.destroy vs updateBeritaAdmin.destroy
```

### Jika Delete Tidak Muncul Konfirmasi
```
Pastikan form punya onsubmit="return confirm('...');"
```

### Jika Responsive Tidak Berfungsi
```
Cek Tailwind classes: grid-cols-1, lg:grid-cols-2
Browser zoom: 100%
Cek browser console untuk errors
```

---

## ✨ Features Summary

| Page | Cards | Stats | Search | Filter | Edit | Delete | Create |
|------|-------|-------|--------|--------|------|--------|--------|
| Akun Pasien | ✅ | ✅ (3) | ❌ | ❌ | ✅ | ✅ | ✅ |
| Dokter | ✅ | ✅ (3) | ❌ | ❌ | ✅ | ✅ | ✅ |
| Obat | ✅ | ✅ (3) | ❌ | ❌ | ✅ | ✅ | ✅ |
| Berita | ✅ | ✅ (3) | ❌ | ❌ | ✅ | ✅ | ✅ |
| Resep | ✅ | ✅ (3) | ❌ | ❌ | ❌ | ✅ | ✅ |

---

## 🚀 Next Steps

Setelah semua testing selesai:
1. ✅ Screenshot pages untuk dokumentasi
2. ✅ Test performance (load time)
3. ✅ Test dengan data banyak (pagination)
4. ✅ Cross-browser testing
5. ✅ Mobile responsiveness testing

---

**Last Updated**: 3 December 2025
**Testing Framework**: Manual + Browser Console
**Status**: Ready for Testing ✅
