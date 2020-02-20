<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Rate;

use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostRepository;

final class Rating
{
    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Post $post, string $rating): void
    {
        $post->updateRating($rating);

        $this->repository->save($post);
    }
}
