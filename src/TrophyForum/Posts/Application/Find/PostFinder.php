<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Find;

use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\Posts\Domain\PostNotExist;
use TrophyForum\Posts\Domain\PostRepository;

final class PostFinder
{
    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(PostId $id): Post
    {
        $post = $this->repository->byId($id);

        if (null === $post) {
            throw new PostNotExist(sprintf('The post <%s> does not exists', $id->value()));
        }

        return $post;
    }
}
