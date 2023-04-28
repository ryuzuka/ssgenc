<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Menu;
// use App\Models\Part;
use App\Models\User;
use App\Models\Access;
use App\Models\AccessHistory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AccessController;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AccessHistoryExport implements FromCollection,WithHeadings
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
            '메뉴아이디',
            '권한아이디',
            '이름',
            '아이디',
            '메뉴명',
            '권한상태',
            '승인권자',
            '사유',
            '등록아이디',
            '등록IP',
            '등록일자'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $from = Carbon::createFromFormat('Y-m-d', $this->from)->startOfDay();
        $to = Carbon::createFromFormat('Y-m-d', $this->to)->endOfDay();
        $find_key = null;

        if (isset($this->user_find_key) && $this->user_find_key != '00')
        {
            //user_id, name 검색 선택
            $find_key = $this->user_find_key;
        }

        $q = DB::table('accesshistories');
        $q = $q->select(
            'id',
            'menu_id',
            'access_id',
            DB::raw("'' as name"),
            DB::raw("'' as user_id"),
            DB::raw("'' as menu_nm"),
            'access_state',
            'approved_id',
            'reason',
            'created_id',
            'login_ip',
            'created_at'
        );

        if (isset($this->searchText))
        {
            $access = (new AccessController)->getAccessUserList($find_key, $this->searchText);
            if (isset($access))
            {
                $q = $q->whereIn('access_id', $access);
            }
        }

        $items = $q->whereBetween('created_at', [$from, $to])->orderBy('created_at','desc')->get();

        if (isset($items))
        {
            foreach($items as $item)
            {
                switch($item->access_state)
                {
                    case '1': $item->access_state = "신규추가"; break;
                    case '2': $item->access_state = "신규해제"; break;
                    case '3': $item->access_state = "변경추가"; break;
                    case '4': $item->access_state = "변경해제"; break;
                }

                $menu = Menu::find($item->menu_id);
                if(isset($menu))
                {
                    $item->{"menu_nm"} = $menu->menu_nm;
                }

                $access = Access::find($item->access_id);
                if (isset($access))
                {
                    $user = User::find($access->access_nm);
                    if (isset($user))
                    {
                        $item->{"user_id"} = $user->user_id;
                        $item->{"name"} = $user->name;
                    }
                }
            }
        }
        
        return $items;
    }
}
