<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application\Find;

use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Responses\Domain\Response;
use TrophyForum\Responses\Domain\ResponseNotExist;
use TrophyForum\Responses\Domain\ResponseRepository;

final class ResponseFinder
{
    private $repository;

    public function __construct(ResponseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Uuid $id): Response
    {
        $response = $this->repository->byId($id);

        if (null === $response) {
            throw new ResponseNotExist(sprintf('The response <%s> does not exists', $id->value()));
        }

        return $response;
    }
}
