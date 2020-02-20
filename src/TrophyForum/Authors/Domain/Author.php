<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Domain;

use Shared\Domain\ValueObject\Uuid;

class Author
{
    private $id;
    private $name;
    private $avatar;

    public function __construct(Uuid $id, AuthorName $name, AuthorAvatar $avatar)
    {
        $this->id     = $id;
        $this->name   = $name;
        $this->avatar = $avatar;
    }

    public static function create(Uuid $id, AuthorName $name): Author
    {
        $avatar = new AuthorAvatar('default.jpg');

        return new self($id, $name, $avatar);
    }

    public function id(): Uuid
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
