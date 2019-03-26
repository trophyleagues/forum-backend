<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use TrophyForum\Posts\Application\Find\FindPostQuery;
use TrophyForum\Posts\Application\Find\FindPostQueryHandler;
use TrophyForum\Posts\Domain\PostNotExist;

final class GetPostController extends Controller
{
    public function __invoke(string $postId): JsonResponse
    {
        try {
            $this->bus->addHandler(FindPostQuery::class, FindPostQueryHandler::class);

            return JsonResponse::create(
                $this->bus->dispatch(new FindPostQuery($postId))
            );
        } catch (PostNotExist $e) {
            return JsonResponse::create(['message' => $e->getMessage()], 404);
        }
    }
}
