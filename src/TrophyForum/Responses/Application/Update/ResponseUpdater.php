<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application\Update;

use Shared\Domain\ValueObject\Content;
use TrophyForum\Responses\Application\Find\ResponseFinder;
use TrophyForum\Responses\Domain\ResponseId;
use TrophyForum\Responses\Domain\ResponseRepository;

final class ResponseUpdater
{
    private $finder;
    private $repository;

    public function __construct(ResponseRepository $repository)
    {
        $this->finder     = new ResponseFinder($repository);
        $this->repository = $repository;
    }

    public function __invoke(ResponseId $id, Content $content): void
    {
        $response = $this->finder->__invoke($id);

        $response->updateContent($content);

        $this->repository->save($response);
    }
}
