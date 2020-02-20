<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Rate;

use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Posts\Application\Find\PostFinder;

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
        $post = $this->postFinder->__invoke(new Uuid($command->postId()));

        $this->rating->__invoke($post, $command->like());
    }
}
