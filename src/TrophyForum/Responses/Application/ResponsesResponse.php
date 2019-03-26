<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application;

use TrophyForum\Responses\Domain\Responses;

final class ResponsesResponse
{
    public function __invoke(Responses $responses): array
    {
        $response = [];

        foreach ($responses as $respon) {
            $response[] = (new ResponseResponse())->__invoke($respon);
        }

        return $response;
    }
}
