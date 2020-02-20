<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Domain;

use DateTime;
use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Posts\Domain\Post;

class Response
{
    private $id;
    private $post;
    private $author;
    private $content;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        Uuid $id,
        Post $post,
        Author $author,
        Content $content,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->id        = $id;
        $this->post      = $post;
        $this->author    = $author;
        $this->content   = $content;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        Uuid $id,
        Post $post,
        Author $author,
        Content $content
    ): Response {
        $createdAt = new CreatedAt(new DateTime());
        $updatedAt = new UpdatedAt(new DateTime());

        return new self($id, $post, $author, $content, $createdAt, $updatedAt);
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function post(): Post
    {
        return $this->post;
    }

    public function author(): Author
    {
        return $this->author;
    }

    public function content(): Content
    {
        return $this->content;
    }

    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }

    public function updateContent(Content $content): void
    {
        $this->content   = $content;
        $this->updatedAt = new UpdatedAt(new DateTime());
    }
}
