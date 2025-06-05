# Aplikasi Cuti Pegawai

**Aplikasi Cuti Pegawai** adalah sistem manajemen cuti sederhana berbasis web yang memungkinkan administrator untuk mengelola data cuti pegawai. Aplikasi ini mencakup fitur autentikasi, manajemen data admin dan pegawai, serta pencatatan dan pembatasan cuti sesuai dengan kebijakan.

## Fitur Utama

### 1. Autentikasi Admin

-   Login & Logout
-   Perubahan Password
-   Pengelolaan Profil Admin

### 2. Manajemen Admin

CRUD (Create, Read, Update, Delete) untuk data admin, dengan informasi sebagai berikut:

-   Nama Depan
-   Nama Belakang
-   Email
-   Tanggal Lahir
-   Jenis Kelamin
-   Password

### 3. Manajemen Pegawai

CRUD untuk data pegawai, dengan informasi:

-   Nama Depan
-   Nama Belakang
-   Email
-   No HP
-   Alamat
-   Jenis Kelamin

### 4. Manajemen Cuti Pegawai

CRUD untuk data cuti pegawai, meliputi:

-   Alasan Cuti
-   Tanggal Mulai Cuti
-   Tanggal Selesai Cuti

**Kriteria:**

-   Setiap pegawai hanya dapat menggunakan cuti maksimal **12 hari dalam 1 tahun**.
-   Setiap pegawai hanya dapat mengambil **1 hari cuti dalam bulan yang sama**.

### 5. List Cuti Pegawai

-   Menampilkan daftar pegawai beserta riwayat cuti mereka.

## Teknologi

-   **Framework**: Laravel 12 (PHP)
-   **Database**: MySQL
-   **Frontend**: Blade dan Bootstrap 5

---

## Instalasi

```bash
git clone https://github.com/rohmatext/employee-leave.git
cd employee-leave
composer install
cp .env.example .env
php artisan key:generate
```

Jangan lupa sesuaikan konfigurasi database di `.env` lalu jalankan:

```bash
php artisan migrate
php artisan serve
```
