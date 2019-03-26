<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\Responses\Domain\ResponseId;

final class ResponseIdType extends StringType
{
    const NAME = 'response_id';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new ResponseId($value);
    }
}
