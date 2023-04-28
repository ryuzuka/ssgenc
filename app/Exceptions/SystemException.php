<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\App;

class SystemException extends Exception
{
    // 아래와 같이 예외를 던지면 페이지표시가 됨.
    // throw new SystemException('system-error');
    // throw new SystemException('page-not-found');  
    //------------------------------------------
    public function render($request)
    {
        switch ( $this->getMessage() )
        {
            case 'system-error'   : return $this->response_view('et_01_01');
            case 'under-checking' : return $this->response_view('et_01_02');
            case 'page-not-found' : return $this->response_view('et_02_01');
            case 'in-preparation' : return $this->response_view('et_02_02');
        }
    }

    //------------------------------------------
    public function response_view($page)
    {
        $lang_path = 'main.'.App::getLocale().'.etc.';
        return response()->view($lang_path.$page);
    }
}
