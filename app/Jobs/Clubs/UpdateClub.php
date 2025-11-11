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
     * Update a new job instance.
     */
    public function __construct(protected Club $club, protected array $attributes)
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

        $club = $schema
            ->repository()
            ->update($this->club)
            ->store($this->attributes);

        ClubUpdated::dispatch($club);
    }
}
