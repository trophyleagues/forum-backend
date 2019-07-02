<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Domain;

use DateTime;
use Doctrine\ORM\PersistentCollection;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\Slug;
use Shared\Domain\ValueObject\UpdatedAt;
use TrophyForum\Authors\Domain\Author;

class SubForum
{
    private $id;
    private $author;
    private $name;
    private $description;
    private $isAnnounce;
    private $totalPosts;
    private $posts;
    private $roles;
    private $slug;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        SubForumId $id,
        Author $author,
        SubForumName $name,
        SubForumDescription $description,
        SubForumIsAnnounce $isAnnounce,
        SubForumTotalPosts $totalPosts,
        PersistentCollection $posts = null,
        PersistentCollection $roles = null,
        Slug $slug,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->id          = $id;
        $this->author      = $author;
        $this->name        = $name;
        $this->description = $description;
        $this->isAnnounce  = $isAnnounce;
        $this->totalPosts  = $totalPosts;
        $this->posts       = $posts;
        $this->roles       = $roles;
        $this->slug        = $slug;
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
        PersistentCollection $posts = null,
        PersistentCollection $roles = null
    ): self {
        return new self(
            $id,
            $author,
            $name,
            $description,
            $isAnnounce,
            new SubForumTotalPosts(0),
            $posts,
            $roles,
            new Slug($name->value()),
            new CreatedAt(new DateTime()),
            new UpdatedAt(new DateTime())
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

    public function posts(): ?PersistentCollection
    {
        return $this->posts;
    }

    public function roles(): ?PersistentCollection
    {
        return $this->roles;
    }

    public function slug(): Slug
    {
        return $this->slug;
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
