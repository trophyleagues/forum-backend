<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application\Create;

use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Responses\Domain\Response;
use TrophyForum\Responses\Domain\ResponseRepository;

final class ResponseCreator
{
    private $repository;

    public function __construct(ResponseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        Uuid $id,
        Post $post,
        Author $author,
        Content $content
    ): void {
        $post = Response::create($id, $post, $author, $content);

        $this->repository->save($post);
    }
}
