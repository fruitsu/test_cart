copy .env.example .env

composer install

php artisan migrate

php artisan db:seed

php artisan key:generate

npm install

npm run dev
