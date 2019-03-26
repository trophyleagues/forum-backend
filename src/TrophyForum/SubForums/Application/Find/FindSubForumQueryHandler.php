<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application\Find;

use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\pipe;
use TrophyForum\SubForums\Application\SubForumResponse;
use TrophyForum\SubForums\Domain\SubForumId;

final class FindSubForumQueryHandler
{
    private $finder;

    public function __construct(SubForumsFinder $finder)
    {
        $this->finder = pipe($finder, new SubForumResponse());
    }

    public function handle(FindSubForumQuery $query): array
    {
        $id = new SubForumId($query->id());

        return apply($this->finder, [$id]);
    }
}
