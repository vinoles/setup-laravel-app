<?php

use PhpCsFixer\Finder;

$finder = Finder::create();

dump('HOLA');

// Lista de directorios que quieres analizar
$dirs = [
    __DIR__ . '/app',
    __DIR__ . '/routes',
    __DIR__ . '/database',
    __DIR__ . '/tests',
    __DIR__ . '/config',
    __DIR__ . '/lang',
];

// Agregamos solo los directorios que existen
foreach ($dirs as $dir) {
    if (is_dir($dir)) {
        $finder->in($dir);
    }
}

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,                            // Base PSR12
        'array_syntax' => ['syntax' => 'short'],     // [] en vez de array()
        'trailing_comma_in_multiline' => true,      // Coma al final en arrays multilínea
        'single_quote' => true,                      // Strings con comillas simples
        'no_unused_imports' => true,                 // Quitar imports no usados
        'ordered_imports' => ['sort_algorithm' => 'alpha'], // Imports ordenados
        'binary_operator_spaces' => [
            'operators' => ['=' => 'align_single_space_minimal']
        ],
    ])
    ->setFinder($finder)
    ->setUsingCache(true);
