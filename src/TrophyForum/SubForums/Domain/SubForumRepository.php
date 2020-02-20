<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Domain;

use Shared\Domain\ValueObject\Uuid;

interface SubForumRepository
{
    public function all(): SubForums;

    public function bySubForumId(Uuid $id): ?SubForum;
}
