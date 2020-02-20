<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use TrophyForum\Users\Application\Register\RegisterUserCommand;
use TrophyForum\Users\Application\Register\RegisterUserCommandHandler;

final class RegisterController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $this->bus->addHandler(RegisterUserCommand::class, RegisterUserCommandHandler::class);

        try {
            return JsonResponse::create(
                $this->bus->dispatch(
                    new RegisterUserCommand(
                        $request->get('name'),
                        $request->get('email'),
                        $request->get('password'),
                        $request->get('country')
                    )
                )
            );
        } catch (Exception $exception) {
            return JsonResponse::create(['error' => $exception->getMessage()], 400);
        }
    }
}
