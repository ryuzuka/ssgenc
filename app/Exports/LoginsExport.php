<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Part;
use App\Models\User;
use App\Models\Logins;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class LoginsExport implements FromCollection,WithHeadings
{
    use Exportable;

    protected $from;
    protected $to;
    protected $user_find_key;
    protected $searchText;

    function __construct($from, $to, $user_find_key, $searchText)
    {
        $this->from = $from;
        $this->to = $to;
        $this->user_find_key = $user_find_key;
        $this->searchText = $searchText;
    }

    public function headings():array{
        return[
            '번호',
            '이름',
            '아이디',
            '소속',
            '오류코드',
            '오류메시지',
            '로그인상태',
            '접속IP',
            '로그인일시'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $sd = Carbon::now()->subMonth(3)->startOfDay();
        // $ed = Carbon::now()->endOfDay();

        // $sd_str = $sd->format('Y-m-d');
        // $ed_str = $ed->format('Y-m-d');

        $from = Carbon::createFromFormat('Y-m-d', $this->from)->startOfDay();
        $to = Carbon::createFromFormat('Y-m-d', $this->to)->endOfDay();
        $find_key = null;

        if (isset($this->user_find_key) && $this->user_find_key != '00')
        {
            //user_id, name 검색 선택
            $find_key = $this->user_find_key;
        }

        $q = DB::table('logins');
        $q = $q->select(
            'login_id',
            DB::raw("'' as name"),
            'user_id',
            DB::raw("'' as part_nm"),
            'err_code',
            'err_msg',
            'login_yn',
            'login_ip',
            'in_time as login_at'
        );        

        if (isset($this->searchText))
        {
            $users = null;

            if (isset($find_key))
            {
                //아이디(01), 사용자명(02)
                if ($find_key == '01')
                {
                    //검색 키워드의 사용자 아이디 또는 이름을 like로 찾아서, 권한키를 가지고 온다음 검색해야 함.
                    $users = User::where('user_id', 'like', '%'.$this->searchText.'%')
                            ->where('useflag', 'Y')->select('user_id')->get();
                }
                else
                {
                    $users = User::where('name', 'like', '%'.$this->searchText.'%')
                            ->where('useflag', 'Y')->select('user_id')->get();
                }
            }

            if (isset($users))
            {
                $q = $q->whereIn('user_id', $users);
            }
        }

        $items = $q->whereBetween('created_at', [$from, $to])->orderBy('created_at','desc')->get();

        foreach($items as $item)
        {
            if (isset($item))
            {
                $user = User::find($item->user_id);
                if (isset($user))
                {
                    $item->name = $user->name;
                    $part = Part::find($user->part_id);
                    if(isset($part))
                    {
                        $item->part_nm = $part->part_nm;
                    }
                }

                if($item->login_yn=='Y')
                {
                    $item->login_yn = '정상';
                }
                else
                {
                    $item->login_yn = '실패';
                }
            }
        }

        return $items;
    }
}
