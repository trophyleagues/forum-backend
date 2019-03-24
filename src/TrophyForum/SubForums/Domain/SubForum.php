<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Domain;

use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;

class SubForum
{
    private $id;
    private $name;
    private $createdAt;
    private $updatedAt;

    public function __construct(SubForumId $id, SubForumName $name, CreatedAt $createdAt, UpdatedAt $updatedAt)
    {
        $this->id        = $id;
        $this->name      = $name;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(SubForumId $id, SubForumName $name): self
    {
        return new self($id, $name, new CreatedAt(new \DateTime()), new UpdatedAt(new \DateTime()));
    }

    public function id(): SubForumId
    {
        return $this->id;
    }

    public function name(): SubForumName
    {
        return $this->name;
    }

    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }
}
