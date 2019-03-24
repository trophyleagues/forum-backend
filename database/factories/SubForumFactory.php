<?php

use Tests\TrophyForum\SubForums\Domain\SubForumStub;

$factory->define(
    \App\Models\SubForum::class,
    function () {
        $stub = SubForumStub::random();

        return [
            'id'         => $stub->id()->value(),
            'name'       => $stub->name()->value(),
            'created_at' => $stub->createdAt()->value(),
            'updated_at' => $stub->updatedAt()->value(),
        ];
    }
);
