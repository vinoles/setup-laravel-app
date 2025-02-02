<?php

namespace Tests\Feature\Concerns;

trait HasFixtures
{
    /**
     * Load a fixture's content.
     *
     * @param  string  $name
     * @param  array  $replacements
     * @return string
     */
    protected function fixture(string $name, array $replacements = []): string
    {
        $content = file_get_contents(
            base_path("tests/Feature/Fixtures/{$name}.txt")
        );

        foreach ($replacements as $search => $replace) {
            $content = str_replace("{{ {$search} }}", $replace, $content);
        }

        return $content;
    }
}
