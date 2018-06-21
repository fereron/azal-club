<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

//    /** @test */
//    public function an_unauthenticated_user_cant_browse_threads()
//    {
//        $this->get('/threads');
////            ->assertRedirect(route('login'));
//    }

    /** @test */
    public function an_authenticated_user_can_browse_threads()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user)
            ->get('/threads')
            ->assertSee('Все обсуждения');
    }
}
