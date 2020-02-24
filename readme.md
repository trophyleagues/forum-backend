# Forum Backend
[![Build Status](https://scrutinizer-ci.com/g/trophyleagues/forum-backend/badges/build.png?b=master)](https://scrutinizer-ci.com/g/trophyleagues/forum-backend/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/trophyleagues/forum-backend/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/trophyleagues/forum-backend/?branch=master)

Backend in PHP using Laravel Framework. Hexagonal Architecture and Domain-Driven Design (DDD)

## Table of Contents

* [Installation](#installation)
* [Getting started](#getting-started)
* [Services](#services)
  * [Create a new user](#create-a-new-user)
  * [Login a user](#login-a-user)
  * [Get all subForums](#get-all-subforums)
  * [Get a subForum by subForumId](#get-a-subforum-by-subforumid)
  * [Get a post by postId](#get-a-post-by-postid)
  * [Create a post](#create-a-post)
  * [Update a post](#update-a-post)
  * [Create a response](#create-a-response)
  * [Update a response](#update-a-response)
  * [Rate a post](#rate-a-post)
  * [Search](#search)

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

- Set the application key
```
$ php artisan key:generate
```

- Generate Doctrine Proxies

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
![POST](public/img/post.png "POST")   | /api/v1/register | Create a new user
![POST](public/img/post.png "POST")   | /api/v1/login | Login a user
![GET](public/img/get.png "GET")   | /api/v1/forums | Get all subForums
![GET](public/img/get.png "GET")   | /api/v1/subforum/{subForumId} | Get a subForum by subForumId
![GET](public/img/get.png "GET")  | /api/v1/post/{postId} | Get a post by postId
![POST](public/img/post.png "POST")  | /api/v1/post | Create a post
![PUT](public/img/put.png "PUT")  | /api/v1/post/{postId} | Update a post
![POST](public/img/post.png "POST")  | /api/v1/response | Create a response
![PUT](public/img/put.png "PUT")  | /api/v1/response/{responseId} | Update a response
![POST](public/img/post.png "POST")  | /api/v1/post/{postId}/rate | Rate a post
![GET](public/img/get.png "GET")  | /api/v1/search | Search posts and responses

### Create a new user.
![POST](public/img/post.png "POST") api/v1/register

Param | Type | Description
------- | ---------------- | :----------
country  | `string` | Abbreviation of selected country. 
email  | `string` | Email of user.
password  | `string` | Password.

201 Created
```json
[]
```

### Login a user
![POST](public/img/post.png "POST") api/v1/login

Param | Type | Description
------- | ---------------- | :----------
email  | `string` | Email of user.
password  | `string` | Password.

200 OK
````json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9",
    "user_id": 1,
    "token_type": "bearer"
}
````

### Get all subForums
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


### Get a subForum by subForumId
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
            "visualization": 345,
            "slug": "who-will-win-the-league",
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

### Get a post by postId
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
    "visualization": 345,
    "slug": "who-will-win-the-league",
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

### Create a post
![POST](public/img/post.png "POST") /api/v1/post

Param | Type | Description
:----------: | :---------- | :----------
id | `uuid` | Id of post. Example: 8ad7705f-cddf-35ae-bf8b-acb25a420e86
sub_forum_id | `uuid` | SubForum id. Example: b10203df-9911-3c5d-8e2e-de480e9102e8
author_id | `uuid` | Author id. Example: dc786f34-0217-3bf6-a20b-4f6b2f7890f8
title | `string` | Title of post. Example: My awesome title
content | `string` | Content of post. Example: `<h1>This is the content!</h1>`

201 Created
```json
```

### Update a post
![PUT](public/img/put.png "PUT") /api/v1/post/{postId}

Param | Type | Description
:----------: | :---------- | :----------
title | `string` | Title of post. Example: My awesome title 2
content | `string` | Content of post. Example: `<h1>This is the content 2!</h1>`

200 OK
```json
```


### Create a response
![POST](public/img/post.png "POST") /api/v1/response

Param | Type | Description
:----------: | :---------- | :----------
id | `uuid` | Id of response. Example: 8ad7705f-cddf-35ae-bf8b-acb25a420e86
post_id | `uuid` | Post id. Example: b10203df-9911-3c5d-8e2e-de480e9102e8
author_id | `uuid` | Author id. Example: dc786f34-0217-3bf6-a20b-4f6b2f7890f8
content | `string` | Content of response. Example: `<p>This is the response!</p>`

201 Created
```json
```

### Update a response
![PUT](public/img/put.png "PUT") /api/v1/response/{responseId}

Param | Type | Description
:----------: | :---------- | :----------
content | `string` | Content of response. Example: `<p>This is the response 2!</p>`

200 OK
```json
```

### Rate a post
![POST](public/img/post.png "POST") /api/v1/post/{postId}/rate

Param | Type | Description
:----------: | :---------- | :----------
rate | `int` | Add a like or unlike. Accepted values: `1` or `-1

200 OK
```json
```

### Search
![GET](public/img/get.png "GET") /api/v1/search

Param | Type | Description
:----------: | :---------- | :----------
keyword | `string` | Keyword
author | `string` | Author name

200 OK
```json
{
    "posts": [
        {
            "id": "08eea5ca-bc6c-4f24-b241-63d1c50eeef6",
            "title": "My awesome title",
            "content": "<h1>This is the content!</h1>",
            "author": {
                "id": "b01726fd-ad25-3533-badd-fae17bfffa4f",
                "name": "aut",
                "avatar": "dolorem"
            },
            "is_open": true,
            "total_responses": 1,
            "responses": [
                {
                    "id": "08eea5ca-bc6c-4f24-b241-63d1c50eeef6",
                    "author": {
                        "id": "b01726fd-ad25-3533-badd-fae17bfffa4f",
                        "name": "aut",
                        "avatar": "dolorem"
                    },
                    "content": "<p>This is the response 2!</p>",
                    "created_at": "2020-02-24 11:25:28",
                    "updated_at": "2020-02-24 11:25:28"
                }
            ],
            "slug": "my-awesome-title",
            "visualization": 4,
            "in_like": 2,
            "un_like": 1,
            "created_at": "2020-02-20 10:55:46",
            "updated_at": "2020-02-20 10:56:42"
        }
    ],
    "responses": []
}
```
