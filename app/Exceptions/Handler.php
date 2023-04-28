<?php

namespace App\Exceptions;

use Throwable;
use App\Exceptions\AdminException;
use App\Exceptions\SystemException;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof AccessDeniedHttpException)
        {  
            return response()->view('main.'.App::getLocale().'.etc.et_02_01', [], 404);
        }
        else if ($e instanceof AdminException)
        {            
            return response()->view('main.'.App::getLocale().'.etc.et_01_01', [], 500);
        }
    
        return parent::render($request, $e);
    }

}
