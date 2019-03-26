<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Responses\Domain;

use TrophyForum\Authors\Domain\Author;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Responses\Domain\Responses;

final class ResponsesStub
{
    public static function random(Post $post, Author $author): Responses
    {
        return new Responses(
            [
                ResponseStub::random($post, $author),
                ResponseStub::random($post, $author),
                ResponseStub::random($post, $author),
            ]
        );
    }
}
