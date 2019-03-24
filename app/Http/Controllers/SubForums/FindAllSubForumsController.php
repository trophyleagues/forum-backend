<?php

declare(strict_types = 1);

namespace App\Http\Controllers\SubForums;

use Illuminate\Http\JsonResponse;
use Joselfonseca\LaravelTactician\CommandBusInterface;
use TrophyForum\SubForums\Application\FindAll\FindAllSubForumsQuery;
use TrophyForum\SubForums\Application\FindAll\FindAllSubForumsQueryHandler;

final class FindAllSubForumsController
{
    private $bus;

    public function __construct(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(): JsonResponse
    {
        $this->bus->addHandler(FindAllSubForumsQuery::class, FindAllSubForumsQueryHandler::class);

        return JsonResponse::create(
            $this->bus->dispatch(new FindAllSubForumsQuery())
        );
    }
}
