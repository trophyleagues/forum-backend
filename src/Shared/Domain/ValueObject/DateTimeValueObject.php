<?php

declare(strict_types = 1);

namespace Shared\Domain\ValueObject;

abstract class DateTimeValueObject
{
    protected $value;

    public function __construct(\DateTime $value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value->format('Y-m-d h:i:s');
    }

    public function dateTime(): \DateTime
    {
        return $this->value;
    }
}
