<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Library Management
Single CRUD application using Laravel and Vue JS

## Requirements
* PHP >= 8.0
* MySQL
* Composer
* Git
* Laravel 10
* Node.js

## Installation
### 1. Clone Repository:
```
git init
git remote add origin https://github.com/gchimuel/library-management.git
git pull origin master
```
or
```
git clone https://github.com/gchimuel/library-management.git
```


### 2. Install Dependencies
```
composer install
```

### 3. Generate `.env` and `key`
```
cp .env.example .env
php artisan key:generate
```
`NOTE:` Update `APP_URL` and `DB_CONNECTION` depending on your server settings

### 4. Run Migration and Seeder
```
php artisan migrate --seed
```


### 5. Install and Run Node JS dependecies
```
npm install
npm run dev
```
