<?php

use Illuminate\Database\Seeder;

class ThreadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Thread::truncate();
        App\Reply::truncate();
        $threads = factory('App\Thread', 2)->create();

        $threads->each(function ($thread) {
           factory('App\Reply', 5)->create(['thread_id' => $thread->id]);
        });
    }
}
