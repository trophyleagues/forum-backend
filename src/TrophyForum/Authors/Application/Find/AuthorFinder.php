<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Application\Find;

use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorNotExist;
use TrophyForum\Authors\Domain\AuthorRepository;

final class AuthorFinder
{
    private $repository;

    public function __construct(AuthorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Uuid $id): Author
    {
        $author = $this->repository->byId($id);

        if (null === $author) {
            throw new AuthorNotExist(sprintf('The author <%s> does not exists', $id->value()));
        }

        return $author;
    }
}
