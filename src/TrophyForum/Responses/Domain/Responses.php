<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Domain;

use Shared\Domain\Collection;

final class Responses extends Collection
{
    protected function type(): string
    {
        return Response::class;
    }
}
