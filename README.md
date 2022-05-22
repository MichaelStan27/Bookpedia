## Bookpedia Project

This project was made to fulfill the requirements of the web programming final project.

## Working with project

### Prerequisite

1. PHP development environment (>=8.1)
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

### Additional setup

1. Link storage to public directory (`php artisan storage:link`)
   Put all the books assets in `storage/app/public/books`
   Link asset `https://drive.google.com/drive/folders/1BOt8s0vMEfdCNTyjKC18qZD5O-w5KAv5?usp=sharing`
