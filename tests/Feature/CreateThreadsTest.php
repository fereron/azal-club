<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateThreadsTest extends TestCase
{

    /** @test */
    public function an_authenticated_user_can_create_forum_thread()
    {
        $this->signIn();

        $thread = raw('App\Thread');

        $response = $this->post(route('thread.store'), $thread);

        $this->get($response->headers->get('location'))
            ->assertSee($thread['title'])
            ->assertSee($thread['body']);
    }
}
