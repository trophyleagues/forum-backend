<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application\FindAll;

use TrophyForum\SubForums\Application\SubForumsResponse;
use TrophyForum\SubForums\Domain\SubForums;

final class AllSubForumsResponseConverter
{
    public function __invoke(SubForums $subForums): array
    {
        return SubForumsResponse::response($subForums);
    }
}
