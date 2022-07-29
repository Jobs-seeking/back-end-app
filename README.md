# Build API for a seeking job website
 > A project used to build api for front-end website
## Requirements
- PHP  8.0.2
- Laravel 9.19
## Get started
- Install ```vendor``` folder
```shell
composer install
```
- Copy ```.env``` file from ```.env.example``` and generate key 
```shell
cp .env.example .env
```
```shell
php artisan key:generate
```
- Open Xampp then start ```Apache``` and ```MySQL```
- Create database name ```jobs_seeking``` and change the ```DB_DATABASE=jobs_seeking``` into ```.env``` file
- Migrate data from migrations to database and fake data
```shell
php artisan migrate
```
```shell
php artisan db:seed
```
- Run server by the follow command line
```shell
php artisan serve
```


