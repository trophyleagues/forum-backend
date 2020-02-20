<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Rate;

use TrophyForum\Posts\Application\Find\PostFinder;
use TrophyForum\Posts\Domain\PostId;

final class CreateRateCommandHandler
{
    private $postFinder;
    private $rating;

    public function __construct(PostFinder $postFinder, Rating $rating)
    {
        $this->postFinder = $postFinder;
        $this->rating     = $rating;
    }

    public function handle(CreateRateCommand $command)
    {
        $post = $this->postFinder->__invoke(new PostId($command->postId()));

        $this->rating->__invoke($post, $command->like());
    }
}
