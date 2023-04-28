<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Support\Carbon;
use Monolog\Logger;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\StreamHandler;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    // protected $commands = [
    //     'App\Console\Commands\DatabaseBackUp'
    // ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //리눅스 Cron 설정 명령어
        // crontab -l => 리스트 확인
        // crontab -e => 아래의 명령어 입력
        //* * * * * cd /var/www/ssgenc && php artisan schedule:run >> /dev/null 2>&1

        //임시폴더 클린
        $schedule->command('download:clean')->daily()->at('02:00');

        //OPT 테이블 클린.
        $schedule->command('otp:clean')->daily()->at('02:00');

        //DB 백업
        $schedule->command('database:backup')->daily()->at('03:00');

        //TODO : 문의/제보하기 보유기간 1년 후, Daily batch로 삭제 및 이력남기기
        // 배치 스크립트 작성하기
        $schedule->call(function () {

            $log = new Logger('Customers');
            $log->pushHandler(new StreamHandler(storage_path('logs/custom_histories.log'), Logger::INFO));

            //TODO 답변 등록일로 변경 요청
            $reply_sql = DB::table('customreplys')->whereYear('created_at', '<', date('Y')-1);
            $reply_count = $reply_sql->count();

            $cust_count = 0;
            $quest_count = 0;

            if ($reply_count > 0)
            {
                $items_reply = $reply_sql->get();
                if (isset($items_reply))
                {
                    foreach($items_reply as $item)
                    {
                        $item_quest = DB::table('customquestions')->find($item->id);
                        if (isset($item_quest))
                        {
                            $item_cust = DB::table('customers')->find($item_quest->cust_id);
                            if (isset($item_cust))
                            {
                                $item_cust->delete();
                                $cust_count++;
                            }

                            $item_quest->delete();
                            $quest_count++;
                        }
                    }

                    $reply_sql->delete();
                }
            }
            else
            {
                $reply_count = 0;
            }

            $log->info('<=========================== 로그 시작 ====================================>');
            $log->info('customers(고객정보) ==> 1년 보존기간 만료 데이터 '.$cust_count.' 건 삭제완료.');
            $log->info('customquestions(고객상담 정보) ==> 1년 보존기간 만료 데이터 '.$quest_count.' 건 삭제완료.');
            $log->info('customreplys(고객상담응대 정보) ==> 1년 보존기간 만료 데이터 '.$reply_count.' 건 삭제완료.');
            $log->info('<=========================== 로그 끝 ======================================>');

        })->daily()->at('03:00');

        //세션 처리 스케줄러
        // $schedule->call(function () {
        //     //세션에 접근이 안되므로 사용 불가
        //     (new AuthController)->checkSessionExpired();
        // })->everyMinute()->withoutOverlapping();


      /**
       * 150일 미접속 계정 삭제
       */
      $schedule->call(function () {
        $count = User::where('login_at', '<', Carbon::now()->subDays(150)->format('Y-m-d H:i:s'))->delete();
        $log = new Logger('Auth');
        $log->pushHandler(new StreamHandler(storage_path('logs/auth.log'), Logger::INFO));
        $log->info('<=========================== 로그 시작 ====================================>');
        $log->info('계정정보 ==> 150일 미접속 계정 '.$count.' 건 삭제완료.');
        $log->info('<=========================== 로그 끝 ======================================>');
      })->name('auth')->withoutOverlapping()
        //->everyMinute();
        ->daily()->at('04:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
