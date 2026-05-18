# Domain Monitor Admin Panel

Laravel 12 admin panel for automatic monitoring of domain availability.

## Stack

- PHP 8.3+
- Laravel 12
- PostgreSQL 18
- Blade views
- Docker / Docker Compose
- DDD-inspired architecture
- CSR pattern: Controller → Service → Repository
- DTO for data transfer
- FormRequest for validation
- All database queries are isolated in repositories

## Main features

- User authentication
- Domain CRUD
- User-specific domain list
- Check interval
- Request timeout
- HTTP method: GET / HEAD
- Scheduled automatic checks
- Check history with date, status, HTTP code, response time and error message
- Optional Dozzle container for Docker logs

## Architecture

```text
app/
  Domain/
    Domain/
      DTO/
      Enums/
      Models/
      Repositories/
      Services/
  Http/
    Controllers/
    Requests/
```

Flow:

```text
Controller → FormRequest → DTO → Service → Repository → Model
```

## Installation

```bash
cp .env.example .env
docker compose up -d --build
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

Open:

```text
http://localhost:8000
```

Dozzle logs:

```text
http://localhost:8080
```

## Scheduler

The project has a separate `scheduler` container with:

```bash
php artisan schedule:work
```

The scheduler runs:

```bash
php artisan domains:check
```

The command itself is registered in:

```text
routes/console.php
```

## Manual check

```bash
docker compose exec app php artisan domains:check
```

## PostgreSQL version check

```bash
docker exec -it domain-monitor-postgres postgres --version
```

Expected:

```text
postgres (PostgreSQL) 18.x
```

## Notes

This archive intentionally does not include `vendor/` and `node_modules/`.
Run `composer install` after unpacking.
