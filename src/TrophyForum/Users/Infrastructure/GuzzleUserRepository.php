<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Infrastructure;

use Exception;
use GuzzleHttp\Client;
use Shared\Domain\ValueObject\Country;
use Shared\Domain\ValueObject\Email;
use Shared\Domain\ValueObject\Password;
use TrophyForum\Users\Domain\User;
use TrophyForum\Users\Domain\UserId;
use TrophyForum\Users\Domain\UserRepository;

final class GuzzleUserRepository implements UserRepository
{
    public function login(Email $email, Password $password): ?User
    {
        $client = new Client();

        try {
            $response = $client->post(
                env('LOGIN_SERVICE'),
                [
                    'form_params' => [
                        'email'    => $email->value(),
                        'password' => $password->value(),
                    ],
                ]
            );
        } catch (Exception $e) {
            return null;
        }

        if (200 !== $response->getStatusCode()) {
            return null;
        }

        $response = json_decode((string) $response->getBody());

        return new User(
            new UserId($response->user_id),
            $email,
            $password
        );
    }

    public function add(Email $email, Password $password, Country $country): void
    {
        $client = new Client();

        $client->post(
            env('REGISTER_SERVICE'),
            [
                'form_params' => [
                    'email'    => $email->value(),
                    'password' => $password->value(),
                    'country'  => $country->value(),
                ],
            ]
        );
    }
}
