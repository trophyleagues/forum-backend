<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\IncreaseVisualizations;

use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Posts\Application\Find\PostFinder;

final class IncreaseVisualizationsCommandHandler
{
    private $finder;
    private $increaseVisualizations;

    public function __construct(PostFinder $finder, PostIncreaseVisualizations $increaseVisualizations)
    {
        $this->finder                 = $finder;
        $this->increaseVisualizations = $increaseVisualizations;
    }

    public function handle(IncreaseVisualizationsCommand $command): void
    {
        $postId = new Uuid($command->postId());

        $this->increaseVisualizations->__invoke($this->finder->__invoke($postId));
    }
}
