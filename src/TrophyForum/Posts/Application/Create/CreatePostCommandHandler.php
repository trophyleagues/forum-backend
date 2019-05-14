<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Application\Create;

use Shared\Domain\ValueObject\Content;
use Shared\Domain\ValueObject\Title;
use TrophyForum\Authors\Application\Find\AuthorFinder;
use TrophyForum\Authors\Domain\AuthorId;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\SubForums\Application\Find\SubForumsFinder;
use TrophyForum\SubForums\Domain\SubForumId;

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
        $subForum = $this->subForumsFinder->__invoke(new SubForumId($command->subForumId()));
        $author   = $this->authorFinder->__invoke(new AuthorId($command->authorId()));
        $content  = new Content($command->content());
        $id       = new PostId($command->id());

        $this->creator->__invoke($id, $subForum, $author, $title, $content);
    }
}
