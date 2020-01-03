<?php

use DoctrineExtensions\Query\Mysql\Date;
use DoctrineExtensions\Query\Mysql\Day;
use DoctrineExtensions\Query\Mysql\Month;
use DoctrineExtensions\Query\Mysql\Year;
use Shared\Infrastructure\Doctrine\Types\DoctrineDateTimeImmutable;
use Shared\Infrastructure\Persistence\ContentType;
use Shared\Infrastructure\Persistence\CreatedAtType;
use Shared\Infrastructure\Persistence\EmailType;
use Shared\Infrastructure\Persistence\PasswordType;
use Shared\Infrastructure\Persistence\SlugType;
use Shared\Infrastructure\Persistence\TitleType;
use Shared\Infrastructure\Persistence\UpdatedAtType;
use TrophyForum\Authors\Infrastructure\Persistence\AuthorAvatarType;
use TrophyForum\Authors\Infrastructure\Persistence\AuthorIdType;
use TrophyForum\Authors\Infrastructure\Persistence\AuthorNameType;
use TrophyForum\Posts\Infrastructure\Persistence\PostIdType;
use TrophyForum\Posts\Infrastructure\Persistence\PostIsOpenType;
use TrophyForum\Posts\Infrastructure\Persistence\PostVisualizationType;
use TrophyForum\Responses\Infrastructure\Persistence\ResponseIdType;
use TrophyForum\Roles\Infrastructure\Persistence\RoleIdType;
use TrophyForum\Roles\Infrastructure\Persistence\RoleNameType;
use TrophyForum\SubForums\Infrastructure\Persistence\SubForumDescriptionType;
use TrophyForum\SubForums\Infrastructure\Persistence\SubForumIdType;
use TrophyForum\SubForums\Infrastructure\Persistence\SubForumIsAnnounceType;
use TrophyForum\SubForums\Infrastructure\Persistence\SubForumNameType;
use TrophyForum\Users\Infrastructure\Persistence\UserIdType;

return [

    /*
    |--------------------------------------------------------------------------
    | Entity Mangers
    |--------------------------------------------------------------------------
    |
    | Configure your Entity Managers here. You can set a different connection
    | and driver per manager and configure events and filters. Change the
    | paths setting to the appropriate path and replace App namespace
    | by your own namespace.
    |
    | Available meta drivers: fluent|annotations|yaml|xml|config|static_php|php
    |
    | Available connections: mysql|oracle|pgsql|sqlite|sqlsrv
    | (Connections can be configured in the database config)
    |
    | --> Warning: Proxy auto generation should only be enabled in dev!
    |
    */
    'managers'                   => [
        'default' => [
            'dev'           => env('APP_DEBUG'),
            'meta'          => env('DOCTRINE_METADATA', 'yaml'),
            'connection'    => env('DB_CONNECTION', 'mysql'),
            'namespaces'    => [

            ],
            'paths'         => [
                base_path('src/TrophyForum/Authors/Infrastructure/Persistence/'),
                base_path('src/TrophyForum/Posts/Infrastructure/Persistence/'),
                base_path('src/TrophyForum/Responses/Infrastructure/Persistence/'),
                base_path('src/TrophyForum/Roles/Infrastructure/Persistence/'),
                base_path('src/TrophyForum/SubForums/Infrastructure/Persistence/'),
            ],
            'repository'    => Doctrine\ORM\EntityRepository::class,
            'proxies'       => [
                'namespace'     => false,
                'path'          => storage_path('proxies'),
                'auto_generate' => env('DOCTRINE_PROXY_AUTOGENERATE', false),
            ],
            /*
            |--------------------------------------------------------------------------
            | Doctrine events
            |--------------------------------------------------------------------------
            |
            | The listener array expects the key to be a Doctrine event
            | e.g. Doctrine\ORM\Events::onFlush
            |
            */
            'events'        => [
                'listeners'   => [],
                'subscribers' => [],
            ],
            'filters'       => [],
            /*
            |--------------------------------------------------------------------------
            | Doctrine mapping types
            |--------------------------------------------------------------------------
            |
            | Link a Database Type to a Local Doctrine Type
            |
            | Using 'enum' => 'string' is the same of:
            | $doctrineManager->extendAll(function (\Doctrine\ORM\Configuration $configuration,
            |         \Doctrine\DBAL\Connection $connection,
            |         \Doctrine\Common\EventManager $eventManager) {
            |     $connection->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
            | });
            |
            | References:
            | http://doctrine-orm.readthedocs.org/en/latest/cookbook/custom-mapping-types.html
            | http://doctrine-dbal.readthedocs.org/en/latest/reference/types.html#custom-mapping-types
            | http://doctrine-orm.readthedocs.org/en/latest/cookbook/advanced-field-value-conversion-using-custom-mapping-types.html
            | http://doctrine-orm.readthedocs.org/en/latest/reference/basic-mapping.html#reference-mapping-types
            | http://symfony.com/doc/current/cookbook/doctrine/dbal.html#registering-custom-mapping-types-in-the-schematool
            |--------------------------------------------------------------------------
            */
            'mapping_types' => [
                'enum' => 'string',
            ],
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Doctrine Extensions
    |--------------------------------------------------------------------------
    |
    | Enable/disable Doctrine Extensions by adding or removing them from the list
    |
    | If you want to require custom extensions you will have to require
    | laravel-doctrine/extensions in your composer.json
    |
    */
    'extensions'                 => [
        //LaravelDoctrine\ORM\Extensions\TablePrefix\TablePrefixExtension::class,
        //LaravelDoctrine\Extensions\Timestamps\TimestampableExtension::class,
        //LaravelDoctrine\Extensions\SoftDeletes\SoftDeleteableExtension::class,
        //LaravelDoctrine\Extensions\Sluggable\SluggableExtension::class,
        //LaravelDoctrine\Extensions\Sortable\SortableExtension::class,
        //LaravelDoctrine\Extensions\Tree\TreeExtension::class,
        //LaravelDoctrine\Extensions\Loggable\LoggableExtension::class,
        //LaravelDoctrine\Extensions\Blameable\BlameableExtension::class,
        //LaravelDoctrine\Extensions\IpTraceable\IpTraceableExtension::class,
        //LaravelDoctrine\Extensions\Translatable\TranslatableExtension::class
    ],
    /*
    |--------------------------------------------------------------------------
    | Doctrine custom types
    |--------------------------------------------------------------------------
    |
    | Create a custom or override a Doctrine Type
    |--------------------------------------------------------------------------
    */
    'custom_types'               => [
        'json'              => LaravelDoctrine\ORM\Types\Json::class,
        'DateTimeImmutable' => DoctrineDateTimeImmutable::class,

        'author_id'     => AuthorIdType::class,
        'author_name'   => AuthorNameType::class,
        'author_avatar' => AuthorAvatarType::class,

        'post_id'            => PostIdType::class,
        'post_is_open'       => PostIsOpenType::class,
        'post_visualization' => PostVisualizationType::class,

        'response_id' => ResponseIdType::class,

        'role_id'   => RoleIdType::class,
        'role_name' => RoleNameType::class,

        'sub_forum_id'          => SubForumIdType::class,
        'sub_forum_name'        => SubForumNameType::class,
        'sub_forum_description' => SubForumDescriptionType::class,
        'sub_forum_is_announce' => SubForumIsAnnounceType::class,

        'user_id' => UserIdType::class,

        'content'    => ContentType::class,
        'created_at' => CreatedAtType::class,
        'email'      => EmailType::class,
        'password'   => PasswordType::class,
        'slug'       => SlugType::class,
        'title'      => TitleType::class,
        'updated_at' => UpdatedAtType::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | DQL custom datetime functions
    |--------------------------------------------------------------------------
    */
    'custom_datetime_functions'  => [
        'year'  => Year::class,
        'month' => Month::class,
        'day'   => Day::class,
        'date'  => Date::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | DQL custom numeric functions
    |--------------------------------------------------------------------------
    */
    'custom_numeric_functions'   => [],
    /*
    |--------------------------------------------------------------------------
    | DQL custom string functions
    |--------------------------------------------------------------------------
    */
    'custom_string_functions'    => [],
    /*
    |--------------------------------------------------------------------------
    | Enable query logging with laravel file logging,
    | debugbar, clockwork or an own implementation.
    | Setting it to false, will disable logging
    |
    | Available:
    | - LaravelDoctrine\ORM\Loggers\LaravelDebugbarLogger
    | - LaravelDoctrine\ORM\Loggers\ClockworkLogger
    | - LaravelDoctrine\ORM\Loggers\FileLogger
    |--------------------------------------------------------------------------
    */
    'logger'                     => env('DOCTRINE_LOGGER', false),
    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Configure meta-data, query and result caching here.
    | Optionally you can enable second level caching.
    |
    | Available: apc|array|file|memcached|redis|void
    |
    */
    'cache'                      => [
        'second_level' => false,
        'default'      => env('DOCTRINE_CACHE', 'array'),
        'namespace'    => null,
        'metadata'     => [
            'driver'    => env('DOCTRINE_METADATA_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
        'query'        => [
            'driver'    => env('DOCTRINE_QUERY_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
        'result'       => [
            'driver'    => env('DOCTRINE_RESULT_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Gedmo extensions
    |--------------------------------------------------------------------------
    |
    | Settings for Gedmo extensions
    | If you want to use this you will have to require
    | laravel-doctrine/extensions in your composer.json
    |
    */
    'gedmo'                      => [
        'all_mappings' => false,
    ],
    /*
     |--------------------------------------------------------------------------
     | Validation
     |--------------------------------------------------------------------------
     |
     |  Enables the Doctrine Presence Verifier for Validation
     |
     */
    'doctrine_presence_verifier' => true,

    /*
     |--------------------------------------------------------------------------
     | Notifications
     |--------------------------------------------------------------------------
     |
     |  Doctrine notifications channel
     |
     */
    'notifications'              => [
        'channel' => 'database',
    ],
];
