<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Application\Create;

use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorId;
use TrophyForum\Authors\Domain\AuthorName;
use TrophyForum\Authors\Domain\AuthorRepository;

final class AuthorCreator
{
    private $repository;

    public function __construct(AuthorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Uuid $id, AuthorName $name): void
    {
        $author = Author::create($id, $name);

        $this->repository->save($author);
    }
}
