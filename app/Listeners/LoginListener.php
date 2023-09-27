<?php

namespace App\Listeners;
use App\Models\HistoryLogin;
use App\Models\LoginHistory;
use Illuminate\Auth\Events\Authenticated;

use App\Events\LoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
    public function handle($event)
    {
       
        $user = $event->user;
       

        LoginHistory::create([
            'user_id'=>$user->id,
            'name'=>$user->email
        ]);

        Log::info('User authenticated: ' .
        $event->user->name.' at with '.
        $event->user->id.''.now());
    }
}
