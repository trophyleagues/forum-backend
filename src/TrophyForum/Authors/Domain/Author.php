<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Domain;

class Author
{
    private $id;
    private $name;
    private $avatar;

    public function __construct(AuthorId $id, AuthorName $name, AuthorAvatar $avatar)
    {
        $this->id     = $id;
        $this->name   = $name;
        $this->avatar = $avatar;
    }

    public function id(): AuthorId
    {
        return $this->id;
    }

    public function name(): AuthorName
    {
        return $this->name;
    }

    public function avatar(): AuthorAvatar
    {
        return $this->avatar;
    }
}
