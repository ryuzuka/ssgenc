<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notifiable;
use ESolution\DBEncryption\Traits\EncryptedAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

// use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use HasFactory, Notifiable, EncryptedAttribute;

    //@dkjung-issue 2021-12-07 : 컬럼명, 컬럼타입을 변경하려면, 여기서 오버라이딩한다.
    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'part_id',
        'access_id',
        'name',
        'email',
        'password',
        'password_next',
        'password_reset_yn',
        'login_at',
        'expired_at',
        'user_type',
        'created_id',
        'updated_id',
        'remark',
        'email_yn',
        'session_id',
        'last_activity',
        'useflag',
        'reason'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     * 여기서 캐스팅이 필요한 컬럼을 정의 한다.
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    //기존 DB 암호화 마이그레이션 명령어(기존 데이터를 암호화된 상태로 바꿔 줌).
    // php artisan encryptable:encryptModel 'App\Models\User'
    // php artisan encryptable:decryptModel 'App\Models\User'
    /**
     * The attributes that should be encrypted on save.
     *
     * @var array
     */
    protected $encryptable = [
        'name', 'email'
    ];

    //------------------------------------------------
    public function setPassword($value)
    {       
        $this->attributes['password'] = hash('sha256', $value);
    }

    //------------------------------------------------
    public function getPassword()
    {
        return $this->attributes['password'];
    }

    //------------------------------------------------
    //현재 사용자의 유효한 세션이 존재하는지 체크
    public function hasSession()
    {
        //세션 타임 체크 로직
        $users_flag = env('SESSION_USERS');
        if ($users_flag == true)
        {
            Log::debug('session multiful user allowed.');
            return true;
        }

        $timeout = 60 * env('SESSION_LIFETIME');

        $lastActivityTime = $this->attributes['last_activity'];
        if(time() - $lastActivityTime > $timeout)
        {
            Log::debug('session expired.');
            return true;
        }

        Log::debug('session activated.');
        return false;
    }

}
