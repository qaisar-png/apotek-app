# Aplikasi Apotek

## Cara menjalankan
1. git clone https://github.com/qaisar-png/apotek-app.git
2. cd apotek-app
3. composer install
4. copy .env.example .env   (Linux/Mac: cp .env.example .env)
5. Atur DB_DATABASE=apotek_db di file .env, lalu buat database apotek_db di phpMyAdmin
6. php artisan key:generate
7. php artisan migrate
8. php artisan serve

## Endpoint API
- /api/pelanggan
- /api/staf-apotek
- /api/obat
## Anggota Kelompok
- QAISAR
- Yanis
