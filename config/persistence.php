<?php

use LaravelDoctrine\ORM\Facades\EntityManager;
use TrophyForum\SubForums\Domain\SubForum;
use TrophyForum\SubForums\Domain\SubForumRepository;

return [
    'driver' => env('GATEWAY_DRIVER'),

    'repository-gateways' => [
        SubForumRepository::class => [
            'doctrine'  => function () {
                return EntityManager::getRepository(SubForum::class);
            },
            'in-memory' => function () {
            },
        ],
    ],
];
