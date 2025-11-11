<?php

namespace App\Jobs\Clubs;

use App\Events\Club\ClubDeleted;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use App\Models\Club;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Throwable;

class DeleteClub implements ShouldQueue
{
    use Queueable;
    use ResolvesJsonApiServer;

    /**
     * Update a new job instance.
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
        try {
            // TODO: something custom logic...
            $clubId = $this->club->uuid;

            $this->club->delete();

            ClubDeleted::dispatch($clubId);
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}
