<?php

declare(strict_types=1);

it('renders welcome page', function (): void {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
});
