<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //[주의] .env 파일 수정 후, 적용이 되려면 캐시를 삭제해야 한다.
        // php artisan config:cache 명령어 실행 => /bootstrap/cache/config.php 가 갱신 됨.
        $mode = config('app.env');

        // Log::debug('AuthCheck:: mode => '.$mode);
        if ($mode == 'production' || $mode == 'test')
        {
            $user_id = Session::get('user_id');
            $user = User::find($user_id);
            if (isset($user))
            {
                //세션이 로그인 후, 달라지기 때문에 이렇게하면 무한 재 로그인 한다.
                // Log::debug('AuthCheck:: user session id => '.$user->session_id);
                // Log::debug('AuthCheck:: user session timestamp => '.$user->last_activity);
                // Log::debug('AuthCheck:: session timestamp => '.session()->get('last_activity'));

                //로그인시 타임 스탬프로 비교해서 처리 함.
                if (session()->get('last_activity') != $user->last_activity)
                {
                    session()->pull('user_id');
                    return redirect('login');
                }
            }

            if ( !session()->has('user_id') )
            {
                return redirect('login')->with('fail', 'You have to login first.');
            }
        }

        return $next($request);
    }
}
