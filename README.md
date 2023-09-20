<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Initialize
### Docker required

Configure docker environments, copy `.env.example` to `.env` and edit

Copy `.env.example` to `.env` inside /src, this env is responsible by project

Edit this database block env, with the same data as root `.env` and set a database name

Build project
```bash
docker compose -p spotifylaravel up -d --build
```

Install dependencies composer
```bash
docker compose run --rm composer i
```

Install dependencies npm
```bash
docker compose run --rm npm i
```

Generate application key
```bash
docker compose run --rm php artisan key:generate
```

Run migrations
```bash
docker compose run --rm php artisan migrate
```

If you want a alternative host, edit `nginx/conf.d/app.conf` 

<i>don't forget edit your `hosts`</i>

Enjoy!
