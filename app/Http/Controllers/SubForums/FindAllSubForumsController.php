<?php

declare(strict_types = 1);

namespace App\Http\Controllers\SubForums;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use TrophyForum\SubForums\Application\FindAll\FindAllSubForumsQuery;
use TrophyForum\SubForums\Application\FindAll\FindAllSubForumsQueryHandler;

final class FindAllSubForumsController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $this->bus()->addHandler(FindAllSubForumsQuery::class, FindAllSubForumsQueryHandler::class);

        return JsonResponse::create(
            $this->bus()->dispatch(new FindAllSubForumsQuery())
        );
    }
}
