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
        if (null !== $post->responses()) {
            $responses = (new ResponsesResponse())->__invoke($post->responses());
        }

        return [
            'id'              => $post->id()->value(),
            'title'           => $post->title()->value(),
            'content'         => $post->content()->value(),
            'author'          => (new AuthorResponse())->__invoke($post->author()),
            'is_open'         => $post->isOpen()->value(),
            'total_responses' => null === $post->responses() ? 0 : count($responses),
            'responses'       => null === $post->responses() ? null : $responses,
            'created_at'      => $post->createdAt()->value(),
            'updated_at'      => $post->updatedAt()->value(),
        ];
    }
}
