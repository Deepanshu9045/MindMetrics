<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$runtimeDirectories = [
    '/tmp/bootstrap/cache',
    '/tmp/storage/framework/views',
];

foreach ($runtimeDirectories as $directory) {
    if (! is_dir($directory)) {
        @mkdir($directory, 0777, true);
    }
}

$runtimeDefaults = [
    'APP_CONFIG_CACHE' => '/tmp/bootstrap/cache/config.php',
    'APP_EVENTS_CACHE' => '/tmp/bootstrap/cache/events.php',
    'APP_PACKAGES_CACHE' => '/tmp/bootstrap/cache/packages.php',
    'APP_ROUTES_CACHE' => '/tmp/bootstrap/cache/routes-v7.php',
    'APP_SERVICES_CACHE' => '/tmp/bootstrap/cache/services.php',
    'VIEW_COMPILED_PATH' => '/tmp/storage/framework/views',
];

foreach ($runtimeDefaults as $key => $value) {
    if (getenv($key) === false || getenv($key) === '') {
        putenv("{$key}={$value}");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
