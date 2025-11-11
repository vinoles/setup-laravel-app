<?php

namespace App\Listeners\Club;

use App\Events\Club\ClubCreated;
use App\Events\Club\ClubInformationValidated;
use App\Events\Club\ClubUpdated;

class ClubInformationValidator
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
    public function handle(ClubCreated|ClubUpdated $event): void
    {
        // TODO LOGIC VALIDATION INFORMATION CLUB

        ClubInformationValidated::dispatch($event->club);
    }
}
