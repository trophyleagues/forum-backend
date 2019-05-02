# Forum Backend
Backend in PHP using Laravel. Hexagonal Architecture and Domain-Driven Design (DDD)

## Table of Contents

* [Installation](#Installation)
* [Getting started](#Getting started)
* [Services](#Services)
  * [Get all subForums.](#Get all subForums.)
  * [Get a subForum by subForumId.](#Get a subForum by subForumId.)
  * [Get a post by postId.](#Get a post by postId.)

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

## Services

Method | Path | Description
:----------: | :---------- | :----------
![GET](public/img/get.png "GET")   | /api/v1/forums | Get all subForums.
![GET](public/img/get.png "GET")   | /api/v1/subforum/{subForumId} | Get a subForum by subForumId.
![GET](public/img/get.png "GET")  | /api/v1/post/{postId} | Get a post by postId.

### Get all subForums.
![GET](public/img/get.png "GET") /api/v1/forums

200 OK
```json
[
    {
        "id": "e241b9b5-2cf8-3011-81a7-50cfab97922a",
        "author": {
            "id": "e15eb10e-95d4-340a-a7e3-fb33b394ab03",
            "name": "T0wn3R",
            "avatar": "https://avatars2.githubusercontent.com/u/17074483?s=180&v=4"
        },
        "name": "General",
        "description": "General discussion of TrophyLeagues",
        "is_announce": false,
        "roles": [],
        "total_posts": 10,
        "created_at": "2019-04-01 11:15:00"
    },
    {...}
]
```


### Get a subForum by subForumId.
![GET](public/img/get.png "GET") /api/v1/subforum/{subForumId}

200 OK
```json
{
    "id": "e241b9b5-2cf8-3011-81a7-50cfab97922a",
    "author": {
        "id": "e15eb10e-95d4-340a-a7e3-fb33b394ab03",
        "name": "T0wn3R",
        "avatar": "https://avatars2.githubusercontent.com/u/17074483?s=180&v=4"
    },
    "name": "General",
    "description": "General discussion of TrophyLeagues",
    "is_announce": false,
    "roles": [],
    "total_posts": 10,
    "posts": [
        {
            "id": "77c9a4b8-f351-4be2-abc5-0e1177bbf937",
            "title": "Who will win the league?",
            "content": "I open thread to talk about who will win the league. Place your bets :)",
            "author": {
                "id": "d7550c56-c9b3-4780-bf0d-edaeb5c3728d",
                "name": "gertoska",
                "avatar": "https://avatars0.githubusercontent.com/u/3418982?s=80&v=4"
            },
            "is_open": true,
            "total_responses": 78,
            "created_at": "2019-04-01 11:15:00",
            "updated_at": "2019-04-01 11:15:00"
        },
        {...}
    ],
    "created_at": "2019-04-01 11:15:00"
}
```

404 Not Found
```json
{
    "message": "The subForum <e241b9b5-2cf8-3011-81a7-50cfab97922a> does not exists"
}
```

### Get a post by postId.
![GET](public/img/get.png "GET") /api/v1/post/{postId}

200 OK
```json
{
    "id": "77c9a4b8-f351-4be2-abc5-0e1177bbf937",
    "title": "Who will win the league?",
    "content": "I open thread to talk about who will win the league. Place your bets :)",
    "author": {
        "id": "d7550c56-c9b3-4780-bf0d-edaeb5c3728d",
        "name": "gertoska",
        "avatar": "https://avatars0.githubusercontent.com/u/3418982?s=80&v=4"
    },
    "is_open": true,
    "total_responses": 78,
    "responses": [
        {
            "id": "468c1724-a94c-430e-806f-04fda0aa883b",
            "author": {
                "id": "e15eb10e-95d4-340a-a7e3-fb33b394ab03",
                "name": "T0wn3R",
                "avatar": "https://avatars2.githubusercontent.com/u/17074483?s=180&v=4"
            },
            "content": "My team!",
            "created_at": "2019-04-01 11:15:00",
            "updated_at": "2019-04-01 11:15:00"
        },
        {...}
    ],
    "created_at": "2019-04-01 11:15:00",
    "updated_at": "2019-04-01 11:15:00"
}
```

404 Not Found
```json
{
    "message": "The post <e241b9b5-2cf8-3011-81a7-50cfab97922a> does not exists"
}
```
