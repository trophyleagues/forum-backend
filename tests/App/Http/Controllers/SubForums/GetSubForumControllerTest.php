<?php

namespace Tests\App\Http\Controllers\SubForums;

use App\Models\SubForum;
use Tests\TestCase;
use Tests\TrophyForum\SubForums\Domain\SubForumIdStub;
use Tests\TrophyForum\SubForums\Domain\SubForumStub;
use Tests\TrophyForum\SubForums\Infrastructure\InMemorySubForumRepository;

class GetSubForumControllerTest extends TestCase
{
    /**
     * A basic test: GetSubForumController should return a 200 OK HTTP status.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $subForum = factory(SubForum::class)->make();
        $subForum->save();

        $response = $this->get('/api/v1/forum/' . $subForum->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['id', 'name', 'created_at']);
    }

    /**
     * A basic test: GetSubForumController should return a 404 NOT FOUND HTTP status.
     *
     * @return void
     */
    public function testBasicFail()
    {
        $response = $this->get('/api/v1/forum/' . SubForumIdStub::random());

        $response->assertStatus(404);
        $response->assertJsonStructure(['message']);
    }
}
