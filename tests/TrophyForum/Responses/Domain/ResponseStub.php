<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Responses\Domain;

use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;
use Tests\Shared\Domain\ValueObject\ContentStub;
use Tests\Shared\Domain\ValueObject\CreatedAtStub;
use Tests\Shared\Domain\ValueObject\UpdatedAtStub;
use Tests\Shared\Domain\ValueObject\UuidStub;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Responses\Domain\Response;

final class ResponseStub
{
    public static function create(
        Uuid $id,
        Post $post,
        Author $author,
        Content $content,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        return new Response($id, $post, $author, $content, $createdAt, $updatedAt);
    }

    public static function random(Post $post, Author $author)
    {
        return self::create(
            UuidStub::random(),
            $post,
            $author,
            ContentStub::random(),
            CreatedAtStub::random(),
            UpdatedAtStub::random()
        );
    }
}
