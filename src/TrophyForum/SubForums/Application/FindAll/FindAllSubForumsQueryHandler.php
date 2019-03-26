<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application\FindAll;

use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\pipe;
use TrophyForum\SubForums\Application\SubForumsResponse;

final class FindAllSubForumsQueryHandler
{
    private $finder;

    public function __construct(AllSubForumsFinder $finder)
    {
        $this->finder = pipe($finder, new SubForumsResponse());
    }

    public function handle(FindAllSubForumsQuery $query): array
    {
        return apply($this->finder);
    }
}
