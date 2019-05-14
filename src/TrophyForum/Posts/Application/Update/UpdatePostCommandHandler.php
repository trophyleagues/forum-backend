<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Update;

use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\Title;
use TrophyForum\Posts\Domain\PostId;

final class UpdatePostCommandHandler
{
    private $updater;

    public function __construct(PostUpdater $updater)
    {
        $this->updater = $updater;
    }

    public function handle(UpdatePostCommand $command): void
    {
        $id      = new PostId($command->id());
        $title   = new Title($command->title());
        $content = new Content($command->content());

        $this->updater->__invoke($id, $title, $content);
    }
}
