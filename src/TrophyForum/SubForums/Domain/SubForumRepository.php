<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Domain;

interface SubForumRepository
{
    public function all(): SubForums;

    public function bySubForumId(SubForumId $id): ?SubForum;
}
