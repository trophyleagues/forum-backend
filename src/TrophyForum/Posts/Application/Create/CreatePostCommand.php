<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Create;

final class CreatePostCommand
{
    private $id;
    private $subForumId;
    private $authorId;
    private $title;
    private $content;

    public function __construct(
        string $id,
        string $subForumId,
        string $authorId,
        string $title,
        string $content
    ) {
        $this->id         = $id;
        $this->subForumId = $subForumId;
        $this->authorId   = $authorId;
        $this->title      = $title;
        $this->content    = $content;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function subForumId(): string
    {
        return $this->subForumId;
    }

    public function authorId(): string
    {
        return $this->authorId;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function content(): string
    {
        return $this->content;
    }
}
