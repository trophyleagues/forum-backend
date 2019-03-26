<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Responses\Domain;

use Tests\Shared\Domain\ValueObject\UuidStub;
use TrophyForum\Responses\Domain\ResponseId;

final class ResponseIdStub
{
    public static function create(string $id): ResponseId
    {
        return new ResponseId($id);
    }

    public static function random(): ResponseId
    {
        return self::create(UuidStub::random());
    }
}
