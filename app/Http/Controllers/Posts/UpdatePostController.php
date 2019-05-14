<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TrophyForum\Posts\Application\Update\UpdatePostCommand;
use TrophyForum\Posts\Application\Update\UpdatePostCommandHandler;

final class UpdatePostController extends Controller
{
    public function __invoke(string $postId, Request $request): Response
    {
        $this->bus->addHandler(UpdatePostCommand::class, UpdatePostCommandHandler::class);

        $this->bus->dispatch(
            new UpdatePostCommand(
                $postId,
                $request->get('title'),
                $request->get('content')
            )
        );

        return Response::create(null, Response::HTTP_OK);
    }
}
