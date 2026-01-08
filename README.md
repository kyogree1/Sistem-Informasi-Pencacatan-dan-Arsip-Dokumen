# Sistem Informasi Pencatatan dan Arsip Dokumen

Sistem manajemen dokumen berbasis web untuk mengelola, mencatat, dan mengarsipkan dokumen secara digital. Proyek ini dibuat sebagai bagian dari Kerja Praktek (KP).

## Fitur Utama

- **Autentikasi Pengguna**: Login dengan role Admin dan User
- **Manajemen Dokumen**: Upload, lihat, download, dan hapus dokumen
- **Kategori Dokumen**: Organisasi dokumen berdasarkan kategori
- **Pencarian**: Cari dokumen berdasarkan judul, nomor dokumen, atau kata kunci
- **Pengarsipan**: Status dokumen aktif dan diarsipkan
- **Manajemen User**: Admin dapat mengelola pengguna sistem
- **Log Aktivitas**: Tracking aktivitas user pada dokumen
- **Laporan**: Statistik dan laporan aktivitas sistem

## Teknologi yang Digunakan

- PHP 7.4+
- MySQL 5.7+
- HTML5, CSS3, JavaScript
- PDO untuk database connection

## Persyaratan Sistem

- Web Server (Apache/Nginx)
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Extension PHP: PDO, PDO_MySQL

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/kyogree1/Sistem-Informasi-Pencacatan-dan-Arsip-Dokumen.git
cd Sistem-Informasi-Pencacatan-dan-Arsip-Dokumen
```

### 2. Setup Database

1. Buat database baru di MySQL:
```sql
CREATE DATABASE sistem_arsip_dokumen;
```

2. Import schema database:
```bash
mysql -u root -p sistem_arsip_dokumen < database/schema.sql
```

Atau jalankan file `database/schema.sql` melalui phpMyAdmin.

### 3. Konfigurasi

Edit file `config/config.php` dan sesuaikan pengaturan database:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');
define('DB_NAME', 'sistem_arsip_dokumen');
define('BASE_URL', 'http://localhost/sistem-arsip-dokumen/');
```

### 4. Set Permission

Berikan permission write pada folder uploads:

```bash
chmod -R 755 uploads/
```

### 5. Akses Aplikasi

Buka browser dan akses:
```
http://localhost/sistem-arsip-dokumen/
```

## Login Default

**Administrator:**
- Username: `admin`
- Password: `admin123`

**Catatan**: Segera ubah password default setelah login pertama kali.

## Struktur Folder

```
├── assets/
│   ├── css/         # File CSS
│   ├── js/          # File JavaScript
│   └── images/      # File gambar
├── config/
│   ├── config.php   # Konfigurasi aplikasi
│   └── database.php # Koneksi database
├── database/
│   └── schema.sql   # Schema database
├── includes/
│   └── functions.php # Helper functions
├── pages/
│   ├── admin/       # Halaman admin
│   └── user/        # Halaman user
├── uploads/
│   └── documents/   # Folder upload dokumen
├── index.php        # Halaman login
└── logout.php       # Logout handler
```

## Fitur untuk Admin

1. **Dashboard**: Melihat statistik sistem
2. **Kelola Dokumen**: Upload, edit, hapus, dan arsipkan dokumen
3. **Kategori**: Manajemen kategori dokumen
4. **Kelola User**: Tambah, hapus user
5. **Laporan**: Melihat laporan dan statistik sistem

## Fitur untuk User

1. **Dashboard**: Melihat dokumen terbaru
2. **Dokumen**: Cari, lihat, dan download dokumen
3. **Filter**: Filter dokumen berdasarkan kategori

## Keamanan

- Password di-hash menggunakan `password_hash()`
- Input di-sanitize untuk mencegah XSS
- Prepared statements untuk mencegah SQL Injection
- Session management untuk autentikasi
- Upload file validation
- Access control berdasarkan role

## Pengembangan

Untuk mengembangkan aplikasi ini:

1. Fork repository
2. Buat branch baru untuk fitur
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## Lisensi

Project ini dibuat untuk tujuan edukasi (Kerja Praktek).

## Kontak

Untuk pertanyaan atau saran, silakan hubungi:
- GitHub: [@kyogree1](https://github.com/kyogree1)

## Catatan Tambahan

- Pastikan PHP extension `pdo_mysql` sudah diaktifkan
- Untuk production, ubah error reporting di PHP
- Backup database secara berkala
- Gunakan HTTPS untuk keamanan data
- Ubah password default segera setelah instalasi