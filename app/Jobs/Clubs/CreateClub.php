<?php

namespace App\Jobs\Clubs;

use App\Events\Club\ClubCreated;
use App\JsonApi\V1\Clubs\ClubSchema;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Throwable;

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
        try {
            $server = $this->resolveServer();

            $schema = new ClubSchema($server);

            $club = $schema
                ->repository()
                ->create()
                ->store($this->attributes);

            ClubCreated::dispatch($club);
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}
