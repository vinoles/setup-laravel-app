<?php

namespace App\Support\Database;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SearchNormalizer
{
    private const REPLACEMENTS = [
        'á' => 'a',
        'à' => 'a',
        'ä' => 'a',
        'â' => 'a',
        'ã' => 'a',
        'å' => 'a',
        'Á' => 'a',
        'À' => 'a',
        'Ä' => 'a',
        'Â' => 'a',
        'Ã' => 'a',
        'Å' => 'a',
        'é' => 'e',
        'è' => 'e',
        'ë' => 'e',
        'ê' => 'e',
        'É' => 'e',
        'È' => 'e',
        'Ë' => 'e',
        'Ê' => 'e',
        'í' => 'i',
        'ì' => 'i',
        'ï' => 'i',
        'î' => 'i',
        'Í' => 'i',
        'Ì' => 'i',
        'Ï' => 'i',
        'Î' => 'i',
        'ó' => 'o',
        'ò' => 'o',
        'ö' => 'o',
        'ô' => 'o',
        'õ' => 'o',
        'Ó' => 'o',
        'Ò' => 'o',
        'Ö' => 'o',
        'Ô' => 'o',
        'Õ' => 'o',
        'ú' => 'u',
        'ù' => 'u',
        'ü' => 'u',
        'û' => 'u',
        'Ú' => 'u',
        'Ù' => 'u',
        'Ü' => 'u',
        'Û' => 'u',
        'ñ' => 'n',
        'Ñ' => 'n',
        'ç' => 'c',
        'Ç' => 'c',
    ];

    public static function column(string $column): string
    {
        $grammar = DB::connection()->getQueryGrammar();
        $expression = $grammar->wrap($column);
        $expression = "CONCAT('', {$expression})";
        $driver = DB::connection()->getDriverName();

        if ($driver === 'sqlite') {
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
