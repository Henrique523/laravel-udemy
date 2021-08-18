<?php

namespace App\Listeners;

use App\Mail\NovoAcesso;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $quando = now()->setTimezone('America/Sao_Paulo')->addMinutes(1);

        info('Logou!');
        info($event->user->name);
        info($event->user->email);

        Mail::to($event->user)
            // ->send(new NovoAcesso($event->user));
            ->queue(new NovoAcesso($event->user));
            // ->later($quando, new NovoAcesso($event->user));
    }
}
