<?php

namespace Tests\Unit;

use Tests\TestCase;

class ThreadTest extends TestCase
{

    protected $thread;

    protected function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /** @test */
    public function it_has_a_author()
    {
        $this->assertInstanceOf('App\User', $this->thread->author);
    }

    /** @test */
    public function it_may_have_replies()
    {
        $this->assertInstanceOf('Illuminate\Support\Collection', $this->thread->replies);
    }

    /** @test */
    public function it_has_add_reply()
    {
        $this->thread->addReply([
            'body' => 'foo',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }


}
