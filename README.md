# Pencatatan Keuangan - Laravel 9 Project

Aplikasi pencatatan keuangan menggunakan Laravel 9 dengan Docker.

## Persyaratan Sistem

- Docker
- Docker Compose

## Cara Instalasi

1. Clone repository ini:
```bash
git clone [URL_REPOSITORY]
cd pencatatan-keuangan
```

2. Copy file .env.example menjadi .env:
```bash
cp .env.example .env
```

3. Jalankan Docker:
```bash
docker compose up -d --build
```

4. Install dependencies dan setup Laravel:
```bash
# Install composer dependencies
docker compose exec app composer install

# Generate application key
docker compose exec app php artisan key:generate

# Install npm packages dan jalankan
docker compose exec app npm install
docker compose exec app npm run dev
```

## Cara Penggunaan

Aplikasi dapat diakses melalui:
- http://localhost:3000 (dengan hot reload)
- http://localhost:8000 (tanpa hot reload)

## Fitur Development

- Hot Reload aktif di port 3000
- Browser Sync UI tersedia di port 3001
- MySQL database di port 3306
- Nginx web server di port 8000

## Database

Konfigurasi database default:
- Host: localhost
- Port: 3306
- Database: laravel
- Username: laravel
- Password: root

## Struktur Project

Project ini menggunakan struktur standar Laravel 9 dengan beberapa tambahan:
- `/docker` - Berisi konfigurasi Docker
- `docker-compose.yml` - Konfigurasi Docker Compose
- `Dockerfile` - Konfigurasi PHP-FPM image

## Development

Untuk memulai development dengan hot reload:
```bash
docker compose exec app npm run watch
```

## Troubleshooting

Jika mengalami masalah permission:
```bash
sudo chmod -R 777 storage bootstrap/cache
```
