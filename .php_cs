<?php

$finder = PhpCsFixer\Finder::create()
    ->notPath('vendor')
    ->in(__DIR__.'/public/typo3conf')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return PhpCsFixer\Config::create()
    ->setFinder($finder)
    ->setRiskyAllowed(false)
    ->setRules(
        [
            '@Symfony' => true,
            '@PSR2' => true,
            'array_syntax' => ['syntax' => 'short'],
            'braces' => [
                'allow_single_line_closure' => true,
                'position_after_anonymous_constructs' => 'same',
                'position_after_control_structures' => 'same',
                'position_after_functions_and_oop_constructs' => 'same',
            ],
        ]
    );
