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
            $postResponse = (new PostResponse())->__invoke($post);
            unset($postResponse['responses']);

            $response[] = $postResponse;
        }

        return $response;
    }
}
