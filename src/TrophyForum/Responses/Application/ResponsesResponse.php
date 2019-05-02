<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application;

use Doctrine\ORM\PersistentCollection;

final class ResponsesResponse
{
    public function __invoke(PersistentCollection $responses): array
    {
        $response = [];

        foreach ($responses as $respon) {
            $response[] = (new ResponseResponse())->__invoke($respon);
        }

        return $response;
    }
}
