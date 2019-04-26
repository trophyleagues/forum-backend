<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Domain;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use Tests\Shared\Domain\ValueObject\CreatedAtStub;
use Tests\Shared\Domain\ValueObject\UpdatedAtStub;
use Tests\TrophyForum\Authors\Domain\AuthorStub;
use Tests\TrophyForum\Posts\Domain\PostStub;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\SubForums\Domain\SubForum;
use TrophyForum\SubForums\Domain\SubForumDescription;
use TrophyForum\SubForums\Domain\SubForumId;
use TrophyForum\SubForums\Domain\SubForumIsAnnounce;
use TrophyForum\SubForums\Domain\SubForumName;
use TrophyForum\SubForums\Domain\SubForumTotalPosts;

final class SubForumStub
{
    public static function create(
        SubForumId $id,
        Author $author,
        SubForumName $name,
        SubForumDescription $description,
        SubForumIsAnnounce $isAnnounce,
        SubForumTotalPosts $totalPosts,
        PersistentCollection $posts = null,
        PersistentCollection $roles = null,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        return new SubForum(
            $id, $author, $name, $description, $isAnnounce, $totalPosts, $posts, $roles, $createdAt, $updatedAt
        );
    }

    public static function random()
    {
        return self::create(
            SubForumIdStub::random(),
            AuthorStub::random(),
            SubForumNameStub::random(),
            SubForumDescriptionStub::random(),
            SubForumIsAnnounceStub::random(),
            SubForumTotalPostsStub::random(),
            null,
            null,
            CreatedAtStub::random(),
            UpdatedAtStub::random()
        );
    }
}
