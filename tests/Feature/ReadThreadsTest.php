<?php

namespace Tests\Feature;

use Tests\TestCase;

class ReadThreadsTest extends TestCase
{

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /** @test */
    public function an_unauthenticated_user_can_not_browse_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/threads');
    }

    /** @test */
    public function an_authenticated_user_can_view_all_threads()
    {
        $this->signIn()
            ->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function an_authenticated_user_can_read_a_single_thread()
    {
        $this->signIn()
            ->get(route('thread', $this->thread->id))
            ->assertSee($this->thread->title);
    }


    /** @test */
    public function a_user_can_read_thread_replies()
    {
        $reply = create('App\Reply', ['thread_id' => $this->thread->id]);

        $this->signIn()
            ->get(route('thread', $this->thread->id))
            ->assertSee($reply->body);
    }


}
