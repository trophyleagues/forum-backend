<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Create;

use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\Title;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Application\Find\AuthorFinder;
use TrophyForum\SubForums\Application\Find\SubForumsFinder;

final class CreatePostCommandHandler
{
    private $creator;
    private $subForumsFinder;
    private $authorFinder;

    public function __construct(PostCreator $creator, SubForumsFinder $subForumsFinder, AuthorFinder $authorFinder)
    {
        $this->creator         = $creator;
        $this->subForumsFinder = $subForumsFinder;
        $this->authorFinder    = $authorFinder;
    }

    public function handle(CreatePostCommand $command): void
    {
        $title    = new Title($command->title());
        $subForum = $this->subForumsFinder->__invoke(new Uuid($command->subForumId()));
        $author   = $this->authorFinder->__invoke(new Uuid($command->authorId()));
        $content  = new Content($command->content());
        $id       = new Uuid($command->id());

        $this->creator->__invoke($id, $subForum, $author, $title, $content);
    }
}
