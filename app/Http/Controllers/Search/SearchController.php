<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use TrophyForum\Searches\Application\Search\SearchQuery;
use TrophyForum\Searches\Application\Search\SearchQueryHandler;

final class SearchController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $this->bus->addHandler(SearchQuery::class, SearchQueryHandler::class);

        return JsonResponse::create(
            $this->bus->dispatch(
                new SearchQuery(
                    (int) $request->get('page', 1),
                    $request->get('keyword', null),
                    $request->get('author', null)
                )
            )
        );
    }
}
