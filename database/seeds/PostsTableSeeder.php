<?php

use App\Models\Author;
use App\Models\Post;
use App\Models\Response;
use Illuminate\Database\Seeder;
use Tests\Shared\Domain\ValueObject\ContentStub;
use Tests\Shared\Domain\ValueObject\CreatedAtStub;
use Tests\Shared\Domain\ValueObject\InLikeStub;
use Tests\Shared\Domain\ValueObject\SlugStub;
use Tests\Shared\Domain\ValueObject\TitleStub;
use Tests\Shared\Domain\ValueObject\UnLikeStub;
use Tests\Shared\Domain\ValueObject\UpdatedAtStub;
use Tests\Shared\Domain\ValueObject\UuidStub;
use Tests\TrophyForum\Authors\Domain\AuthorAvatarStub;
use Tests\TrophyForum\Authors\Domain\AuthorNameStub;
use Tests\TrophyForum\Posts\Domain\PostIsOpenStub;
use Tests\TrophyForum\Posts\Domain\PostVisualizationStub;

final class PostsTableSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $authorId = UuidStub::random()->value();

            Author::create(
                [
                    'id'     => $authorId,
                    'name'   => AuthorNameStub::random()->value(),
                    'avatar' => AuthorAvatarStub::random()->value(),
                ]
            );

            $postId = UuidStub::random()->value();

            Post::create(
                [
                    'id'            => $postId,
                    'sub_forum_id'  => UuidStub::random()->value(),
                    'author_id'     => $authorId,
                    'title'         => TitleStub::random()->value(),
                    'content'       => ContentStub::random()->value(),
                    'is_open'       => PostIsOpenStub::random()->value(),
                    'slug'          => SlugStub::random()->value(),
                    'visualization' => PostVisualizationStub::random()->value(),
                    'in_like'       => InLikeStub::random()->value(),
                    'un_like'       => UnLikeStub::random()->value(),
                    'created_at'    => CreatedAtStub::random()->value(),
                    'updated_at'    => UpdatedAtStub::random()->value(),
                ]
            );

            for ($j = 0; $j < rand(0, 10); $j++) {
                $authorId = UuidStub::random()->value();

                Author::create(
                    [
                        'id'     => $authorId,
                        'name'   => AuthorNameStub::random()->value(),
                        'avatar' => AuthorAvatarStub::random()->value(),
                    ]
                );

                Response::create(
                    [
                        'id'         => UuidStub::random()->value(),
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
