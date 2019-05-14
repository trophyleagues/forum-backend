<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Responses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TrophyForum\Responses\Application\Update\UpdateResponseCommand;
use TrophyForum\Responses\Application\Update\UpdateResponseCommandHandler;

final class UpdateResponseController extends Controller
{
    public function __invoke(string $responseId, Request $request): Response
    {
        $this->bus->addHandler(UpdateResponseCommand::class, UpdateResponseCommandHandler::class);

        $this->bus->dispatch(
            new UpdateResponseCommand(
                $responseId,
                $request->get('content')
            )
        );

        return Response::create(null, Response::HTTP_OK);
    }
}
