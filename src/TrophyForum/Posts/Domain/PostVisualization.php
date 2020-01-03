<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Domain;

use Shared\Domain\ValueObject\IntValueObject;

final class PostVisualization extends IntValueObject
{
    public function increase(): self
    {
        return new self($this->value() + 1);
    }
}
