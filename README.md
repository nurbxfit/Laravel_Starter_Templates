# Laravel Starter_Templates
Basic Laravel Templates preconfigured for beginners,
I am new to Laravel, and I wanted to create multiple projects with it,But it was tedious to always start from scratch to configure it,
so I created this template that is configured with basic features a that can acts as basis for most styles of laravel website. 

## How To use ?
1. git clone or download this project
2. cd into the directory
3. composer install.
4. npm install.
5. cp .env.example .env
6. php artisan key:generate
7. change content of .env file to match your database configuration
8. php artisan migrate.
9. php artisan passport:install

## preconfigured:
1. auth: for login/register (done)
2. passport : for api authentication (done)
3. email driver for account verification
4. Basic CRUD example
5. Basic File upload example

### custom middleware:
1. CORS: for api (done)
  

#### : admin Authentication guards
1. authentication settings are stored in : config > auth.php
2. defined admin guard and provider
3. conigure guard in admin models
4. created AdminLoginController (for login/register)
5. created AdminController (for Admin CRUD method)
6. changed the redirectIfAuthenticated


#### : Laravel Passport (How to Install)
1. composer require laravel/passport
2. php artisan make:auth
3. php artisan migrate 
4. php artisan passport:install
5. add ' Laravel\Passport\HasApiTokens ' to App\User model.
6. add ' Passport::routes() ' to app/AuthServiceProvider.
7. change 'api' driver in config/auth.php from 'token' to 'passport';
8. reference links: [Laravel Passport](https://laravel.com/docs/5.8/passport)


#### : Email Verified
1. reference link: [Laravel Email Verification](https://appdividend.com/2018/09/11/laravel-5-7-email-verification-tutorial-example/)
2. most of the reference already preconfigured, you just go to mailtrap and fill in the .env file with your mail configuration.
3. add the middleware 'verified' to routes or controllers you want only a verified users can access.