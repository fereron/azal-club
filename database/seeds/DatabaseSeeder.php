<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \App\User::truncate();
        \App\Profile::truncate();
        \App\Group::truncate();
        \App\GroupUser::truncate();

        $user = factory('App\User')->create([
            'email' => 'admin@a.a',
            'password' => bcrypt(123123),
            'is_confirmed' => true
        ]);

        factory('App\Profile')->create(['user_id' => $user->id]);

        $users = factory('App\User', 100)->create();

        $groups = factory('App\Group', 20)->create();

        $users->each(function ($user) {
            factory('App\Profile')->create(['user_id' => $user->id]);
        });

        $groups->each(function ($group) {
           factory('App\GroupUser', 5)->create(['group_id' => $group->id]);
        });

    }
}
