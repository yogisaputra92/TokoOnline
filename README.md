==========================================================
        WEB PROGRAMING 2 -TOKO ONLINE - Laravel 10
==========================================================

Deskripsi:
-----------
Proyek ini merupakan aplikasi Toko Online sederhana berbasis Laravel.
Fitur utama meliputi manajemen produk, kategori, user (admin dan pengguna), serta sistem login berbasis role.

Struktur Fitur:
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

Spesifikasi Teknologi:
----------------------
- Laravel 10
- PHP >= 8.1
- MySQL / SQLite
- TailwindCSS
- Vite
- Composer
- Git

Cara Instalasi:
---------------
1. Clone repository:
   git clone <url_repo>

2. Masuk ke direktori project:
   cd TokoOnline

3. Install dependency PHP:
   composer install

4. Copy file .env:
   cp .env.example .env

5. Atur konfigurasi database di file `.env`

6. Generate key:
   php artisan key:generate

7. Jalankan migrasi:
   php artisan migrate

8. (Opsional) Seed data awal:
   php artisan db:seed

9. Jalankan server lokal:
   php artisan serve

10. Akses melalui browser:
    http://127.0.0.1:8000

Akun Login:
-----------
- SuperAdmin
  Email   : admin@gmail.com
  Password: Admin123

Catatan Khusus:
---------------
- Gunakan `auth()->user()->role` untuk membatasi akses fitur
- Semua file upload akan disimpan di direktori `storage/app/public`
- Jalankan: php artisan storage:link untuk mengakses gambar dari publik
- Project ini bersifat latihan dan pengembangan.
- Diperoleh dari modul resmi kampus, lalu dimodifikasi sesuai kebutuhan tugas.
- Dapat digunakan sebagai referensi belajar Laravel.

Pengembang:
-----------

(M Yogi Saputra - [Web programing ll] - [Universitas Bina Sarana Informatika])

==========================================================
