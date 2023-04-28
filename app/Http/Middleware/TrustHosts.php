<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array
     */
    public function hosts()
    {

        //운영 개발 구분 필요.
        if (config('app.env') == 'production')
        {
            return [
                getDomain(config('app.url')),
                getDomain(config('app.url_1')),
                getDomain(config('app.url_2')),
                getDomain(config('app.url_admin')),
            ];
        }
        else
        {
            return [
                $this->allSubdomainsOfApplicationUrl(),
            ];
        }

    }
}
