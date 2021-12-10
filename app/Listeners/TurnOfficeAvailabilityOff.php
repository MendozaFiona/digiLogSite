<?php

namespace App\Listeners;

use App\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Office;
use Illuminate\Support\Facades\Auth;

class TurnOfficeAvailabilityOff
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
     * @param  \App\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $office = Office::find(Auth::user()->office_id);

        $office->status = 'offline';

        $office->save();
        
        return back()->with('success', 'Status Updated');
    }
}
