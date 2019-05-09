<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TrophyForum\Posts\Application\Create\CreatePostCommand;
use TrophyForum\Posts\Application\Create\CreatePostCommandHandler;

final class CreatePostController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $this->bus->addHandler(CreatePostCommand::class, CreatePostCommandHandler::class);

        $this->bus->dispatch(
            new CreatePostCommand(
                $request->get('id'),
                $request->get('sub_forum_id'),
                $request->get('author_id'),
                $request->get('title'),
                $request->get('content')
            )
        );

        return Response::create(null, Response::HTTP_CREATED);
    }
}
