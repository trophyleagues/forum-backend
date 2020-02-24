<?php

declare(strict_types = 1);

namespace TrophyForum\Searches\Application;

use TrophyForum\Posts\Application\PostResponse;
use TrophyForum\Posts\Domain\Posts;
use TrophyForum\Responses\Application\ResponseResponse;
use TrophyForum\Responses\Domain\Responses;

final class SearchResponse
{
    public function __invoke(Posts $posts = null, Responses $responses = null): array
    {
        $postsResponse = [];
        foreach ($posts as $post) {
            $postsResponse[] = (new PostResponse())->__invoke($post);
        }

        $responsesResponse = [];
        foreach ($responses as $post) {
            $responsesResponse[] = (new ResponseResponse())->__invoke($post);
        }

        return [
            'posts'     => $postsResponse,
            'responses' => $responsesResponse,
        ];
    }
}
