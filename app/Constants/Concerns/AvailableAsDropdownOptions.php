<?php

namespace App\Constants\Concerns;

use Illuminate\Support\Collection;

trait AvailableAsDropdownOptions
{
    /**
     * Retrieve the options for a select field.
     *
     * @return Collection
     */
    public static function asDropdownOptions(): Collection
    {
        return collect(static::cases())->map(static fn ($option) => [
            'label' => $option->value,
            'value' => $option->value,
        ]);
    }

    /**
     * Retrieve the options for a select field admin.
     *
     * @return Collection
     */
    public static function asAdminDropdownOptions($resource, $option): array
    {
        $elements = static::cases();

        $options = [];

        foreach ($elements as $element) {
            $options[$element->value] = __("admin.{$resource}.{$option}.{$element->value}");
        }

        return $options;
    }

    /**
     * Retrieve the options for a select field.
     *
     * @return array
     */
    public static function asValues(): array
    {
        return collect(static::cases())->map(
            static fn ($option) =>
            $option->value,
        )->toArray();
    }
}
