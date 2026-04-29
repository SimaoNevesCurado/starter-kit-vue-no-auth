<?php

declare(strict_types=1);

it('targets current Laravel 13 compatible backend packages for new installs', function (): void {
    $composer = json_decode(file_get_contents(base_path('composer.json')), true, flags: JSON_THROW_ON_ERROR);
    $package = json_decode(file_get_contents(base_path('package.json')), true, flags: JSON_THROW_ON_ERROR);

    expect($composer['require'])->toMatchArray([
        'inertiajs/inertia-laravel' => '^3.0.0-beta',
        'laravel/fortify' => '^1.36.1',
        'laravel/framework' => '^13.0',
        'laravel/wayfinder' => '^0.1.14',
        'nunomaduro/essentials' => '^1.2.0',
    ])
        ->and($composer['require-dev'])->toMatchArray([
            'driftingly/rector-laravel' => '^2.1.12',
            'larastan/larastan' => '^3.9.3',
            'laravel/boost' => '^2.3.4',
            'laravel/pint' => '^1.29.0',
            'pestphp/pest' => '^4.4.2',
            'pestphp/pest-plugin-laravel' => '4.x-dev',
        ])
        ->and($package['dependencies']['@inertiajs/vue3'])->toBe('^3.0.0-beta');
});
