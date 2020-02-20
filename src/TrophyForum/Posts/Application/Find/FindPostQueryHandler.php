<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Find;

use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Posts\Application\PostResponse;
use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\pipe;

final class FindPostQueryHandler
{
    private $finder;

    public function __construct(PostFinder $finder)
    {
        $this->finder = pipe($finder, new PostResponse());
    }

    public function handle(FindPostQuery $query): array
    {
        $id = new Uuid($query->id());

        return apply($this->finder, [$id]);
    }
}
