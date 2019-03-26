<?php

use LaravelDoctrine\ORM\Facades\EntityManager;
use Tests\TrophyForum\SubForums\Infrastructure\InMemorySubForumRepository;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\Responses\Domain\Response;
use TrophyForum\Responses\Domain\ResponseRepository;
use TrophyForum\SubForums\Domain\SubForum;
use TrophyForum\SubForums\Domain\SubForumRepository;

return [
    'driver' => env('GATEWAY_DRIVER'),

    'repository-gateways' => [

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
    ],
];
