# Forum Backend
Backend in PHP using Laravel. Hexagonal Architecture and Domain-Driven Design (DDD)

## Table of Contents

- [Installation](#Installation)
- [Getting started](#Getting started)

## Installation

- Copy the `.env.example` file to a local `.env` and ensure all the settings are correct for their local environment, filling the secret keys or providing their own values when is necessary.

```
$ php -r "file_exists('.env') || copy('.env.example', '.env');"
```

- Install all dependencies with Composer.

```
$ composer install
```

- Finally, create the migration repository.

```
$ touch database/database.sqlite
$ php artisan migrate:install
```

## Getting started

- Seed the database with records

```
$ php artisan migrate:refresh --seed
```

. Generate Doctrine Proxies

```
$ php artisan doctrine:generate:proxies
```

- Serve the application on the PHP development server.

```
$ php artisan serve
```
