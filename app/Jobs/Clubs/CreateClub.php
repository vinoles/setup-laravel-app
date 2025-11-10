<?php

namespace App\Jobs\Clubs;

use App\Events\Club\CreatedClub;
use App\JsonApi\V1\Clubs\ClubSchema;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateClub implements ShouldQueue
{
    use Queueable;
    use ResolvesJsonApiServer;

    /**
     * Create a new job instance.
     */
    public function __construct(protected array $attributes)
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
            ->create()
            ->store($this->attributes);

        CreatedClub::dispatch($club);
    }
}

