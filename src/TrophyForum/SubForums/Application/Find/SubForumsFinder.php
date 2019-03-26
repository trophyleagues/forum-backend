<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application\Find;

use TrophyForum\SubForums\Domain\SubForum;
use TrophyForum\SubForums\Domain\SubForumId;
use TrophyForum\SubForums\Domain\SubForumNotExist;
use TrophyForum\SubForums\Domain\SubForumRepository;

final class SubForumsFinder
{
    private $repository;

    public function __construct(SubForumRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(SubForumId $id): SubForum
    {
        $subForum = $this->repository->bySubForumId($id);

        if (null === $subForum) {
            throw new SubForumNotExist(sprintf('The subForum <%s> does not exists', $id->value()));
        }

        return $subForum;
    }
}
