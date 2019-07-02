<?php

use App\Models\SubForum;
use Tests\TrophyForum\SubForums\Domain\SubForumStub;

$factory->define(
    SubForum::class,
    function () {
        $stub = SubForumStub::random();

        return [
            'id'          => $stub->id()->value(),
            'author_id'   => $stub->author()->id()->value(),
            'name'        => $stub->name()->value(),
            'description' => $stub->description()->value(),
            'is_announce' => $stub->isAnnounce()->value(),
            'slug'        => $stub->slug()->value(),
            'created_at'  => $stub->createdAt()->value(),
            'updated_at'  => $stub->updatedAt()->value(),
        ];
    }
);
