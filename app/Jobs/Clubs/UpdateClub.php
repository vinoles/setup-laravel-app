<?php

namespace App\Jobs\Clubs;

use App\Events\Club\ClubUpdated;
use App\JsonApi\V1\Clubs\ClubSchema;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use App\Models\Club;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateClub implements ShouldQueue
{
    use Queueable;
    use ResolvesJsonApiServer;

    /**
     * Create a new event instance.
     */
    public function __construct(public Club $club, public array $attributes)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $server = $this->resolveServer();

        $schema = new ClubSchema($server);

        $schema
            ->repository()
            ->update($this->club)
            ->store($this->attributes);

        ClubUpdated::dispatch($this->club);
    }
}
