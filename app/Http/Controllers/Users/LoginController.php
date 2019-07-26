<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use TrophyForum\Users\Application\Login\LoginUserQuery;
use TrophyForum\Users\Application\Login\LoginUserQueryHandler;
use TrophyForum\Users\Domain\UserNotFound;

final class LoginController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $this->bus->addHandler(LoginUserQuery::class, LoginUserQueryHandler::class);

        try {
            return JsonResponse::create(
                $this->bus->dispatch(new LoginUserQuery($request->get('email'), $request->get('password')))
            );
        } catch (UserNotFound $exception) {
            return JsonResponse::create(['error' => $exception->getMessage()], 404);
        }
    }
}
