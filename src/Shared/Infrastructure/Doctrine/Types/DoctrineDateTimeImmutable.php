<?php

namespace Shared\Infrastructure\Doctrine\Types;

use DateTimeImmutable;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\DateTimeType;

/**
 * Class DoctrineDateTimeImmutable
 * @package Psonrie\Infrastructure\Doctrine\Types
 */
class DoctrineDateTimeImmutable extends DateTimeType
{

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        /** @var DateTimeImmutable $value */
        return ($value !== null) ? $value->format($platform->getDateTimeFormatString()) : null;
    }


    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null || $value instanceof DateTimeImmutable) {
            return $value;
        }

        $val = DateTimeImmutable::createFromFormat($platform->getDateTimeFormatString(), $value);

        if (! $val) {
            $val = date_create($value);
        }

        if (! $val) {
            throw ConversionException::conversionFailedFormat(
                $value,
                $this->getName(),
                $platform->getDateTimeFormatString()
            );
        }

        return $val;
    }
}
