<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Tambahkan handler untuk redirect ketika belum login
        $exceptions->renderable(function (AuthenticationException $e, $request) {
            if (! $request->expectsJson()) {
                // Redirect ke halaman '/' jika belum login
                return redirect('/');
            }
        });
    })
    ->create();
