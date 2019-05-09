<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Application\Find;

use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorId;
use TrophyForum\Authors\Domain\AuthorNotExist;
use TrophyForum\Authors\Domain\AuthorRepository;

final class AuthorFinder
{
    private $repository;

    public function __construct(AuthorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(AuthorId $id): Author
    {
        $author = $this->repository->byAuthorId($id);

        if (null === $author) {
            throw new AuthorNotExist(sprintf('The author <%s> does not exists', $id->value()));
        }

        return $author;
    }
}
