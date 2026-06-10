# Sistem Manajemen Produk & Transaksi

Proyek ini adalah platform manajemen produk dan transaksi yang dibangun menggunakan [CodeIgniter 4](https://codeigniter.com/). Sistem ini menyediakan fungsionalitas lengkap untuk mengelola produk, autentikasi pengguna, dan pelacakan transaksi dengan antarmuka yang bersih dan intuitif menggunakan template NiceAdmin.

## Daftar Isi

- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)
- [Rute API](#rute-api)

## Fitur

- **Autentikasi & Otorisasi**
  - Login pengguna dengan validasi
  - Logout pengguna
  - Session-based authentication
  - Password hashing dengan bcrypt
  - Rute yang dilindungi dengan filter autentikasi

- **Manajemen Produk**
  - CRUD Produk (Tambah, Baca, Update, Hapus)
  - Upload dan penyimpanan gambar produk
  - Tracking harga dan stok produk
  - Daftar produk real-time

- **Manajemen Transaksi**
  - Pencatatan dan pelacakan transaksi
  - Riwayat transaksi pengguna
  - Laporan transaksi

- **Antarmuka Pengguna**
  - Dashboard responsif dengan template NiceAdmin
  - Desain modern dan user-friendly
  - Form dan layout yang intuitif
  - Fully responsive design

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- MySQL/MariaDB 5.7+
- Web Server (Apache/Nginx dengan XAMPP)

## Instalasi

1. **Clone repository ini**

   ```bash
   git clone <URL-repository>
   cd pwlci4
   ```

2. **Install dependensi**

   ```bash
   composer install
   ```

3. **Konfigurasi environment**

   ```bash
   cp env .env
   ```

4. **Edit file `.env`**

   ```env
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'
   database.default.hostname = localhost
   database.default.database = pwlci4_db
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   ```

5. **Generate Application Key**

   ```bash
   php spark key:generate
   ```

6. **Jalankan migrasi database**

   ```bash
   php spark migrate
   ```

7. **Jalankan development server**

   ```bash
   php spark serve
   ```

8. **Akses aplikasi**
   Buka browser dan akses `http://localhost:8080`

## Struktur Proyek

Proyek menggunakan arsitektur MVC CodeIgniter 4:

```
pwlci4/
├── app/
│   ├── Config/                  # File konfigurasi
│   ├── Controllers/             # Logika aplikasi
│   │   ├── AuthController.php   # Autentikasi pengguna
│   │   ├── ProductController.php # Manajemen produk
│   │   ├── TransactionController.php # Proses transaksi
│   │   └── BaseController.php   # Base controller
│   ├── Filters/                 # Filter autentikasi
│   ├── Models/                  # Model database
│   │   ├── UserModel.php        # Model pengguna
│   │   └── ProductModel.php     # Model produk
│   ├── Views/                   # Template UI
│   │   ├── layout.php           # Layout utama
│   │   ├── layout_clear.php     # Layout tanpa menu
│   │   ├── v_login.php          # Halaman login
│   │   ├── v_home.php           # Halaman dashboard
│   │   ├── v_transaction.php    # Halaman transaksi
│   │   ├── welcome_message.php  # Halaman sambutan
│   │   ├── product/             # Halaman manajemen produk
│   │   │   ├── index.php        # Daftar produk
│   │   │   ├── modal_add.php    # Modal form tambah produk
│   │   │   ├── modal_update.php # Modal form update produk
│   │   │   └── download_pdf.php # Export PDF produk
│   │   ├── components/          # Komponen UI reusable
│   │   └── errors/              # Halaman error
│   ├── Database/
│   │   ├── Migrations/          # Database migrations
│   │   └── Seeds/               # Database seeder
│   ├── Libraries/               # Library custom (development)
│   ├── Helpers/                 # Helper functions (development)
│   └── Language/                # File lokalisasi
├── public/
│   ├── index.php                # Entry point aplikasi
│   ├── img/                     # Storage gambar produk
│   └── NiceAdmin/               # Template admin assets
├── writable/
│   ├── cache/                   # Cache storage
│   ├── logs/                    # Log aplikasi
│   ├── session/                 # Session data
│   └── uploads/                 # File uploads
├── tests/                       # File testing
├── vendor/                      # Dependencies Composer
├── composer.json                # Konfigurasi Composer
├── .env                         # Environment variables
└── spark                        # CodeIgniter CLI tool
```

## Rute API

### Autentikasi

| Method     | Route     | Controller     | Deskripsi       | Auth  |
| ---------- | --------- | -------------- | --------------- | ----- |
| `GET`      | `/`       | Home           | Dashboard       | Tidak |
| `GET/POST` | `/login`  | AuthController | Login pengguna  | Tidak |
| `GET`      | `/logout` | AuthController | Logout pengguna | Ya    |

### Produk

| Method | Route                  | Controller        | Deskripsi            | Auth |
| ------ | ---------------------- | ----------------- | -------------------- | ---- |
| `GET`  | `/product`             | ProductController | Daftar produk        | Ya   |
| `POST` | `/product`             | ProductController | Tambah produk        | Ya   |
| `POST` | `/product/update/{id}` | ProductController | Update produk        | Ya   |
| `GET`  | `/product/delete/{id}` | ProductController | Hapus produk         | Ya   |
| `GET`  | `/product/download`    | ProductController | Export produk ke PDF | Ya   |

### Transaksi

| Method | Route                      | Controller            | Deskripsi            | Auth |
| ------ | -------------------------- | --------------------- | -------------------- | ---- |
| `GET`  | `/transaction`             | TransactionController | Lihat transaksi      | Ya   |
| `POST` | `/transaction`             | TransactionController | Tambah ke keranjang  | Ya   |
| `POST` | `/transaction/edit`        | TransactionController | Edit item keranjang  | Ya   |
| `GET`  | `/transaction/delete/{id}` | TransactionController | Hapus dari keranjang | Ya   |
| `GET`  | `/transaction/clear`       | TransactionController | Kosongkan keranjang  | Ya   |

## Lisensi

Proyek ini dilisensikan di bawah MIT License - lihat file LICENSE untuk detail.

---

**Terakhir Diperbarui**: Juni 2026
**Versi**: 1.0.0
