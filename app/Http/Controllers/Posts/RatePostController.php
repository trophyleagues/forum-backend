<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TrophyForum\Posts\Application\Rate\CreateRateCommand;
use TrophyForum\Posts\Application\Rate\CreateRateCommandHandler;

final class RatePostController extends Controller
{
    public function __invoke(string $postId, Request $request): Response
    {
        $this->bus->addHandler(CreateRateCommand::class, CreateRateCommandHandler::class);

        $this->bus->dispatch(
            new CreateRateCommand(
                $postId,
                $request->get('like')
            )
        );

        return Response::create(null, Response::HTTP_OK);
    }
}
