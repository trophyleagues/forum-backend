<?php

use Tests\TrophyForum\Authors\Domain\AuthorStub;

$factory->define(
    \App\Models\Author::class,
    function () {
        $stub = AuthorStub::random();

        return [
            'id'     => $stub->id()->value(),
            'name'   => $stub->name()->value(),
            'avatar' => $stub->avatar()->value(),
        ];
    }
);
