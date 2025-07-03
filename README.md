# Aspirasi Gerindra

Aplikasi Laravel untuk pengelolaan aspirasi masyarakat oleh Fraksi Gerindra DPRD Kota Semarang.

## Fitur
- CRUD aspirasi
- Sistem prioritas (contoh: metode SMART)
- Dashboard admin

## Preview

![preview img](/preview.png)

### Download Project & Instalasi

```bash
  git clone https://github.com/satria2909/Aspirasi_Gerindra.git project-name
```

Go to the project directory

```bash
  cd project-name
```

-   Copy .env.example file to .env and edit database credentials there

```bash
    composer install
```

```bash
    php artisan key:generate
```

```bash
    php artisan artisan migrate:fresh --seed
```

```bash
    php artisan storage:link
```

#### Login

-   email = admin@admin.com
-   password = 123
