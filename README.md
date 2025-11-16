# 🌿 **OKMAS – Sistem Informasi Pelayanan Kesehatan**

### *Aplikasi Pelayanan Kesehatan Modern Berbasis Web (Laravel + TailwindCSS)*

OKMAS adalah aplikasi layanan kesehatan berbasis web yang dirancang untuk mempermudah administrasi klinik/puskesmas dalam pengelolaan **laporan pasien, daftar periksa, obat, dokter, berita, akun pasien**, dan sistem **janji temu**.
Sistem ini mendukung **dua role** pengguna:

* **Admin** – akses penuh untuk mengelola seluruh data
* **Pasien** – melakukan login, membuat janji temu, dan melihat laporan medis

---

## 🚀 **Fitur Utama**

### 🔐 **1. Login Role-based (Admin & Pasien)**

* Login menggunakan **NIK atau Username**
* Password tersimpan aman (hashed)
* Redirect otomatis:

  * Admin → Dashboard Admin
  * Pasien → Home Page

### 📄 **2. Manajemen Laporan Pasien**

* Tambah laporan pemeriksaan
* Edit laporan per ID pemeriksaan
* Tampilkan detail seluruh riwayat pasien per NIK
* Delete laporan
* Pagination & tampilan rapi

### 🧾 **3. Modul Berita (Blog)**

* Admin bisa:

  * Tambah berita
  * Edit & Hapus berita
  * Upload gambar berita

### 👨‍⚕️ **4. Modul Dokter**

* Klaster dokter:

  * Umum
  * Gigi dan Mulut
  * Bidan
* CRUD lengkap: Tambah, Edit, Hapus dokter

### 💊 **5. Modul Obat**

* Data obat lengkap:

  * Nama obat
  * Kode obat
  * Stok
  * Tanggal masuk
  * Tanggal expired
* CRUD penuh

### 📋 **6. Daftar Periksa**

* Menampilkan pemeriksaan berdasarkan tanggal dan klaster
* Toggle status pasien (Aktif / Tidak aktif)
* AJAX tanpa reload
* Pagination

### 👤 **7. Manajemen Akun Pasien**

* Admin dapat:

  * Menambah akun pasien
  * Edit akun pasien
  * Hapus akun pasien
* Validasi input lengkap dan jelas

### 📅 **8. Janji Temu**

* Pasien dapat membuat janji temu
* Admin dapat edit & hapus

---

## 🛠️ **Tech Stack**

| Teknologi             | Digunakan Untuk              |
| --------------------- | ---------------------------- |
| **Laravel 10+**       | Backend, Routing, Validation |
| **Blade Template**    | View engine                  |
| **TailwindCSS**       | Styling UI                   |
| **SQLite**            | Database development         |
| **JavaScript (AJAX)** | Interaksi dinamis            |
| **Vite**              | Build assets                 |
| **UI Avatars API**    | Auto profile image           |

---

## 🗂️ **Struktur Folder Penting**

```
/app
  /Http/Controllers
    LoginController.php
    LaporanController.php
    DokterController.php
    ObatController.php
    BeritaController.php
    PeriksaController.php
    AkunPasienController.php

/resources/views
  /components
  /laporanAdmin
  /dokterAdmin
  /obatAdmin
  /akunPasienAdmin
  /updateBeritaAdmin
  /janjiTemu
  home.blade.php
  login.blade.php

/database
  /migrations
  /seeders
    UserSeeder.php
```

---

## 🧬 **Skema Database**

### **Tabel `akun`**

| Kolom         | Tipe               |
| ------------- | ------------------ |
| id            | bigint             |
| nama          | string             |
| nik           | string (unique)    |
| username      | string (unique)    |
| password      | string             |
| tanggal_lahir | date               |
| jenis_kelamin | enum               |
| pekerjaan     | string             |
| status        | string             |
| no_telepon    | string             |
| alamat        | text               |
| role          | enum(admin/pasien) |

### **Tabel `laporan`**

Berisi data pemeriksaan pasien lengkap seperti:

* tanggal
* jenis_pemeriksaan
* anamnesis
* tekanan darah
* riwayat penyakit
* hasil pemeriksaan

### **Tabel `dokters`, `obats`, dll**

Semuanya sudah mengikuti struktur CRUD dan migration masing-masing.

---

## 📸 **Tampilan UI Singkat**

> (Tambahkan screenshot di sini jika mau, nanti aku formatin biar keren)

---

## 🧪 **Cara Menjalankan Project**

### **1. Install dependency**

```sh
composer install
npm install
```

### **2. Copy file .env**

```sh
cp .env.example .env
```

### **3. Generate key**

```sh
php artisan key:generate
```

### **4. Migrasi & Seeder**

```sh
php artisan migrate --seed
```

### **5. Jalankan Development Server**

```sh
php artisan serve
npm run dev
```

---