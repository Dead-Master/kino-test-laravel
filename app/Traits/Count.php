<?php

namespace App\Traits;

use Auth;
use Carbon\Carbon;
use Event;

trait Count
{
    public function hit():void
    {
        Event::dispatch('action.api', [Auth::user(), Carbon::now()]);
    }
}
