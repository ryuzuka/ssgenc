<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Monolog\Logger;
use App\Models\User;
use App\Models\Access;
use App\Models\Logins;
use Illuminate\Http\Request;
use Monolog\Handler\StreamHandler;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    const MAX_FAIL_CNT  = 5;
    const MAX_DAY       = 90;

    private $login_ip;
    private $user_id;

    private $user;
    private $log;

    //-------------------------------------------
    public function __construct()
    {
        //미들웨어를 사용하지 말아야하는 매쏘드를 정의 한다.
        //login, register는 인증이 되지 않은 상태의 호출이기 때문
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);

        $this->log = new Logger('AuthController');
        $this->log->pushHandler(new StreamHandler(storage_path('logs/login.log'), Logger::DEBUG));
    }

    //-------------------------------------------
    public function login(Request $request)
    {
        $params = $request->only(['user_id', 'password']);

        // $this->log->debug('json change: params => '.json_encode($params));

        // if (config('app.env') == 'production')
        // {
        //     //운영버전
        //     $this->log->debug("production version");
        // }
        // else
        // {
        //     //개발버전
        //     $this->log->debug("development version.");
        // }

        // $ip = $this->get_client_ip();
        $ip = $request->getClientIp();
        $this->log->debug('client ip => '. $ip);

        $this->user = null;

        //$this->login_ip = $request->ip();
        $this->login_ip = $ip;
        // $log->debug('request->ip() => ' . $request->ip());

        //base64 포맷 체크
        if ( !$this->is_base64($params['user_id']) || !$this->is_base64($params['password']) )
        {
            return $this->response('E009');
        }

        $user_id = base64_decode($params['user_id']);
        $password = base64_decode($params['password']);
        
        $count = Access::where('access_nm', $user_id)->count();
        if($count == 0)
        {
            return $this->response('E010');
        }

        // $auth_state = Auth::attempt(['user_id' => $user_id, 'password' => $password]);
        // $this->log->debug('auth_state =====> '.$auth_state);

        $this->user_id = $user_id;

        if ( !empty($user_id) && !empty($password) )
        {
            $login_fail_cnt = 0;

            $this->user = User::find($user_id);
            if ( !empty($this->user) )
            {
                $flag = $this->user->hasSession();
                if (!$flag)
                {
                    //이 경우 접속이 되지 않도록 해야 함.
                    //TODO : 계속, 종료
                    //로직 정리 필요 함.
                    //세션 체크 전문을 분리해야 한다.
                    //즉, 로그인전 먼저 세션여부를 확인한다.
                    //여기서 이걸 체크하지 않도록 수정 필요.
                    $code = 'E011';
                    $this->saveLongins($code);
                    return $this->handle_error($code, __('auth.'.$code));
                }

                if ($this->user->useflag == 'N')
                {
                    return $this->response('E005');
                }

                //권한 만료 체크
                if ($this->isExpiredAuth($this->user->expired_at))
                {
                    return $this->response('E005');
                }

                $login_fail_cnt = $this->user->login_fail_cnt;

                //90일 동안 로그인 하지 않았을 경우, 비활성 화.
                if ( $this->isNoLoginSince90Days($this->user->login_at) )
                {
                    return $this->response('E004');
                }

                if ( $this->isFiveFailCnt($login_fail_cnt) )
                {
                    return $this->response('E005');
                }

                if ($this->user->password == $password)
                {
                    $token = session('_token');
                    $this->log->debug('session token => ' . $token);

                    $this->user->login_fail_cnt = 0;
                    $this->user->login_at = Carbon::now()->format('Y-m-d H:i:s');
                    $this->user->session_id = session()->getId();
                    $lastActivityTime = time();
                    Log::debug('lastActivityTime => '.$lastActivityTime);
                    $this->user->last_activity = $lastActivityTime;
                    $this->user->save();

                    //세션에 사용자아이디를 저장한다.
                    session()->put('user_id'    , $user_id);
                    session()->put('name'       , $this->user->name);
                    session()->put('login_ip'   , $this->login_ip);
                    session()->put('login_at'   , $this->user->login_at);
                    session()->put('last_activity', $lastActivityTime);

                    $code = '0000';
                    $this->saveLongins($code);

                    $url = RouteServiceProvider::HOME;

                    //패스워드 변경 90일 지났을 경우 팝업 처리되도록...
                    if ( $this->isChgPwdSince90Days($this->user->password_next) )
                    {
                        $url = '/pwdchg-alert';
                    }

                    //패스워드 초기화가 된 경우.
                    if ($this->user->password_reset_yn == 'Y')
                    {
                        $url = '/pwdchg';
                    }

                    return response()->json([
                        'code' => $code,
                        'message' => __('auth.'.$code),
                        'user' => $this->user,
                        'token' => $token,
                        //TODO url을 내려주고, 클라이언트가 이동하도록 한다.
                        'url' => $url
                    ]);        
                }
                else
                {
                    return $this->response('E001');
                }
            }
            else
            {
                return $this->response('E002');
            }
        }
        else
        {
            return $this->response('E003');
        }
    }

    //-------------------------------------------
    public function forcedLogin(Request $request)
    {
        $params = $request->only(['user_id']);
        if (isset($params))
        {
            //base64 포맷 체크
            if ( !$this->is_base64($params['user_id']) )
            {
                return $this->response('E009');
            }

            $user_id = base64_decode($params['user_id']);
            $user = User::find($user_id);
            if (isset($user))
            {
                Session::getHandler()->destroy($user->session_id);

                $user->session_id = '';
                $user->last_activity = 0;
                $user->save();
            }
        }

        return $this->login($request);
    }

    //-------------------------------------------
    public function logout(Request $request)
    {
        if ( session()->has('user_id') )
        {
            $user = User::find($this->getUserId());
            if (isset($user))
            {
                $user->session_id = '';
                $user->last_activity = 0;
                $user->save();
            }

            session()->pull('user_id');
        }

        return redirect('login');
    }

    //-------------------------------------------
    public function register(RegisterRequest $request)
    {
        $newUser = User::create([
            'user_id' => $request['user_id'],
            'password' => $request['password'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password_next' => now(),
            'password_reset_yn' => 'N',
            'login_at' => now(),        
            'useflag' => 'Y'
        ]);

        //방금 생성한 사용자로 로그인 한다.
        return $this->login($request);
    }

    //-------------------------------------------
    public function refresh() {
        // return $this->createNewToken(auth()->refresh());
    }

    //-------------------------------------------
    public function userProfile() {
        return response()->json(auth()->user());
    }

    //-------------------------------------------
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }  

    //-------------------------------------------
    function is_base64($s)
    {
        return (bool) preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s);
    }

    //-------------------------------------------
    private function isFiveFailCnt($count)
    {
        return ($count >= self::MAX_FAIL_CNT)? true : false;
    }
    
    //-------------------------------------------
    private function isExpiredAuth($expired_at)
    {
        $sd = Carbon::createFromFormat('Y-m-d', $expired_at);
        $ed = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        
        $result = date_diff($sd, $ed);
        return ($result->invert == 0 && $result->days >= 0)? true : false;
        // $this->log->debug('days => ' . $result->days);
        // return ($result->days >= 0)? true : false;
    }

    //-------------------------------------------
    private function isNoLoginSince90Days($login_at)
    {
        $sd = Carbon::createFromFormat('Y-m-d H:i:s', $login_at);
        $ed = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        
        $result = date_diff($sd, $ed);
        $this->log->debug('days => ' . $result->days);
        return ($result->days >= self::MAX_DAY)? true : false;
    }

    //-------------------------------------------
    private function isChgPwdSince90Days($password_next)
    {
        $sd = Carbon::createFromFormat('Y-m-d', $password_next);
        // $sd = Carbon::createFromFormat('Y-m-d', '2021-11-31');
        $ed = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());

        $result = $sd->lte($ed);
        if($result == false)
        {
            return false;
        } 
        
        // var_dump($result);
        
        $result = date_diff($sd, $ed);
        $this->log->debug('days since last change password => ' . $result->days);
        // $this->log->debug('days => ' . json_encode($days));
        return ($result->days >= self::MAX_DAY)? true : false;
    }

    //-------------------------------------------
    private function saveLongins($code)
    {
        Logins::create([
            'user_id' => $this->user_id,
            'login_ip' => $this->login_ip,
            'in_time' => now(),
            'out_time' => now(),
            'err_code' => $code,
            'err_msg' => __('auth.'.$code),
            'login_yn' => ($code=='0000')? 'Y' : 'N'
        ]);
    }

    //-------------------------------------------
    private function response($code)
    {    
        if( $code != '0000' )
        {
            if ($this->user == null)
            {
                $this->user = User::where('user_id', $this->user_id)->first();
            }

            //사용자 아이디가 없는 경우는 카운트 못 함.
            if ( !empty($this->user) )
            {
                $this->user->login_fail_cnt++;
                $this->user->save();
            }
            else
            {
                return $this->handle_error($code, __('auth.'.$code));
            }
        }

        $this->saveLongins($code);

        return $this->handle_error($code, __('auth.'.$code));
    }
}
