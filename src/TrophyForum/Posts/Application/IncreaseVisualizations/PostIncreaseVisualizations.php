<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\IncreaseVisualizations;

use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostRepository;

final class PostIncreaseVisualizations
{
    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Post $post): void
    {
        $post->increaseVisualization();

        $this->repository->save($post);
    }
}
