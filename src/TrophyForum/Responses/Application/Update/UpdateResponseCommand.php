<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application\Update;

final class UpdateResponseCommand
{
    private $id;
    private $content;

    public function __construct(string $id, string $content)
    {
        $this->id      = $id;
        $this->content = $content;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function content(): string
    {
        return $this->content;
    }
}
