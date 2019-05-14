<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application\Create;

use Shared\Domain\ValueObject\Content;
use TrophyForum\Authors\Application\Find\AuthorFinder;
use TrophyForum\Authors\Domain\AuthorId;
use TrophyForum\Posts\Application\Find\PostFinder;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\Responses\Domain\ResponseId;

final class CreateResponseCommandHandler
{
    private $creator;
    private $postFinder;
    private $authorFinder;

    public function __construct(ResponseCreator $creator, PostFinder $postFinder, AuthorFinder $authorFinder)
    {
        $this->creator      = $creator;
        $this->postFinder   = $postFinder;
        $this->authorFinder = $authorFinder;
    }

    public function handle(CreateResponseCommand $command): void
    {
        $id      = new ResponseId($command->id());
        $post    = $this->postFinder->__invoke(new PostId($command->postId()));
        $author  = $this->authorFinder->__invoke(new AuthorId($command->authorId()));
        $content = new Content($command->content());

        $this->creator->__invoke($id, $post, $author, $content);
    }
}
