<div align="center">

# Aplikasi Apotek

**Sistem pengelolaan data Pelanggan, Staf Apotek, dan Daftar Obat**
berbasis Laravel dengan REST API yang diuji menggunakan Postman

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)
![Postman](https://img.shields.io/badge/Postman-API%20Testing-FF6C37?logo=postman&logoColor=white)

</div>

---

## Daftar Isi

1. [Informasi Tugas](#informasi-tugas)
2. [Tentang Proyek](#tentang-proyek)
3. [Tujuan](#tujuan)
4. [Fitur](#fitur)
5. [Teknologi yang Digunakan](#teknologi-yang-digunakan)
6. [Arsitektur dan Struktur Proyek](#arsitektur-dan-struktur-proyek)
7. [Prasyarat](#prasyarat)
8. [Persiapan di Linux](#persiapan-di-linux)
9. [Cara Menjalankan](#cara-menjalankan)
10. [Halaman Aplikasi](#halaman-aplikasi)
11. [Dokumentasi API](#dokumentasi-api)
12. [Struktur Database](#struktur-database)
13. [Pengujian dengan Postman](#pengujian-dengan-postman)
14. [Pemecahan Masalah](#pemecahan-masalah)
15. [Anggota Kelompok](#anggota-kelompok)

---

## Informasi Tugas

| Keterangan | Detail |
|---|---|
| Mata kuliah | Sistem Terintegrasi |
| Kelas | TRKJ 2C |
| Dosen pengampu | Hari Toha Hidayat |
| Jenis tugas | Tugas Kelompok |
| Tahun | 2026 |

## Tentang Proyek

Aplikasi Apotek adalah aplikasi web untuk mencatat dan mengelola tiga kelompok data utama sebuah apotek, yaitu pelanggan, staf apotek, dan persediaan obat. Rancangan tampilan mengikuti dokumen rancangan yang diberikan dosen, yaitu tiga formulir input lengkap dengan tombol simpan serta pemilih tanggal pada data tanggal lahir dan tanggal kadaluarsa.

Data disimpan pada database MySQL. Selain melalui tampilan web, seluruh data juga dapat diakses dan dikelola melalui REST API yang diuji menggunakan Postman. Seluruh kode dikelola di GitHub dan dijalankan langsung dari repository ini.

## Tujuan

Proyek ini disusun untuk memenuhi empat ketentuan tugas:

1. Membuat tampilan aplikasi sesuai rancangan, lengkap dengan database, dan terhubung ke Postman.
2. Menghubungkan proyek dengan akun GitHub.
3. Menyusun laporan lengkap yang memuat dasar teori, tahapan pembuatan aplikasi, analisa hasil, kesimpulan, dan daftar pustaka.
4. Mempresentasikan proyek dengan menjalankannya langsung dari GitHub.

## Fitur

- Formulir input dan daftar data **Pelanggan**.
- Formulir input dan daftar data **Staf Apotek**, dengan pemilih tanggal lahir.
- Formulir input dan daftar **Obat**, dengan pemilih tanggal kadaluarsa.
- REST API lengkap (lihat, tambah, ubah, hapus) untuk ketiga data.
- Validasi input pada tampilan web maupun API.
- Kode obat bersifat unik sehingga tidak ada obat ganda.
- Seeder berisi data contoh sehingga aplikasi langsung terisi setelah dijalankan.
- Koleksi Postman siap impor.

## Teknologi yang Digunakan

| Komponen | Teknologi |
|---|---|
| Framework | Laravel 12 |
| Bahasa pemrograman | PHP 8.2 atau lebih baru |
| Database | MySQL |
| Tampilan | Blade dan Bootstrap 5 |
| Pengujian API | Postman |
| Version control | Git dan GitHub |
| Manajer dependensi | Composer |

## Arsitektur dan Struktur Proyek

Aplikasi menggunakan pola **MVC (Model, View, Controller)** bawaan Laravel:

- **Model** mewakili tabel database dan aturan data.
- **View** adalah tampilan Blade yang dilihat pengguna.
- **Controller** memproses permintaan, memvalidasi input, dan menghubungkan model dengan view.

Tampilan web dan API dipisahkan agar masing-masing mudah diuji:

| Jalur | Berkas rute | Controller | Keluaran |
|---|---|---|---|
| Tampilan web | `routes/web.php` | `WebController` | Halaman HTML |
| REST API | `routes/api.php` | `PelangganController`, `StafApotekController`, `ObatController` | JSON |

Berkas penting dalam proyek:

```
apotek-app/
├── app/
│   ├── Http/Controllers/    Controller web dan API
│   └── Models/              Model Pelanggan, StafApotek, Obat
├── database/
│   ├── migrations/          Definisi struktur tabel
│   └── seeders/             Data contoh
├── resources/views/         Tampilan Blade (layout, pelanggan, staf, obat)
├── routes/
│   ├── web.php              Rute tampilan
│   └── api.php              Rute API
├── postman/                 Koleksi Postman
└── .env.example             Contoh konfigurasi environment
```

## Prasyarat

Pastikan perangkat sudah terpasang:

- PHP 8.2 atau lebih baru, dengan ekstensi `pdo_mysql`, `mbstring`, `xml`, dan `curl` aktif
- Composer
- MySQL atau MariaDB (misalnya melalui XAMPP atau Laragon)
- Git
- Postman

## Persiapan di Linux

Bagian ini untuk pengguna Linux yang belum memasang kebutuhan di atas. Pengguna Windows dapat melewatinya dan memakai XAMPP atau Laragon.

### Debian dan Ubuntu

**1. Pasang paket yang dibutuhkan**

```bash
sudo apt update
sudo apt install -y git curl unzip composer mariadb-server \
  php php-cli php-mysql php-mbstring php-xml php-curl php-zip php-bcmath
```

**2. Periksa versi PHP**

```bash
php -v
```

Laravel 12 membutuhkan PHP 8.2 atau lebih baru. Debian 12 dan Ubuntu 24.04 sudah memenuhi. Pada Ubuntu 22.04, versi bawaan adalah PHP 8.1 sehingga perlu menambah repository berikut:

```bash
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install -y php8.3 php8.3-cli php8.3-mysql php8.3-mbstring php8.3-xml php8.3-curl php8.3-zip php8.3-bcmath
```

**3. Jalankan MariaDB**

```bash
sudo systemctl enable --now mariadb
```

**4. Buat database dan pengguna khusus**

Pada Debian dan Ubuntu, pengguna `root` MariaDB memakai autentikasi socket sehingga tidak dapat dipakai Laravel dengan password kosong. Karena itu buat pengguna tersendiri:

```bash
sudo mariadb -e "CREATE DATABASE apotek_db;
CREATE USER 'apotek'@'localhost' IDENTIFIED BY 'apotek123';
GRANT ALL PRIVILEGES ON apotek_db.* TO 'apotek'@'localhost';
FLUSH PRIVILEGES;"
```

Nilai yang dipakai pada `.env` nanti: `DB_USERNAME=apotek` dan `DB_PASSWORD=apotek123`. Nama pengguna dan password boleh diganti sesuai keinginan.

### Arch Linux dan turunannya

**1. Pasang paket yang dibutuhkan**

```bash
sudo pacman -S --needed git php composer mariadb
```

**2. Aktifkan ekstensi PHP**

Buka `/etc/php/php.ini`, lalu hapus tanda titik koma (`;`) di depan baris berikut:

```ini
extension=pdo_mysql
extension=mysqli
extension=iconv
extension=mbstring
extension=curl
extension=zip
```

Jika `mbstring` atau `curl` tidak ditemukan, pasang paket tambahan yang diminta oleh pesan error. Periksa hasilnya dengan `php -m`.

**3. Siapkan dan jalankan MariaDB**

```bash
sudo mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql
sudo systemctl enable --now mariadb
```

**4. Buat database dan pengguna khusus**

```bash
sudo mariadb -e "CREATE DATABASE apotek_db;
CREATE USER 'apotek'@'localhost' IDENTIFIED BY 'apotek123';
GRANT ALL PRIVILEGES ON apotek_db.* TO 'apotek'@'localhost';
FLUSH PRIVILEGES;"
```

### Memeriksa kesiapan

Jalankan perintah berikut. Semuanya harus menampilkan versi tanpa error:

```bash
php -v
composer --version
git --version
mariadb --version
```

Setelah itu lanjutkan ke bagian **Cara Menjalankan**. Pada langkah mengatur koneksi database, gunakan pengguna `apotek` yang dibuat di atas.

## Cara Menjalankan

**1. Clone repository**

```bash
git clone https://github.com/qaisar-png/apotek-app.git
cd apotek-app
```

**2. Pasang dependensi**

```bash
composer install
```

**3. Salin berkas environment**

```bash
cp .env.example .env
```

Pengguna Windows (CMD) menggunakan `copy .env.example .env`.

**4. Buat database kosong**

Buat database bernama `apotek_db` melalui phpMyAdmin atau perintah berikut:

```bash
mysql -u root -p -e "CREATE DATABASE apotek_db;"
```

Pengguna Linux yang sudah mengikuti bagian Persiapan di Linux dapat melewati langkah ini karena database sudah dibuat.

**5. Atur koneksi database**

Buka berkas `.env`, lalu ubah bagian database menjadi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=apotek_db
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan pengaturan MySQL pada perangkat masing-masing. Pengguna Linux memakai `DB_USERNAME=apotek` dan `DB_PASSWORD=apotek123` (sesuai pengguna yang dibuat pada bagian Persiapan di Linux).

**6. Buat kunci aplikasi, tabel, dan data contoh**

```bash
php artisan key:generate
php artisan migrate --seed
```

**7. Jalankan server**

```bash
php artisan serve
```

**8. Buka aplikasi**

Akses [http://127.0.0.1:8000](http://127.0.0.1:8000) pada peramban.

## Halaman Aplikasi

| Halaman | Alamat | Fungsi |
|---|---|---|
| Pelanggan | `/pelanggan` | Input dan daftar pelanggan |
| Staf Apotek | `/staf-apotek` | Input dan daftar staf apotek |
| Daftar Obat | `/obat` | Input dan daftar obat |

## Dokumentasi API

Seluruh endpoint berawalan `/api`. Sertakan header `Accept: application/json` pada setiap permintaan.

| Method | Endpoint | Fungsi | Kode sukses |
|---|---|---|---|
| GET | `/api/{resource}` | Menampilkan semua data | 200 |
| POST | `/api/{resource}` | Menambah data baru | 201 |
| GET | `/api/{resource}/{id}` | Menampilkan satu data | 200 |
| PUT | `/api/{resource}/{id}` | Mengubah data | 200 |
| DELETE | `/api/{resource}/{id}` | Menghapus data | 200 |

Nilai `{resource}` dapat berupa `pelanggan`, `staf-apotek`, atau `obat`.

Respons gagal validasi mengembalikan kode `422`, dan data yang tidak ditemukan mengembalikan kode `404`.

### Contoh Body Permintaan

**POST `/api/pelanggan`**

```json
{
    "nama": "Budi Santoso",
    "alamat": "Jl. Merdeka No. 10, Medan",
    "no_hp": "081234567890"
}
```

**POST `/api/staf-apotek`**

```json
{
    "nama": "Dewi Lestari",
    "alamat": "Jl. Melati No. 5, Medan",
    "tanggal_lahir": "1998-04-12",
    "tempat_lahir": "Medan",
    "no_hp": "081298765432"
}
```

**POST `/api/obat`**

```json
{
    "kode_obat": "OBT003",
    "nama_obat": "Paracetamol 500mg",
    "stok": 100,
    "tanggal_kadaluarsa": "2027-12-31"
}
```

**PUT `/api/obat/1`** (cukup kirim kolom yang diubah)

```json
{
    "nama_obat": "Paracetamol 500mg (Update)",
    "stok": 150
}
```

## Struktur Database

Nama database: `apotek_db`. Tabel dibuat otomatis melalui migrasi.

**Tabel `pelanggans`**

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint | Primary key, id pelanggan |
| nama | varchar(255) | Nama pelanggan |
| alamat | text | Alamat |
| no_hp | varchar(20) | Nomor HP |
| created_at, updated_at | timestamp | Dicatat otomatis |

**Tabel `staf_apoteks`**

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint | Primary key, id staf |
| nama | varchar(255) | Nama staf |
| alamat | text | Alamat |
| tanggal_lahir | date | Tanggal lahir |
| tempat_lahir | varchar(255) | Tempat lahir |
| no_hp | varchar(20) | Nomor HP |
| created_at, updated_at | timestamp | Dicatat otomatis |

**Tabel `obats`**

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint | Primary key |
| kode_obat | varchar(255) | Kode obat, unik |
| nama_obat | varchar(255) | Nama obat |
| stok | integer | Jumlah stok |
| tanggal_kadaluarsa | date | Tanggal kadaluarsa |
| created_at, updated_at | timestamp | Dicatat otomatis |

Seeder mengisi masing-masing tabel dengan dua data contoh. Untuk mengulang dari awal dan menghapus seluruh data:

```bash
php artisan migrate:fresh --seed
```

## Pengujian dengan Postman

Koleksi request tersimpan pada folder [`postman/`](postman/).

1. Buka Postman, klik **Import**, lalu pilih berkas JSON pada folder `postman/`.
2. Pastikan server berjalan (`php artisan serve`).
3. Jalankan request secara berurutan: POST, GET semua, GET satu, PUT, lalu DELETE.
4. Periksa kode status pada setiap respons sesuai tabel pada bagian Dokumentasi API.

Request GET satu, PUT, dan DELETE menggunakan id `1`. Jika data dengan id tersebut tidak ada, ubah angka pada URL sesuai id yang tersedia.

## Pemecahan Masalah

| Pesan atau gejala | Penyebab | Solusi |
|---|---|---|
| `could not find driver` | Ekstensi `pdo_mysql` belum aktif | Aktifkan `pdo_mysql` pada `php.ini` |
| `Access denied for user` | Username atau password database salah | Periksa `DB_USERNAME` dan `DB_PASSWORD` pada `.env` |
| `Access denied for user 'root'@'localhost'` di Linux | Root MariaDB memakai autentikasi socket | Buat pengguna khusus seperti pada bagian Persiapan di Linux |
| `Connection refused` pada database | Layanan MariaDB belum berjalan | Jalankan `sudo systemctl start mariadb` |
| `Unknown database 'apotek_db'` | Database belum dibuat | Buat database `apotek_db` terlebih dahulu |
| `No application encryption key` | Kunci aplikasi belum dibuat | Jalankan `php artisan key:generate` |
| `405 Method Not Allowed` pada PUT atau DELETE | URL tidak menyertakan id | Gunakan `/api/obat/1`, bukan `/api/obat` |
| `422 Unprocessable Content` | Validasi gagal, misalnya kode obat ganda | Periksa body, gunakan `kode_obat` yang belum dipakai |
| Duplikat saat `db:seed` | Data seeder sudah ada | Jalankan `php artisan migrate:fresh --seed` |
| `Permission denied` pada folder `storage` atau `bootstrap/cache` | Hak akses folder kurang | Jalankan `chmod -R 775 storage bootstrap/cache` |
| `composer install` gagal | Versi PHP terlalu rendah atau ekstensi kurang | Gunakan PHP 8.2 atau lebih baru dan aktifkan ekstensi yang diminta |

## Anggota Kelompok

| No | Nama | NIM |
|---|---|---|
| 1 | Isi nama anggota | Isi NIM |
| 2 | Isi nama anggota | Isi NIM |
| 3 | Isi nama anggota | Isi NIM |
| 4 | Isi nama anggota | Isi NIM |

---

<div align="center">

Tugas Kelompok **Sistem Terintegrasi** &middot; TRKJ 2C &middot; 2026

</div>
