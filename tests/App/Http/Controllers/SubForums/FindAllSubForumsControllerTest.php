<?php

namespace Tests\App\Http\Controllers\SubForums;

use App\Models\Author;
use App\Models\SubForum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FindAllSubForumsControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test: FindAllSubForumsController should return a 200 OK HTTP status.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $subForum = factory(SubForum::class)->make();

        $author = factory(Author::class)->make();
        $author->save();

        $subForum->author_id = $author->id;
        $subForum->save();

        $response = $this->get('/api/v1/forum');

        $response->assertStatus(200);
    }
}
