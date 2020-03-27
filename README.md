## Configuration
1. `composer install`
2. `composer update`
3. `cp .env.example .env`
5. `php artisan key:generate`
6. `mkdir -p storage/logs`
7. `mkdir -p storage/framework/{sessions,views,cache}`
8. `chmod -R 777 bootstrap/cache/ storage/`
9. `Configure the .env file (database, email, aws...)`
10. `php artisan migrate`
11. `php artisan db:seed`
12. `php artisan serve`
