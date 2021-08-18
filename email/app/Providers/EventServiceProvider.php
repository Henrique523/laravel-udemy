<?php

namespace App\Providers;

use App\Events\HomeEvent;
use App\Listeners\HomeEventListener;
use App\Listeners\LoginListener;
use App\Listeners\NewHomeListener;
use Illuminate\Auth\Events\Login;
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
        HomeEvent::class => [
            HomeEventListener::class,
            NewHomeListener::class,
        ],

        Login::class => [
            LoginListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
