<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Infrastructure;

use Doctrine\ORM\EntityRepository;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorId;
use TrophyForum\Authors\Domain\AuthorRepository;

final class MySqlAuthorRepository extends EntityRepository implements AuthorRepository
{
    public function byAuthorId(AuthorId $id): ?Author
    {
        /** @var Author $author */
        $author = $this->findOneBy(['id' => $id->value()]);

        return $author;
    }
}
