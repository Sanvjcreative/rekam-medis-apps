# Setup Aplikasi Rekam Medis

## Status Instalasi
✅ Semua file dan komponen telah dibuat dengan sukses!

## Yang Telah Dibuat

### 1. Authentication System
- ✅ Login Controller dengan validasi
- ✅ Logout functionality
- ✅ Login view dengan UI modern
- ✅ Route protection dengan middleware

### 2. Dashboard
- ✅ Dashboard layout dengan sidebar menu (mirip MLite)
- ✅ Menu dinamis berdasarkan role
- ✅ Statistik cards
- ✅ Responsive design

### 3. Role & Permission (Spatie)
- ✅ 3 Role: Admin, Petugas, Pasien
- ✅ Permission system lengkap
- ✅ Seeder untuk roles dan default users

### 4. Menu yang Tersedia
**Admin:**
- Dashboard
- Data Pasien
- Pemeriksaan
- Rekam Medis
- Data Petugas
- Data Poli
- Data Obat
- Laporan

**Petugas:**
- Dashboard
- Data Pasien
- Pemeriksaan
- Rekam Medis

**Pasien:**
- Dashboard
- Riwayat Pemeriksaan

## Langkah Setup

### 1. Aktifkan SQLite Extension (atau Gunakan MySQL)

**Option A: Aktifkan SQLite di PHP (Laragon)**
1. Buka Laragon
2. Menu → PHP → Extensions
3. Centang `php_pdo_sqlite` dan `php_sqlite3`
4. Restart Laragon

**Option B: Gunakan MySQL (Recommended untuk Laragon)**
1. Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rekam_medis
DB_USERNAME=root
DB_PASSWORD=
```

2. Buat database di Laragon atau MySQL:
```sql
CREATE DATABASE rekam_medis;
```

### 2. Jalankan Migrasi dan Seeder

```bash
php artisan migrate:fresh --seed
```

### 3. Default Users

Setelah seeder berjalan, Anda bisa login dengan:

**Admin:**
- Email: `admin@rekammedis.com`
- Password: `password`

**Petugas:**
- Email: `petugas@rekammedis.com`
- Password: `password`

**Pasien:**
- Email: `pasien@rekammedis.com`
- Password: `password`

### 4. Jalankan Server

```bash
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

## Struktur File yang Dibuat

```
app/
├── Http/Controllers/
│   ├── Auth/LoginController.php
│   └── DashboardController.php
└── Models/
    └── User.php (updated dengan HasRoles trait)

resources/views/
├── layouts/
│   └── app.blade.php (Dashboard layout dengan sidebar)
├── auth/
│   └── login.blade.php
└── dashboard/
    └── index.blade.php

database/seeders/
├── RolePermissionSeeder.php
└── DatabaseSeeder.php (updated)

routes/
└── web.php (updated dengan auth routes)
```

## Catatan Penting

1. **Password Default**: Semua user default menggunakan password `password`. **Ubah segera setelah login pertama!**

2. **Menu Links**: Menu-menu di sidebar masih menggunakan `href="#"` karena controller dan view untuk masing-masing fitur belum dibuat. Anda bisa membuatnya sesuai kebutuhan.

3. **Styling**: Menggunakan Bootstrap 5 dan Bootstrap Icons. UI sudah responsive dan modern.

4. **Role-Based Access**: Sidebar menu sudah otomatis menampilkan menu sesuai role user yang login.

## Next Steps

1. Buat controller dan view untuk masing-masing menu (Data Pasien, Pemeriksaan, dll)
2. Implementasi CRUD untuk setiap fitur
3. Buat model untuk Pasien, Pemeriksaan, RekamMedis, dll
4. Tambahkan validasi dan business logic
5. Tambahkan fitur export/import jika diperlukan

## Troubleshooting

**Error: "could not find driver"**
- Aktifkan SQLite extension di PHP, atau
- Ganti ke MySQL di file `.env`

**Error: "Class 'Spatie\Permission\Models\Role' not found"**
- Jalankan: `composer dump-autoload`

**Menu tidak muncul sesuai role**
- Pastikan user sudah di-assign role
- Clear cache: `php artisan permission:cache-reset`

