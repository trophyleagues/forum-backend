<?php

use App\Models\Post;
use Shared\Domain\ValueObject\Uuid;
use Tests\Shared\Domain\ValueObject\ContentStub;
use Tests\Shared\Domain\ValueObject\CreatedAtStub;
use Tests\Shared\Domain\ValueObject\InLikeStub;
use Tests\Shared\Domain\ValueObject\SlugStub;
use Tests\Shared\Domain\ValueObject\TitleStub;
use Tests\Shared\Domain\ValueObject\UnLikeStub;
use Tests\Shared\Domain\ValueObject\UpdatedAtStub;
use Tests\TrophyForum\Authors\Domain\AuthorStub;
use Tests\TrophyForum\Posts\Domain\PostIsOpenStub;
use Tests\TrophyForum\Posts\Domain\PostVisualizationStub;

$factory->define(
    Post::class,
    function () {
        return [
            'id'            => Uuid::random()->value(),
            'title'         => TitleStub::random()->value(),
            'content'       => ContentStub::random()->value(),
            'author_id'     => AuthorStub::random()->id()->value(),
            'is_open'       => PostIsOpenStub::random()->value(),
            'slug'          => SlugStub::random()->value(),
            'visualization' => PostVisualizationStub::random()->value(),
            'in_like'       => InLikeStub::random()->value(),
            'un_like'       => UnLikeStub::random()->value(),
            'created_at'    => CreatedAtStub::random()->value(),
            'updated_at'    => UpdatedAtStub::random()->value(),
        ];
    }
);
