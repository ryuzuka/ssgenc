<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{

// // Store lang session
// $request->session()->put('lang', $lang);
// \Lang::setLocale($lang);
// // Reset language cache
// Cache::forget('lang.js');

    public function switchLang($lang)
    {
        Session::put('applocale', $lang);
        app()->setLocale($lang);
        Cache::forget('lang.js');

        return response()->json([
            'locale changed' => $lang
        ]);        
    }

    public function show()
    {
        $strings = Cache::rememberForever('lang.js', function () {
                // $lang = config('app.locale');
                // $lang = Session::get('applocale');
                $lang = app()->getLocale();
                $files = glob(resource_path('lang/' . $lang . '/*.php'));
                $strings = [];

                foreach ($files as $file)
                {
                    $name           = basename($file, '.php');
                    $strings[$name] = require $file;
                }

                return $strings;
            });

        header('Content-Type: text/javascript');
        echo('window.i18n = ' . json_encode($strings) . ';');
        exit();
    }
    
    public function getLang($locale)
    {
        App::setLocale($locale);
        // Cache::flush();
        Cache::forget('lang.js');

        $strings = Cache::rememberForever('lang.js', function () {
            $lang = App::getLocale(); //config('app.locale');
            // Log::debug('lang ====> ' . $lang);
    
            $files   = glob(resource_path('lang/' . $lang . '/*.php'));
            $strings = [];
    
            foreach ($files as $file) {
                $name           = basename($file, '.php');
                $strings[$name] = require $file;
            }
    
            return $strings;
        });
    
        header('Content-Type: text/javascript');
        echo('window.i18n = ' . json_encode($strings) . ';');
        exit();
    }
}
