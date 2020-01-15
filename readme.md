<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## PHP - Jobsity Challenge | by José Burgón
**Mandatory tasks**: All completed.
**Bonus tasks**: Unit Tests.

## Step 1: Clone repository

If it's Windows then I strongly recommend using [Laragon](https://laragon.org/) as a local development environment.
> Laragon provides a fast and easy way to spin up an isolated Windows
> development (like a Virtual Machine, it doesn’t touch your OS). Users
> can install it as a software, start it up, do their programming, and
> just exit when finished. The platform comes pre-installed with many
> popular applications like Node.js, PHP, Apache, Composer, and
> MariaDB/MySQL.
```
d:\laragon\www> git clone https://github.com/joseburgon/JobsityChallenge.git
```
## Step 2: Load project packages and dependencies

```
d:\...\> composer install
```
```
d:\...\> npm install
```

## Step 3: Create .env file
The .env file is generally not loaded, due to security issues. The easiest way to do this is to copy the .env.example file to .env, and modify the latter:
```
d:\...\> copy .env.example .env
```
I'll share the Twitter apikey and other parameters via email.

## Step 4: Create database 

Laravel is configured to use mySQL by default, not only the driver, server, database, user and password must be changed, but also the port, mySQL uses 3306 and postgres 5432.

## Step 5: Generate project key

Laravel requires an encryption key for each project.
```
d:\...\> php artisan key:generate
```

## Step 6: Migrate and seed the database

I already created the migrations with the test data.
```
d:\...\> php artisan migrate --seed
```
> It is possible that the Faker image provider is down. I switched to another provider in my local env.

# Ready to go!

***User test***

*Email: user.test.12@mail.com
Password: 123456*

