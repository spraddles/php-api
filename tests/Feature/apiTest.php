<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class apiTest extends TestCase
{
    /**
     * Tests the 'list users' endpoint:
     * http://127.0.0.1:8000/api/users
     *
     * @return void
     */
    public function list_users()
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);

        // get more debugging info
        $response->dumpHeaders();
        $response->dumpSession();
        $response->dump();
    }

    /**
     * Tests the 'delete user' endpoint:
     * http://127.0.0.1:8000/api/users/delete/$id
     *
     * @return void
     */
    public function delete_user()
    {
        // userId 5 as an example
        $response = $this->get('/api/users/delete/5');
        $response->assertStatus(200);

        // get more debugging info
        $response->dumpHeaders();
        $response->dumpSession();
        $response->dump();
    }

    /**
     * Tests the 'get user events' endpoint:
     * http://127.0.0.1:8000/api/events
     *
     * @return void
     */
    public function get_events()
    {
        $response = $this->get('/api/events');
        $response->assertStatus(200);

        // get more debugging info
        $response->dumpHeaders();
        $response->dumpSession();
        $response->dump();
    }

    /**
     * Tests the 'get user events' endpoint:
     * http://127.0.0.1:8000/api/events/grouped
     *
     * @return void
     */
    public function grouped_events()
    {
        $response = $this->get('/api/events/grouped');
        $response->assertStatus(200);

        // get more debugging info
        $response->dumpHeaders();
        $response->dumpSession();
        $response->dump();
    }

}