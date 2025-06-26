====================================================
## WEB PROGRAMING 2 -TOKO ONLINE - Laravel 10
====================================================

## Deskripsi:
-----------
Proyek ini merupakan aplikasi Toko Online sederhana berbasis Laravel.
Fitur utama meliputi manajemen produk, kategori, user (admin dan pengguna), serta sistem login berbasis role.

## Struktur Fitur:
---------------
1. Autentikasi pengguna (login/logout)
2. Role: Admin & User
3. Manajemen Produk:
   - CRUD Produk
   - Upload dan resize gambar produk (ImageHelper)
   - Filter kategori
   - Pencarian produk
   - Cetak laporan
4. Manajemen Kategori
5. Manajemen User (khusus Admin)
6. Dashboard statistik
7. Tampilan backend menggunakan Blade + TailwindCSS

## Spesifikasi Teknologi:
----------------------
- Laravel 10
- PHP >= 8.1
- MySQL / SQLite
- TailwindCSS
- Vite
- Composer
- Git

## Cara Instalasi:
---------------
1. Clone repository:
   ```bash
   git clone git@github.com:yogisaputra92/TokoOnline.git
   ```

2. Masuk ke direktori project:
   ```bash
   cd TokoOnline
   ```

3. Install dependency PHP:
   ```bash
   composer install
   ```

4. Copy file .env:
   ```bash
   cp .env.example .env
   ```

5. Atur konfigurasi database di file `.env`
    ```bash
    DB_DATABASE=db_tokoonline
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Generate key:
   ```bash
   php artisan key:generate
   ```

7. Jalankan migrasi:
   ```bash
   php artisan migrate
   ```

8. Buat folder img-produk & img user
   ```bash
   mkdir public/storage/img-produk
   mkdir public/storage/img-user

   php artisan storage:link
   ```

9. Jalankan server lokal:
   ```bash
   php artisan serve
   ```

10. Akses melalui browser:
    http://127.0.0.1:8000

## Akun Login:
-----------
- SuperAdmin
  Email   : superadmin@gmail.com
  Password: Admin123

## Catatan Khusus:
---------------
- Gunakan `auth()->user()->role` untuk membatasi akses fitur
- Semua file upload akan disimpan di direktori `storage/app/public`
- Jalankan: php artisan storage:link untuk mengakses gambar dari publik
- Project ini bersifat latihan dan pengembangan.
- Diperoleh dari modul resmi kampus, lalu dimodifikasi sesuai kebutuhan tugas.
- Dapat digunakan sebagai referensi belajar Laravel.

## Pengembang:
-----------

(M Yogi Saputra - [Web programing ll] - [Universitas Bina Sarana Informatika])

==========================================================
