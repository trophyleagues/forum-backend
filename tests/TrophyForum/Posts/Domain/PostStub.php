<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Posts\Domain;

use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\Slug;
use Shared\Domain\ValueObject\Title;
use Shared\Domain\ValueObject\UpdatedAt;
use Tests\Shared\Domain\ValueObject\ContentStub;
use Tests\Shared\Domain\ValueObject\CreatedAtStub;
use Tests\Shared\Domain\ValueObject\SlugStub;
use Tests\Shared\Domain\ValueObject\TitleStub;
use Tests\Shared\Domain\ValueObject\UpdatedAtStub;
use Tests\TrophyForum\Authors\Domain\AuthorStub;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\Posts\Domain\PostIsOpen;
use TrophyForum\Responses\Domain\Responses;

final class PostStub
{
    public static function create(
        PostId $id,
        Title $title,
        Content $content,
        Author $author,
        PostIsOpen $isOpen,
        Responses $responses,
        Slug $slug,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        return new Post($id, $title, $content, $author, $isOpen, $responses, $slug, $createdAt, $updatedAt);
    }

    public static function random()
    {
        return self::create(
            PostIdStub::random(),
            TitleStub::random(),
            ContentStub::random(),
            AuthorStub::random(),
            PostIsOpenStub::random(),
            new Responses([]),
            SlugStub::random(),
            CreatedAtStub::random(),
            UpdatedAtStub::random()
        );
    }
}
