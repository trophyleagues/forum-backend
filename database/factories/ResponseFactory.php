<?php

use Tests\TrophyForum\Authors\Domain\AuthorStub;
use Tests\TrophyForum\Posts\Domain\PostStub;
use Tests\TrophyForum\Responses\Domain\ResponseStub;

$factory->define(
    \App\Models\Response::class,
    function () {
        $stub = ResponseStub::random(PostStub::random(), AuthorStub::random());

        return [
            'id'         => $stub->id()->value(),
            'post_id'    => $stub->post()->id()->value(),
            'author_id'  => $stub->author()->id()->value(),
            'content'    => $stub->content()->value(),
            'created_at' => $stub->createdAt()->value(),
            'updated_at' => $stub->updatedAt()->value(),
        ];
    }
);
