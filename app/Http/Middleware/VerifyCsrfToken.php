<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'api/*',          // Exclude all API routes (if using API routes that don't require CSRF)
        'payment/notify', // If you have a payment callback route that doesn't use CSRF protection
        'some/other/route',
    ];
}
