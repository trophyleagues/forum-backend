<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Application\FindByName;

use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorName;
use TrophyForum\Authors\Domain\AuthorNotExist;
use TrophyForum\Authors\Domain\AuthorRepository;

final class AuthorFinder
{
    private $repository;

    public function __construct(AuthorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(AuthorName $name): Author
    {
        $author = $this->repository->byName($name);

        if (null === $author) {
            throw new AuthorNotExist(sprintf('The author <%s> does not exists', $name->value()));
        }

        return $author;
    }
}
