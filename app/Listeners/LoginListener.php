<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LoginEvent $event)
    {
        $time = Carbon::now()->toDateTimeString();
        $username = $event->username;
        $email = $event->email;

        DB::table('login_history')->insert([
            'name' => $username,
            'email' => $email,
            'created_at' => $time,
            'updated_at' => $time
        ]);
    }
}
