<?php

namespace Tests\Feature\Concerns;

trait UsesRelationships
{
    /**
     * Retrieve type resource.
     */
    public function relationships(): array
    {
        return $this->relationships;
    }
}
