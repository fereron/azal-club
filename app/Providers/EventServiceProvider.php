<?php

namespace App\Providers;

use App\Group;
use App\Observers\GroupAvatarObserver;
use App\Observers\UserAvatarObserver;
use App\Observers\UserFullNameObserver;
use App\Observers\UserProfileObserver;
use App\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        User::observe(UserProfileObserver::class);
        User::observe(UserAvatarObserver::class);
        User::observe(UserFullNameObserver::class);
        Group::observe(GroupAvatarObserver::class);
    }
}
