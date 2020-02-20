<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Rate;

final class CreateRateCommand
{
    private $postId;
    private $like;

    public function __construct(string $postId, string $like)
    {
        $this->postId = $postId;
        $this->like   = $like;
    }

    public function postId(): string
    {
        return $this->postId;
    }

    public function like(): string
    {
        return $this->like;
    }
}
