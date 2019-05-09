<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Create;

use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\Title;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\SubForums\Domain\SubForum;

final class PostCreator
{
    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(
        PostId $id,
        SubForum $subForum,
        Author $author,
        Title $title,
        Content $content
    ): void {
        $post = Post::create($id, $subForum, $author, $title, $content);

        $this->repository->save($post);
    }
}
