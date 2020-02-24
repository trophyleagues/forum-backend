<?php

declare(strict_types = 1);

namespace TrophyForum\Searches\Application\Search;

use TrophyForum\Authors\Application\FindByName\AuthorFinder;
use TrophyForum\Authors\Domain\AuthorName;

final class SearchQueryHandler
{
    private $authorFinder;
    private $searcher;

    public function __construct(AuthorFinder $authorFinder, Searcher $searcher)
    {
        $this->authorFinder = $authorFinder;
        $this->searcher     = $searcher;
    }

    public function handle(SearchQuery $query): array
    {
        $author = null;

        if (null !== $query->authorName()) {
            $this->authorFinder->__invoke(new AuthorName($query->authorName()));
        }

        return $this->searcher->__invoke(
            $query->page(),
            $query->keyword(),
            $author
        );
    }
}
