<?php

namespace Tests\Feature;

use Tests\TestCase;

class ParticipateInThreadsTest extends TestCase
{
    /** @test */
    public function unauthenticated_user_can_not_add_reply()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post(route('reply.store', 1), []);
    }

    /** @test */
    public function an_authenticated_user_can_reply_thread()
    {
        $this->signIn();

        $thread = create('App\Thread');
        $reply = raw('App\Reply');

        $this->post(route('reply.store', $thread->id), $reply);

        $this->get(route('thread', $thread->id))
            ->assertSee($reply['body']);
    }
}
