# 🚀 Laravel + PostgreSQL + Nginx (Docker)

Practical Test Ziyad Books

---

## 📦 Tech Stack

* Laravel 12
* PHP 8.2 (FPM)
* PostgreSQL 16
* Nginx (alpine)
* Docker & Docker Compose

---

## ⚙️ Prasyarat

Pastikan di laptop sudah terinstall:

* Docker
* Docker Compose

---

## 🚀 Quick Start & Setup

```bash
git clone <URL_REPOSITORY_GIT>
cd <nama-folder-project>

docker compose up -d --build

docker exec -it ziyad_app php artisan key:generate
docker exec -it ziyad_app php artisan migrate

```

---

## 📁 Struktur Folder

```
project-laravel/
├── app/
├── bootstrap/
├── config/
├── public/
├── storage/
├── docker/
│   └── nginx/
│       └── default.conf
├── docker-compose.yml
├── Dockerfile
├── .env
└── README.md
```

---

## 🗄️ Konfigurasi Database 

```env
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=ziyad_db
DB_USERNAME=ziyad_user
DB_PASSWORD=secret
```

> ⚠️ Jangan ganti `DB_HOST` menjadi `localhost`.

---

## 🔧 Useful Commands

```bash
# Stop container
docker compose down

# Lihat container
docker ps

# Masuk container Laravel
docker exec -it laravel_app bash

# Masuk PostgreSQL
docker exec -it postgres_db psql -U laravel_user -d laravel_db
```

---

## ❗ Troubleshooting

* **Database connection refused** → pastikan `DB_HOST=postgres`
* **Port 8000 bentrok** → ubah port di `docker-compose.yml`
* **Container mati setelah restart laptop** → sudah di-handle dengan `restart: unless-stopped`

