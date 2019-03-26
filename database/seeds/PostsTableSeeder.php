<?php

use App\Models\Author;
use App\Models\Post;
use App\Models\Response;
use Illuminate\Database\Seeder;
use Tests\Shared\Domain\ValueObject\ContentStub;
use Tests\Shared\Domain\ValueObject\CreatedAtStub;
use Tests\Shared\Domain\ValueObject\SlugStub;
use Tests\Shared\Domain\ValueObject\TitleStub;
use Tests\Shared\Domain\ValueObject\UpdatedAtStub;
use Tests\TrophyForum\Authors\Domain\AuthorAvatarStub;
use Tests\TrophyForum\Authors\Domain\AuthorIdStub;
use Tests\TrophyForum\Authors\Domain\AuthorNameStub;
use Tests\TrophyForum\Posts\Domain\PostIdStub;
use Tests\TrophyForum\Posts\Domain\PostIsOpenStub;
use Tests\TrophyForum\Responses\Domain\ResponseIdStub;
use Tests\TrophyForum\SubForums\Domain\SubForumIdStub;

final class PostsTableSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $authorId = AuthorIdStub::random()->value();

            Author::create(
                [
                    'id'     => $authorId,
                    'name'   => AuthorNameStub::random()->value(),
                    'avatar' => AuthorAvatarStub::random()->value(),
                ]
            );

            $postId = PostIdStub::random()->value();

            Post::create(
                [
                    'id'           => $postId,
                    'sub_forum_id' => SubForumIdStub::random()->value(),
                    'author_id'    => $authorId,
                    'title'        => TitleStub::random()->value(),
                    'content'      => ContentStub::random()->value(),
                    'is_open'      => PostIsOpenStub::random()->value(),
                    'slug'         => SlugStub::random()->value(),
                    'created_at'   => CreatedAtStub::random()->value(),
                    'updated_at'   => UpdatedAtStub::random()->value(),
                ]
            );

            for ($j = 0; $j < rand(0, 10); $j++) {
                $authorId = AuthorIdStub::random()->value();

                Author::create(
                    [
                        'id'     => $authorId,
                        'name'   => AuthorNameStub::random()->value(),
                        'avatar' => AuthorAvatarStub::random()->value(),
                    ]
                );

                Response::create(
                    [
                        'id'         => ResponseIdStub::random()->value(),
                        'post_id'    => $postId,
                        'author_id'  => $authorId,
                        'content'    => ContentStub::random()->value(),
                        'created_at' => CreatedAtStub::random()->value(),
                        'updated_at' => UpdatedAtStub::random()->value(),
                    ]
                );
            }
        }
    }
}
