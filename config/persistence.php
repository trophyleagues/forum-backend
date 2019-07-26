<?php

use LaravelDoctrine\ORM\Facades\EntityManager;
use Tests\TrophyForum\SubForums\Infrastructure\InMemorySubForumRepository;
use TrophyForum\Authors\Domain\AuthorRepository;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\Responses\Domain\Response;
use TrophyForum\Responses\Domain\ResponseRepository;
use TrophyForum\SubForums\Domain\SubForum;
use TrophyForum\SubForums\Domain\SubForumRepository;
use TrophyForum\Users\Domain\UserRepository;
use TrophyForum\Users\Infrastructure\GuzzleUserRepository;

return [
    'driver' => env('GATEWAY_DRIVER'),

    'repository-gateways' => [

        AuthorRepository::class => [
            'doctrine'  => function () {
                return EntityManager::getRepository(Author::class);
            },
            'in-memory' => function () {
            },
        ],

        PostRepository::class => [
            'doctrine'  => function () {
                return EntityManager::getRepository(Post::class);
            },
            'in-memory' => function () {
            },
        ],

        SubForumRepository::class => [
            'doctrine'  => function () {
                return EntityManager::getRepository(SubForum::class);
            },
            'in-memory' => function () {
                new InMemorySubForumRepository();
            },
        ],

        ResponseRepository::class => [
            'doctrine'  => function () {
                return EntityManager::getRepository(Response::class);
            },
            'in-memory' => function () {
            },
        ],

        UserRepository::class => [
            'doctrine'  => function () {
                return new GuzzleUserRepository();
            },
            'in-memory' => function () {
            },
        ],
    ],
];
