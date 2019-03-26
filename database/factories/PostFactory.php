<?php

use Tests\Shared\Domain\ValueObject\ContentStub;
use Tests\Shared\Domain\ValueObject\CreatedAtStub;
use Tests\Shared\Domain\ValueObject\SlugStub;
use Tests\Shared\Domain\ValueObject\TitleStub;
use Tests\Shared\Domain\ValueObject\UpdatedAtStub;
use Tests\TrophyForum\Authors\Domain\AuthorStub;
use Tests\TrophyForum\Posts\Domain\PostIdStub;
use Tests\TrophyForum\Posts\Domain\PostIsOpenStub;

$factory->define(
    \App\Models\Post::class,
    function () {
        return [
            'id'         => PostIdStub::random()->value(),
            'title'      => TitleStub::random()->value(),
            'content'    => ContentStub::random()->value(),
            'author_id'  => AuthorStub::random()->id()->value(),
            'is_open'    => PostIsOpenStub::random()->value(),
            'slug'       => SlugStub::random()->value(),
            'created_at' => CreatedAtStub::random()->value(),
            'updated_at' => UpdatedAtStub::random()->value(),
        ];
    }
);