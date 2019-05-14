<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application\Update;

use Shared\Domain\ValueObject\Content;
use TrophyForum\Responses\Domain\ResponseId;

final class UpdateResponseCommandHandler
{
    private $updater;

    public function __construct(ResponseUpdater $updater)
    {
        $this->updater = $updater;
    }

    public function handle(UpdateResponseCommand $command): void
    {
        $id      = new ResponseId($command->id());
        $content = new Content($command->content());

        $this->updater->__invoke($id, $content);
    }
}
