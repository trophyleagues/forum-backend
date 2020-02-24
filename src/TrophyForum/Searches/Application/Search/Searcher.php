<?php

declare(strict_types = 1);

namespace TrophyForum\Searches\Application\Search;

use TrophyForum\Authors\Domain\Author;
use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\Responses\Domain\ResponseRepository;
use TrophyForum\Searches\Application\SearchResponse;

final class Searcher
{
    private $postRepository;
    private $responseRepository;

    public function __construct(
        PostRepository $postRepository,
        ResponseRepository $responseRepository
    ) {
        $this->postRepository     = $postRepository;
        $this->responseRepository = $responseRepository;
    }

    public function __invoke(int $page, string $keyword = null, Author $author = null): array
    {
        return (new SearchResponse())->__invoke(
            $this->postRepository->byKeywordAndAuthor($page, $keyword, $author),
            $this->responseRepository->byKeywordAndAuthor($page, $keyword, $author)
        );
    }
}
