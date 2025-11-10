<?php

namespace App\Listeners\Club;

use App\Events\Club\CreatedClub;
use App\Events\Club\InformationValidatedClub;

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
    public function handle(CreatedClub $event): void
    {
        // TODO LOGIC VALIDATION INFORMATION CLUB

        InformationValidatedClub::dispatch($event->club);
    }
}
