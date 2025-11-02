<?php

namespace App\Observers;

use App\Models\Club;
use Illuminate\Support\Str;

class ClubObserver
{
    /**
     * Triggered before creating an club.
     *
     * @param  Club  $club
     * @return void
     */
    public function creating(Club $club): void
    {
        if ($club->missingUuid()) {
            $club->fill([
                'uuid' => Str::uuid(),
            ]);
        }
    }

    /**
     * Handle the Club "created" event.
     */
    public function created(Club $club): void
    {
        //
    }

    /**
     * Handle the Club "updated" event.
     */
    public function updated(Club $club): void
    {
        //
    }

    /**
     * Handle the Club "deleted" event.
     */
    public function deleted(Club $club): void
    {
        //
    }

    /**
     * Handle the Club "restored" event.
     */
    public function restored(Club $club): void
    {
        //
    }

    /**
     * Handle the Club "force deleted" event.
     */
    public function forceDeleted(Club $club): void
    {
        //
    }
}
