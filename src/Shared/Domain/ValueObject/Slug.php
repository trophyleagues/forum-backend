<?php

declare(strict_types = 1);

namespace Shared\Domain\ValueObject;

use Shared\Infrastructure\Slug\SlugGenerator;

final class Slug extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct(SlugGenerator::generate($value));
    }
}
