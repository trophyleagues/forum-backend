<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Update;

final class UpdatePostCommand
{
    private $id;
    private $title;
    private $content;

    public function __construct(
        string $id,
        string $title,
        string $content
    ) {
        $this->id      = $id;
        $this->title   = $title;
        $this->content = $content;
    }

    public function id(): string
    {
        return $this->id;
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
