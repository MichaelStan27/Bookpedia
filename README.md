## Bookpedia Project

This project was made to fulfill the requirements of the web programming final project.

## Working with project

### Prerequisite

1. PHP development environment (>=7.3)
2. Composer
3. NodeJS (>=16)

### Setup

1. Clone this repository (`git clone https://github.com/MichaelStan27/Bookpedia`)
2. Install all project dependencies (`npm install && composer install`)
3. Configure `.env` file
4. Sets APP_KEY value in `.env` file (`php artisan key:generate`)
5. Link storage to public folder (`php artisan storage:link`)
6. Run database migrations and seeder (`php artisan migrate --seed`)
7. Build project assets (`npm run dev`)
8. Preview project (`php artisan serve`)

## Production (Docker)

### Prerequisite

1. Docker & docker compose plugin

### Setup

1. Clone this repository (`git clone https://github.com/MichaelStan27/Bookpedia`)
2. Prepare project assets, place at `storage/app/public`
3. Configure `.env` file
4. Build image (`docker compose build`)
5. Start the container (`docker compose up -d`)
6. Do the database migration (`docker exec -it bookpedia php artisan migrate --seed`)
7. Link storage to public folder (`docker exec -it bookpedia php artisan storage:link`)

## Additional information

-   Assets link `https://drive.google.com/drive/folders/1BOt8s0vMEfdCNTyjKC18qZD5O-w5KAv5?usp=sharing`
