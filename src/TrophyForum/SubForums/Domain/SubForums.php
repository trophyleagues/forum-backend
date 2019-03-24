<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Domain;

use Shared\Domain\Collection;

final class SubForums extends Collection
{
    protected function type(): string
    {
        return SubForum::class;
    }
}
