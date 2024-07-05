<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\EnsureRoleAdmin;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        //Là je crée une alias pour mon middleware
        $middleware->alias([
            'admin' => EnsureRoleAdmin::class
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
