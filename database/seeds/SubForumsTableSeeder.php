<?php

use App\Models\Author;
use App\Models\Role;
use App\Models\SubForum;
use Illuminate\Database\Seeder;
use Tests\Shared\Domain\ValueObject\CreatedAtStub;
use Tests\Shared\Domain\ValueObject\UpdatedAtStub;
use Tests\TrophyForum\Authors\Domain\AuthorAvatarStub;
use Tests\TrophyForum\Authors\Domain\AuthorIdStub;
use Tests\TrophyForum\Authors\Domain\AuthorNameStub;
use Tests\TrophyForum\Roles\Domain\RoleIdStub;
use Tests\TrophyForum\Roles\Domain\RoleNameStub;
use Tests\TrophyForum\SubForums\Domain\SubForumDescriptionStub;
use Tests\TrophyForum\SubForums\Domain\SubForumIsAnnounceStub;
use Tests\TrophyForum\SubForums\Domain\SubForumNameStub;
use TrophyForum\SubForums\Domain\SubForumId;

final class SubForumsTableSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $authorId = AuthorIdStub::random()->value();

            Author::create(
                [
                    'id'     => $authorId,
                    'name'   => AuthorNameStub::random()->value(),
                    'avatar' => AuthorAvatarStub::random()->value(),
                ]
            );

            SubForum::create(
                [
                    'id'          => SubForumId::random()->value(),
                    'author_id'   => $authorId,
                    'name'        => SubForumNameStub::random()->value(),
                    'description' => SubForumDescriptionStub::random()->value(),
                    'is_announce' => SubForumIsAnnounceStub::random()->value(),
                    'created_at'  => CreatedAtStub::random()->value(),
                    'updated_at'  => UpdatedAtStub::random()->value(),
                ]
            );

            Role::create(
                [
                    'id'        => RoleIdStub::random()->value(),
                    'author_id' => $authorId,
                    'name'      => RoleNameStub::random()->value(),
                ]
            );
        }

        $roles = Role::all();

        SubForum::all()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
