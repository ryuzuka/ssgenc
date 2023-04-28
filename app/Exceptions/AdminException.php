<?php

namespace App\Exceptions;

use Exception;

class AdminException extends Exception
{
    public function getStrCode($val)
    {
        return "E".strval($val);
    }

    public function render($request)
    {   
        return response()->json(["code" => $this->getStrCode($this->getCode()), "message" => $this->getMessage()]);
    }
}
