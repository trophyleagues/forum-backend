<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Domain;

use Doctrine\ORM\PersistentCollection;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Roles\Domain\Roles;

class SubForum
{
    private $id;
    private $author;
    private $name;
    private $description;
    private $isAnnounce;
    private $totalPosts;
    private $roles;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        SubForumId $id,
        Author $author,
        SubForumName $name,
        SubForumDescription $description,
        SubForumIsAnnounce $isAnnounce,
        SubForumTotalPosts $totalPosts,
        PersistentCollection $roles = null,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->id          = $id;
        $this->author      = $author;
        $this->name        = $name;
        $this->description = $description;
        $this->isAnnounce  = $isAnnounce;
        $this->totalPosts  = $totalPosts;
        $this->roles       = $roles;
        $this->createdAt   = $createdAt;
        $this->updatedAt   = $updatedAt;
    }

    public static function create(
        SubForumId $id,
        Author $author,
        SubForumName $name,
        SubForumDescription $description,
        SubForumIsAnnounce $isAnnounce,
        SubForumTotalPosts $totalPosts,
        PersistentCollection $roles = null
    ): self {
        return new self(
            $id,
            $author,
            $name,
            $description,
            $isAnnounce,
            new SubForumTotalPosts(0),
            $roles,
            new CreatedAt(new \DateTime()),
            new UpdatedAt(new \DateTime())
        );
    }

    public function id(): SubForumId
    {
        return $this->id;
    }

    public function author(): Author
    {
        return $this->author;
    }

    public function name(): SubForumName
    {
        return $this->name;
    }

    public function description(): SubForumDescription
    {
        return $this->description;
    }

    public function isAnnounce(): SubForumIsAnnounce
    {
        return $this->isAnnounce;
    }

    public function totalPosts(): SubForumTotalPosts
    {
        return null === $this->totalPosts ? new SubForumTotalPosts(0) : $this->totalPosts;
    }

    public function roles(): ?PersistentCollection
    {
        return $this->roles;
    }

    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }

    public function modifyTotalPosts(int $totalPosts): void
    {
        $this->totalPosts = $this->totalPosts()->modify($totalPosts);
    }
}
