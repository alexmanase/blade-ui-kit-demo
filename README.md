## How to install

```sh
composer install
npm install && npm run dev
php artisan key:generate
cp .env.example .env
touch database/database.sqlite
php artisan migrate:fresh --seed
```
