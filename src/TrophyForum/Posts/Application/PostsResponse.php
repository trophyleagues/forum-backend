<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application;

use Doctrine\ORM\PersistentCollection;

final class PostsResponse
{
    public function __invoke(PersistentCollection $posts = null): array
    {
        $response = [];

        if (null === $posts) {
            return $response;
        }

        foreach ($posts as $post) {
            $response[] = (new PostResponse())->__invoke($post);
        }

        return $response;
    }
}
