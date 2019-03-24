<?php

namespace Tests\App\Http\Controllers\SubForums;

use Tests\TestCase;

class FindAllSubForumsControllerTest extends TestCase
{
    /**
     * A basic test: FindAllSubForumsController should return a 200 OK HTTP status.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api/v1/forum');

        $response->assertStatus(200);
    }
}
