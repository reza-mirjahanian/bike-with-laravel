# bike-with-laravel
online website example with Laravel 5

1. run "composer update".
2. put you app key in .env file (APP_KEY=base64:pETnDx429Fwwh252skjq4JfTC3hVsUXmauf6wsi06f4=)
3. create your database and run "php artisan migrate"

for creating admin user

1. composer dump-autoload 
2. php artisan db:seed --class=UsersTableSeeder


###### example of .env file:

>APP_KEY=base64:pETnDx429Fwwh252skjq4JfTC3hVsUXmauf6wsi06f4=

>APP_DEBUG=true

>DB_CONNECTION=mysql

>DB_HOST=127.0.0.1

>DB_PORT=3306

>DB_DATABASE=bike

>DB_USERNAME=root
 
> DB_PASSWORD=

