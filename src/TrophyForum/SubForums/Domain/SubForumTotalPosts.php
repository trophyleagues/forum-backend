<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Domain;

use Shared\Domain\ValueObject\IntValueObject;

final class SubForumTotalPosts extends IntValueObject
{
    public function increase(): self
    {
        return new self($this->value() + 1);
    }
}
