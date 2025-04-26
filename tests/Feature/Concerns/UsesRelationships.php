<?php

namespace Tests\Feature\Concerns;

trait UsesRelationships
{

    /**
    * Retrieve type resource.
    *
    * @return array
    */
    public function relationships(): array
    {
        return $this->relationships;
    }
}

