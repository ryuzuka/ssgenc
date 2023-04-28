<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MainPopupController;
use App\Http\Controllers\MainNoticeController;
use App\Http\Controllers\ContributionController;

class MainController extends Controller
{
    public function __construct()  
    {
    }

    //-------------------------------------------
    public function index(Request $request)
    {
        //메인키 비주얼
        $keymsg = (new MessageController)->getItem();
        // // Log::debug('keymsg ==> '.$keymsg);

        // $keyimg = null;
        // if (isset($keymsg))
        // {
        //     $keyimg = (new FileController)->downloadList($keymsg->attach_id); 
        // }

        //메인 공지 관리
        $notices = (new MainNoticeController)->getItems();

        //메인 팝업 관리 (구현 예정)
        $popup = (new MainPopupController)->getItems();
        $popupimg = null;
        if (isset($popup))
        {
            $popupimg = (new FileController)->downloadList($popup->attach_id);
        }

        //정보 관리
        $info = Information::find(1);

        $contrib = (new ContributionController)->getItems();

        //사용하지 말것, 필요하면 추가할 것.
        // $project = (new ProjectController)->getItems();
        $project = null;

        return view('main.'.App::getLocale().'.index')->with([
            'notices' => $notices,
            'popup' => $popup,
            'popupimg' => $popupimg,
            'information' => isset($info)? $info : null,
            'keymsg' => $keymsg,
            // 'keyimg' => $keyimg,
            'contrib' => $contrib,
            'project' => $project
        ]);
    }
}
