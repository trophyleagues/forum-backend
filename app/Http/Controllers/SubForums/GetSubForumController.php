<?php

declare(strict_types = 1);

namespace App\Http\Controllers\SubForums;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use TrophyForum\SubForums\Application\Find\FindSubForumQuery;
use TrophyForum\SubForums\Application\Find\FindSubForumQueryHandler;
use TrophyForum\SubForums\Domain\SubForumNotExist;

final class GetSubForumController extends Controller
{
    public function __invoke(string $subForumId): JsonResponse
    {
        try {
            $this->bus()->addHandler(FindSubForumQuery::class, FindSubForumQueryHandler::class);

            return JsonResponse::create(
                $this->bus()->dispatch(new FindSubForumQuery($subForumId))
            );
        } catch (SubForumNotExist $e) {
            return JsonResponse::create(['message' => $e->getMessage()], 404);
        }
    }
}
