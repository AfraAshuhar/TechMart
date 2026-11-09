<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // Redirect unauthenticated users
        $middleware->redirectGuestsTo(function ($request) {

            // If admin area → go to admin login
            // if ($request->is('admin') || $request->is('admin/*')) {
            //     return route('admin.login');
            // }
            // if ($request->is('admin/login')) {
            //     return null;
            // }
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
             }
            // Otherwise, do nothing (or user login later)
            return null;
        });

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
