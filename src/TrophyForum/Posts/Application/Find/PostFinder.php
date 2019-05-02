<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Find;

use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\Posts\Domain\PostNotExist;
use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\Responses\Domain\ResponseRepository;

final class PostFinder
{
    private $repository;
    private $responseRepository;

    public function __construct(PostRepository $repository, ResponseRepository $responseRepository)
    {
        $this->repository         = $repository;
        $this->responseRepository = $responseRepository;
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
