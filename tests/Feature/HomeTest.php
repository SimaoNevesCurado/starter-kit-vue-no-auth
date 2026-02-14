<?php

declare(strict_types=1);

it('renders the public welcome page', function (): void {
    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertInertia(fn ($page) => $page->component('Welcome'));
});

it('does not expose authentication routes', function (string $method, string $uri): void {
    $response = $this->{$method}($uri);

    $response->assertNotFound();
})->with([
    ['get', '/login'],
    ['post', '/login'],
    ['get', '/register'],
    ['post', '/register'],
    ['post', '/logout'],
    ['get', '/dashboard'],
]);
