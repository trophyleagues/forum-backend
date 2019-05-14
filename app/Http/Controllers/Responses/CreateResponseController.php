<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Responses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TrophyForum\Responses\Application\Create\CreateResponseCommand;
use TrophyForum\Responses\Application\Create\CreateResponseCommandHandler;

final class CreateResponseController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $this->bus->addHandler(CreateResponseCommand::class, CreateResponseCommandHandler::class);

        $this->bus->dispatch(
            new CreateResponseCommand(
                $request->get('id'),
                $request->get('post_id'),
                $request->get('author_id'),
                $request->get('content')
            )
        );

        return Response::create(null, Response::HTTP_CREATED);
    }
}
