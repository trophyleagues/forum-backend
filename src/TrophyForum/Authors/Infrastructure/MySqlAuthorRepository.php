<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Infrastructure;

use Doctrine\ORM\EntityRepository;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorName;
use TrophyForum\Authors\Domain\AuthorRepository;

final class MySqlAuthorRepository extends EntityRepository implements AuthorRepository
{
    public function save(Author $author): void
    {
        $this->_em->persist($author);
        $this->_em->flush();
    }

    public function byId(Uuid $id): ?Author
    {
        /** @var Author $author */
        $author = $this->findOneBy(['id' => $id->value()]);

        return $author;
    }

    public function byName(AuthorName $name): ?Author
    {
        /** @var Author $author */
        $author = $this->findOneBy(['name' => $name->value()]);

        return $author;
    }
}
