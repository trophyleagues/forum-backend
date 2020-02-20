<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application\Create;

use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Application\Find\AuthorFinder;
use TrophyForum\Posts\Application\Find\PostFinder;

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
        $id      = new Uuid($command->id());
        $post    = $this->postFinder->__invoke(new Uuid($command->postId()));
        $author  = $this->authorFinder->__invoke(new Uuid($command->authorId()));
        $content = new Content($command->content());

        $this->creator->__invoke($id, $post, $author, $content);
    }
}
