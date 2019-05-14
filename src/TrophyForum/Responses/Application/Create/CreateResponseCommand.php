<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application\Create;

final class CreateResponseCommand
{
    private $id;
    private $postId;
    private $authorId;
    private $content;

    public function __construct(
        string $id,
        string $postId,
        string $authorId,
        string $content
    ) {
        $this->id       = $id;
        $this->postId   = $postId;
        $this->authorId = $authorId;
        $this->content  = $content;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function postId(): string
    {
        return $this->postId;
    }

    public function authorId(): string
    {
        return $this->authorId;
    }

    public function content(): string
    {
        return $this->content;
    }
}
