<?php

declare(strict_types=1);

it('uses the inertia v3 page discovery configuration', function (): void {
    $config = config('inertia');

    expect($config['pages']['paths'])->toBe([resource_path('js/pages')])
        ->and($config['pages']['extensions'])->toBe(['js', 'jsx', 'svelte', 'ts', 'tsx', 'vue'])
        ->and($config['testing']['ensure_pages_exist'])->toBeTrue()
        ->and($config['testing'])->not->toHaveKey('page_paths')
        ->and($config['testing'])->not->toHaveKey('page_extensions');
});
