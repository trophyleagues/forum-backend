<?php

declare(strict_types = 1);

namespace TrophyForum\Searches\Application\Search;

final class SearchQuery
{
    private $page;
    private $keyword;
    private $authorName;

    public function __construct(int $page, string $keyword = null, string $authorName = null)
    {
        $this->page       = $page;
        $this->keyword    = $keyword;
        $this->authorName = $authorName;
    }

    public function page(): int
    {
        return $this->page;
    }

    public function keyword(): ?string
    {
        return $this->keyword;
    }

    public function authorName(): ?string
    {
        return $this->authorName;
    }
}
