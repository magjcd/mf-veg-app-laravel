<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

use \App\Repositories\Classes\{
    AuthClass
    };
use \App\Repositories\Interfaces\{
    AuthInterface
    };

    class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthClass::class);

        Response::macro('success', function ($data, $message, $status) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data,
            ], $status);
        });

        Response::macro('error', function ($message, $status) {
            return response()->json([
                'success' => false,
                'message' => $message,
            ], $status);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
