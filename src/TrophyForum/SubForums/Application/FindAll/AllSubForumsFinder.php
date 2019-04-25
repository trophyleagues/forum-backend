<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application\FindAll;

use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\SubForums\Domain\SubForumRepository;
use TrophyForum\SubForums\Domain\SubForums;

final class AllSubForumsFinder
{
    private $repository;
    private $postRepository;

    public function __construct(SubForumRepository $repository, PostRepository $postRepository)
    {
        $this->repository     = $repository;
        $this->postRepository = $postRepository;
    }

    public function __invoke(): SubForums
    {
        $subForums = $this->repository->all();

        foreach ($subForums as $subForum) {
            $posts = $this->postRepository->bySubForumId($subForum->id());

            $subForum->modifyTotalPosts(null === $posts ? 0 : count($posts));
        }

        return $subForums;
    }
}
