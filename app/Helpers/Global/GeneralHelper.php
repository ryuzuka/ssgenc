<?php

//[주의] 서비스 프로바이더 및 미들웨어에서 호출하는 함수는 여기 선언하면 안됨.
//로딩 우선순위에 심각한 영향을 준다. => globalFuntions.php를 사용할 것.

use Carbon\Carbon;

//php의 empty에서 '0' 조건만 제거한 것.
if (! function_exists('is_empty')) {

    function is_empty($variable)
    {
        return (empty($variable) && ($variable!=='0'));
    }
}

if (! function_exists('is_null')) {

    function is_null($variable)
    {
        return (!isset($variable) || ($variable===null));
    }
}

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'ssgenc');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     * @return Carbon
     *
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('my_test')) {

    function my_test()
    {
        // Null coalescing => 7.0 부터 지원된다. 아래의 표현과 동일.
        // $user = (!empty($variable)) ? $variable : '';
        // $user = isset($variable) ? $variable : '';
        // 
        // #1
        // if($variable ?? false) 
        //     echo '$variable is defined';
        // else 
        //     echo '$variable is not defined';

        // // Result: $variable is not defined
        // #2

        // $variable = null;

        // if($variable ?? false) 
        //     echo '$variable is not null';
        // else 
        //     echo '$variable is null';

        // // Result: $variable is null
        // #3

        // $variable = false;

        // if($variable ?? false) 
        //     echo '$variable is not false';
        // else 
        //     echo '$variable is false';

        // // Result: $variable is false
        // #4

        // $variable = '';

        // if($variable ?? false) 
        //     echo '$variable is not empty';
        // else 
        //     echo '$variable is empty';

        // // Result: $variable is empty
    }
}
