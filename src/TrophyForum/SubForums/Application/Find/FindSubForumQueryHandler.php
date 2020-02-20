<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application\Find;

use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\pipe;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\SubForums\Application\SubForumResponse;

final class FindSubForumQueryHandler
{
    private $finder;

    public function __construct(SubForumsFinder $finder)
    {
        $this->finder = pipe($finder, new SubForumResponse());
    }

    public function handle(FindSubForumQuery $query): array
    {
        $id = new Uuid($query->id());

        return apply($this->finder, [$id]);
    }
}
