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
5. Run database migrations and seeder (`php artisan migrate --seed`)
6. Build project assets (`npm run dev`)
7. Preview project (`php artisan serve`)

## Production (Docker)

### Prerequisite
1. Docker & docker compose plugin

### Setup
1. Clone this repository (`git clone https://github.com/MichaelStan27/Bookpedia`)
2. Prepare project assets, place at `public/assets`
3. Configure `.env` file
4. Build image (`docker compose build`)
5. Start the container (`docker compose up -d`)
6. Do the database migration (`docker exec -it bookpedia php artisan migrate --seed`)

## Additional information
- Assets link `https://drive.google.com/drive/folders/1BOt8s0vMEfdCNTyjKC18qZD5O-w5KAv5?usp=sharing`