<?php

namespace App\Jobs\Clubs;

use App\Events\Club\ClubDeleted;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use App\Models\Club;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DeleteClub implements ShouldQueue
{
    use Queueable;
    use ResolvesJsonApiServer;

    /**
     * Create a new event instance.
     */
    public function __construct(protected Club $club)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // TODO: something custom logic...
        $clubId = $this->club->uuid;

        $this->club->delete();

        ClubDeleted::dispatch($clubId);
    }
}
