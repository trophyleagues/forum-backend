<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application\FindAll;

use TrophyForum\SubForums\Domain\SubForumRepository;
use TrophyForum\SubForums\Domain\SubForums;

final class AllSubForumsFinder
{
    private $repository;

    public function __construct(SubForumRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): SubForums
    {
        return $this->repository->all();
    }
}
