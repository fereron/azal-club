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

        $user = factory('App\User')->create([
            'email' => 'admin@a.a',
            'password' => bcrypt(123123)
        ]);

        factory('App\Profile')->create(['user_id' => $user->id]);


        factory('App\Profile', 150)->create();

    }
}
