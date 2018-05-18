<?php

namespace App\Observers;

use App\User;
use Faker\Factory;

class UserProfileObserver
{

    public function created(User $user)
    {
//        $faker = Factory::create();
//
//        $user->profile()->create([
//            'phone_number' => $faker->phoneNumber,
//            'address' => $faker->address,
//            'about' => $faker->text(200),
//        ]);

        $user->profile()->create();
    }

}