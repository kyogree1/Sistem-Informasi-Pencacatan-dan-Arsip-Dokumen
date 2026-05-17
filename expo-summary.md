# 📌 Rangkuman Expo SIPDA (17 Mei 2026)

## 1) Gambaran Umum Sistem
**SIPDA (Sistem Informasi Pencatatan & Arsip Dokumen)** adalah aplikasi internal untuk:
- Mencatat data dokumen debitur.
- Menyimpan lokasi fisik berkas.
- Mengelola arsip dengan lebih cepat, rapi, dan aman.

Sistem ini ditujukan untuk kebutuhan operasional kantor agar proses arsip lebih terstruktur dan mudah diaudit.

---

## 2) Fitur Utama yang Wajib Dipahami
### ✅ Dashboard
- Ringkasan data arsip.
- Statistik cepat (jumlah arsip, arsip terbaru, akun aktif).
- Akses cepat ke input arsip.

### ✅ Arsip Dokumen
- **Tambah** arsip baru.
- **Edit** arsip yang sudah ada.
- **Hapus** arsip dengan konfirmasi.
- **Pencarian** berdasarkan CIF, nama, atau No PK.

### ✅ Kode Arsip
- Pengelompokan arsip secara struktur (lokasi fisik, rak, box, dsb).

### ✅ Kelola Pegawai (Admin)
- Admin bisa mengelola data pegawai.

---

## 3) Struktur Data Arsip (Ringkas)
Field penting yang ada di form:
- **Identitas Debitur**
  - CIF  
  - Nama  
  - No Rekening  
  - Plafon  
  - Status (Lunas / Belum Lunas)  

- **Informasi Arsip & Lokasi**
  - No PK  
  - Departemen  
  - PIC  
  - Lokasi Arsip  
  - No Rak  
  - Baris Rak  
  - Keterangan  

- **Upload Berkas**
  - PDF / JPG / PNG (Max 5 MB)

---

## 4) Upload File / Foto
- File **tidak disimpan di database**, melainkan di storage.
- Database hanya menyimpan **path file**.
- Storage link sudah aktif ✅ (`php artisan storage:link`)
- File bisa diakses lewat `/storage/...`

**Keuntungan cara ini:**
- Lebih ringan untuk database.
- Lebih cepat saat akses file.
- Skalabel jika file semakin banyak.

---

## 5) UI/UX yang Sudah Diperbarui
- Desain modern & konsisten (button, card, input, tabel seragam).
- Form **create/edit** sudah rapi dan selaras.
- Dark mode tersedia (toggle di navbar).
- Layout lebih profesional & nyaman digunakan.

---

## 6) Alasan Pemilihan Tech Stack

### 🧠 Backend: **Laravel (PHP)**
**Alasan:**
- Framework stabil & populer untuk aplikasi internal.
- Validasi input kuat & mudah (mengurangi error data).
- Fitur built-in: Auth, Storage, Migration, Middleware.
- Community besar → mudah dikembangkan dan dipelihara.

### 🎨 Frontend: **Blade + Tailwind CSS**
**Alasan:**
- Blade sudah terintegrasi dengan Laravel → cepat & ringan.
- Tailwind memudahkan styling konsisten & responsif.
- Tidak perlu SPA berat → performa lebih ringan.

### ⚡ Build Tool: **Vite**
**Alasan:**
- Build cepat & modern.
- Hot reload cepat saat development.
- Support Tailwind secara optimal.

### 🗄 Database: **MySQL**
**Alasan:**
- Stabil, umum dipakai di instansi.
- Mudah integrasi dengan Laravel.
- Cocok untuk data operasional & laporan.

---

## 7) Nilai Tambah Sistem (Point Expo)
- **Efisiensi arsip**: pencarian cepat, data terpusat.
- **Akurasi lebih tinggi**: validasi otomatis dari sistem.
- **Aman & terstruktur**: akses dibatasi & data tercatat.
- **UI modern**: nyaman digunakan jangka panjang.

---

## 8) Script Demo Singkat (±1 Menit)
> “Ini SIPDA, sistem pencatatan dan arsip dokumen debitur. Di dashboard, user bisa lihat ringkasan data. Lalu di menu Arsip, user bisa tambah data, upload berkas, dan menentukan lokasi fisik arsip. Semua data dapat dicari dengan cepat. Dari sisi UI, tampilannya modern, konsisten, dan mendukung dark mode. Stack yang dipakai Laravel + Blade + Tailwind karena cepat dikembangkan, aman, dan mudah dipelihara untuk kebutuhan instansi.”

---
