<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Session;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Log;

class SessionExpired
{
    protected $session;
    protected $timeout = 30*60;

    public function __construct(Store $session)
    {
        $this->session = $session;
        $this->timeout = 60*env('SESSION_LIFETIME');
    }

    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
