<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use TrophyForum\Posts\Application\Find\FindPostQuery;
use TrophyForum\Posts\Application\Find\FindPostQueryHandler;
use TrophyForum\Posts\Application\IncreaseVisualizations\IncreaseVisualizationsCommand;
use TrophyForum\Posts\Application\IncreaseVisualizations\IncreaseVisualizationsCommandHandler;
use TrophyForum\Posts\Domain\PostNotExist;

final class GetPostController extends Controller
{
    public function __invoke(string $postId): JsonResponse
    {
        $this->bus->addHandler(FindPostQuery::class, FindPostQueryHandler::class);
        $this->bus->addHandler(IncreaseVisualizationsCommand::class, IncreaseVisualizationsCommandHandler::class);

        try {
            $this->bus->dispatch(new IncreaseVisualizationsCommand($postId));

            return JsonResponse::create(
                $this->bus->dispatch(new FindPostQuery($postId))
            );
        } catch (PostNotExist $e) {
            return JsonResponse::create(['message' => $e->getMessage()], 404);
        }
    }
}
