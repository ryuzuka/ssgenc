<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function accessSessionData(Request $request)
    {
        if($request->session()->has('user_id'))
            echo $request->session()->get('user_id');
        else
            echo 'No data in the session';
    }

    public function storeSessionData(Request $request)
    {
        $params = $request->only(['user_id']);
        $request->session()->put('user_id', $params['user_id']);
        echo "Data has been added to session";
    }

    public function deleteSessionData(Request $request)
    {
        $request->session()->forget('user_id');
        echo "Data has been removed from session.";
    }
}