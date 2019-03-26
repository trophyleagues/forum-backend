<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application;

use TrophyForum\Authors\Application\AuthorResponse;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Responses\Application\ResponsesResponse;

final class PostResponse
{
    public function __invoke(Post $post): array
    {
        return [
            'id'         => $post->id()->value(),
            'title'      => $post->title()->value(),
            'content'    => $post->content()->value(),
            'author'     => (new AuthorResponse())->__invoke($post->author()),
            'is_open'     => $post->isOpen()->value(),
            'responses'  => null === $post->responses() ? null :
                (new ResponsesResponse())->__invoke($post->responses()),
            'created_at' => $post->createdAt()->value(),
            'updated_at' => $post->updatedAt()->value(),
        ];
    }
}
