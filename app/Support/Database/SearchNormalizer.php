<?php

namespace App\Support\Database;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SearchNormalizer
{
    /**
     * Map of accented characters to their ASCII equivalents.
     * Only lowercase characters are included since LOWER() is applied at the end.
     */
    private const REPLACEMENTS = [
        'á' => 'a', 'à' => 'a', 'ä' => 'a', 'â' => 'a', 'ã' => 'a', 'å' => 'a',
        'é' => 'e', 'è' => 'e', 'ë' => 'e', 'ê' => 'e',
        'í' => 'i', 'ì' => 'i', 'ï' => 'i', 'î' => 'i',
        'ó' => 'o', 'ò' => 'o', 'ö' => 'o', 'ô' => 'o', 'õ' => 'o',
        'ú' => 'u', 'ù' => 'u', 'ü' => 'u', 'û' => 'u',
        'ñ' => 'n', 'ç' => 'c',
    ];

    public static function column(string $column): string
    {
        $grammar = DB::connection()->getQueryGrammar();
        $expression = $grammar->wrap($column);
        $expression = "CONCAT('', {$expression})";
        $driver = DB::connection()->getDriverName();

        if ($driver === config('database.connections.sqlite.driver')) {
            return "LOWER({$expression})";
        }

        foreach (self::REPLACEMENTS as $from => $to) {
            $expression = sprintf(
                "REPLACE(%s, '%s', '%s')",
                $expression,
                str_replace("'", "''", $from),
                str_replace("'", "''", $to)
            );
        }

        return "LOWER({$expression})";
    }

    public static function value(?string $value): string
    {
        return Str::of($value ?? '')
            ->ascii()
            ->lower()
            ->toString();
    }
}
