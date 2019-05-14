<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Update;

use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\Title;
use TrophyForum\Posts\Application\Find\PostFinder;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\Posts\Domain\PostRepository;

final class PostUpdater
{
    private $finder;
    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->finder     = new PostFinder($repository);
        $this->repository = $repository;
    }

    public function __invoke(
        PostId $id,
        Title $title,
        Content $content
    ): void {
        $post = $this->finder->__invoke($id);

        $post->updateTitle($title);
        $post->updateContent($content);

        $this->repository->save($post);
    }
}
