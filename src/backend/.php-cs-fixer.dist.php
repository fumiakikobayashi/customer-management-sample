<?php declare(strict_types=1);

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(false)
    ->setRules([
                   '@PSR2' => true,
               ])
    ->setFinder(PhpCsFixer\Finder::create()
                    ->exclude('vendor')
                    ->in('./app')
                    ->in('./tests')
    );
