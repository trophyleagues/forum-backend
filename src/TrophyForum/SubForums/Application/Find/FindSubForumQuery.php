<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application\Find;

final class FindSubForumQuery
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}
