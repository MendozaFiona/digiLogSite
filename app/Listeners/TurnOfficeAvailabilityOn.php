<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Office;
use Illuminate\Support\Facades\Auth;

class TurnOfficeAvailabilityOn
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
     * @param  \App\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $office = Office::find(Auth::user()->office_id);

        $office->status = 'online';

        $office->save();
        
        return back()->with('success', 'Status Updated');
    }
}
