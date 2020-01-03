<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\IncreaseVisualizations;

final class IncreaseVisualizationsCommand
{
    private $postId;

    public function __construct(string $postId)
    {
        $this->postId = $postId;
    }

    public function postId(): string
    {
        return $this->postId;
    }
}
