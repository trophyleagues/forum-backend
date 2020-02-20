<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Domain;

use DateTime;
use Doctrine\ORM\PersistentCollection;
use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\InLike;
use Shared\Domain\ValueObject\Slug;
use Shared\Domain\ValueObject\Title;
use Shared\Domain\ValueObject\UnLike;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\SubForums\Domain\SubForum;

class Post
{
    private $id;
    private $subForum;
    private $author;
    private $title;
    private $content;
    private $isOpen;
    private $responses;
    private $slug;
    private $visualization;
    private $inLike;
    private $unLike;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        Uuid $id,
        SubForum $subForum,
        Author $author,
        Title $title,
        Content $content,
        PostIsOpen $isOpen,
        PersistentCollection $responses = null,
        Slug $slug,
        PostVisualization $visualization,
        InLike $inLike,
        UnLike $unLike,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->id            = $id;
        $this->subForum      = $subForum;
        $this->author        = $author;
        $this->title         = $title;
        $this->content       = $content;
        $this->isOpen        = $isOpen;
        $this->responses     = $responses;
        $this->slug          = $slug;
        $this->visualization = $visualization;
        $this->inLike        = $inLike;
        $this->unLike        = $unLike;
        $this->createdAt     = $createdAt;
        $this->updatedAt     = $updatedAt;
    }

    public static function create(
        Uuid $id,
        SubForum $subForum,
        Author $author,
        Title $title,
        Content $content
    ): Post {
        $isOpen        = new PostIsOpen(true);
        $slug          = new Slug($title->value());
        $visualization = new PostVisualization(0);
        $inLike        = new InLike(0);
        $unLike        = new UnLike(0);
        $createdAt     = new CreatedAt(new DateTime());
        $updatedAt     = new UpdatedAt(new DateTime());

        return new self(
            $id,
            $subForum,
            $author,
            $title,
            $content,
            $isOpen,
            null,
            $slug,
            $visualization,
            $inLike,
            $unLike,
            $createdAt,
            $updatedAt
        );
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function subForum(): SubForum
    {
        return $this->subForum;
    }

    public function author(): Author
    {
        return $this->author;
    }

    public function title(): Title
    {
        return $this->title;
    }

    public function content(): Content
    {
        return $this->content;
    }

    public function isOpen(): PostIsOpen
    {
        return $this->isOpen;
    }

    public function responses(): ?PersistentCollection
    {
        return $this->responses;
    }

    public function slug(): Slug
    {
        return $this->slug;
    }

    public function visualization(): PostVisualization
    {
        return $this->visualization;
    }

    public function inLike(): InLike
    {
        return $this->inLike;
    }

    public function unLike(): UnLike
    {
        return $this->unLike;
    }

    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }

    public function updateTitle(Title $title): void
    {
        $this->title     = $title;
        $this->updatedAt = new UpdatedAt(new DateTime());
    }

    public function updateContent(Content $content): void
    {
        $this->content   = $content;
        $this->updatedAt = new UpdatedAt(new DateTime());
    }

    public function increaseVisualization(): void
    {
        $this->visualization = $this->visualization->increase();
        $this->updatedAt     = new UpdatedAt(new DateTime());
    }

    public function updateRating(string $rating): void
    {
        if ($rating !== '-1' && $rating !== '1') {
            return;
        }

        if ($rating === '1') {
            $this->inLike = new InLike($this->inLike()->value() + 1);
        }

        if ($rating === '-1') {
            $this->unLike = new UnLike($this->unLike()->value() + 1);
        }

        $this->updatedAt = new UpdatedAt(new DateTime());
    }
}
