<?php

use App\Models\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\LoginmenuController;
use App\Http\Controllers\MainPopupController;
use App\Http\Controllers\EsgpostingController;
use App\Http\Controllers\MainNoticeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ProjectListController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\AccessHistoryController;
use App\Http\Controllers\CustomQuestionController;

// 
/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//-----------------------------------
//1.1.1. 로그인 (Users)
//-----------------------------------
Route::get('/admin', function (){
    return redirect('login');
});

Route::get('login', function(){
    return view('admin.login.login');
})->middleware('alreadyLoggedIn')->name('auth.login');

Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('pwdchg-alert', function(){
    return view('admin.login.pwd_chg_alert');
})->middleware('isLoggedIn')->name('auth.pwdchg.alert');

Route::get('pwdchg', function(Request $request){
    return (new UserController)->changePassword($request);
})->middleware('isLoggedIn')->name('auth.pwdchg');

Route::get('err-msg', function(){
    return view('admin.login.err_msg')->name('auth.err.msg');
});

Route::get('login-info-popup', [UserController::class, 'LoginInfoPopup'])
->middleware('isLoggedIn')->name('auth.login.info.popup');

//-----------------------------------
//1.2.1. 프로젝트 (projects)
//-----------------------------------
//[주의] prefix를 사용하면 리소스 접근이 안됨.

Route::group([
    'namespace' => 'project', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get(RouteServiceProvider::HOME, function(){
        return redirect('project');
    })->name('project');

    Route::get('project', function(Request $request){
        return (new ProjectController)->index($request);
    })->name('project.index');

    //프로젝트 목록
    Route::get('project-list', function(Request $request){
        return (new ProjectController)->getList($request);
    });
    Route::post('project-list', function(Request $request){
        return (new ProjectController)->getList($request);
    });

    //프로젝트 상세
    Route::get('project-detail', function(Request $request){
        return (new ProjectController)->getDetail($request);
    });
    Route::post('project-detail', function(Request $request){
        return (new ProjectController)->getDetail($request);
    });

});

//-----------------------------------
//1.2.2. 프로젝트 실적 관리
//-----------------------------------

Route::group([
    'namespace' => 'projectlist', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('projectlist', function(Request $request){
        return (new ProjectListController)->index($request);
    })->name('projectlist');

    //프로젝트 목록
    Route::get('projectlist-list', function(Request $request){
        return (new ProjectListController)->getList($request);
    });
    Route::post('projectlist-list', function(Request $request){
        return (new ProjectListController)->getList($request);
    });

    //프로젝트 상세
    Route::get('projectlist-detail', function(Request $request){
        return (new ProjectListController)->getDetail($request);
    });
    Route::post('projectlist-detail', function(Request $request){
        return (new ProjectListController)->getDetail($request);
    });

});

//-----------------------------------
//1.3.1. 게시판-이사회 진행사항 (Meetings)
//-----------------------------------
Route::get('board-meet-list', function(){
    return view('admin.board.meet_list');
})->name('boards.meet.list');

//-----------------------------------
//1.3.3. 뉴스&공지 / 영상관리 (notices)
//-----------------------------------
//[주의] prefix를 사용하면 리소스 접근이 안됨.
Route::group([
    'namespace' => 'notice', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('notice', function(Request $request){
        return (new NoticeController)->index($request);
    })->name('notice');

    //공지 목록
    Route::get('notice-list', function(Request $request){
        return (new NoticeController)->getList($request);
    });
    Route::post('notice-list', function(Request $request){
        return (new NoticeController)->getList($request);
    });

    //공지 상세
    Route::get('notice-detail', function(Request $request){
        return (new NoticeController)->getDetail($request);
    });
    Route::post('notice-detail', function(Request $request){
        return (new NoticeController)->getDetail($request);
    });

});

//-----------------------------------
//1.3.11. 고객상담 관리 (custom)
//-----------------------------------
//[주의] prefix를 사용하면 리소스 접근이 안됨.
Route::group([
    'namespace' => 'custom', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('custom', function(Request $request){
        return (new CustomQuestionController)->index($request);
    })->name('custom');

    Route::get('custom?type=01', function(Request $request){
        return (new CustomQuestionController)->index($request);
    })->name('custom?type=01');

    Route::get('custom?type=02', function(Request $request){
        return (new CustomQuestionController)->index($request);
    })->name('custom?type=02');

    //공지 목록
    Route::get('custom-list', function(Request $request){
        return (new CustomQuestionController)->getList($request);
    });
    Route::post('custom-list', function(Request $request){
        return (new CustomQuestionController)->getList($request);
    });

    //공지 상세
    Route::get('custom-detail', function(Request $request){
        return (new CustomQuestionController)->getDetail($request);
    });
    Route::post('custom-detail', function(Request $request){
        return (new CustomQuestionController)->getDetail($request);
    });

});

//-----------------------------------
//1.4.1. 메인 키비주얼/메세지 관리 (message)
//-----------------------------------

Route::group([
    'namespace' => 'message', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('message', function(Request $request){
        return (new MessageController)->index($request);
    })->name('message');

    //메세지 목록
    Route::get('message-list', function(Request $request){
        return (new MessageController)->getList($request);
    });
    Route::post('message-list', function(Request $request){
        return (new MessageController)->getList($request);
    });

    //메세지 상세
    Route::get('message-detail', function(Request $request){
        return (new MessageController)->getDetail($request);
    });
    Route::post('message-detail', function(Request $request){
        return (new MessageController)->getDetail($request);
    });

});

Route::group([
    'namespace' => 'mainnotice', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('mainnotice', function(Request $request){
        return (new MainNoticeController)->index($request);
    })->name('mainnotice');

    //메인공지 목록
    Route::get('mainnotice-list', function(Request $request){
        return (new MainNoticeController)->getList($request);
    });
    Route::post('mainnotice-list', function(Request $request){
        return (new MainNoticeController)->getList($request);
    });

    //메인공지 상세
    Route::get('mainnotice-detail', function(Request $request){
        return (new MainNoticeController)->getDetail($request);
    });
    Route::post('mainnotice-detail', function(Request $request){
        return (new MainNoticeController)->getDetail($request);
    });

});

Route::group([
    'namespace' => 'mainpopup', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('mainpopup', function(Request $request){
        return (new MainPopupController)->index($request);
    })->name('mainpopup');

    //메인팝업 목록
    Route::get('mainpopup-list', function(Request $request){
        return (new MainPopupController)->getList($request);
    });
    Route::post('mainpopup-list', function(Request $request){
        return (new MainPopupController)->getList($request);
    });

    //메인팝업 상세
    Route::get('mainpopup-detail', function(Request $request){
        return (new MainPopupController)->getDetail($request);
    });
    Route::post('mainpopup-detail', function(Request $request){
        return (new MainPopupController)->getDetail($request);
    });

});

Route::group([
    'namespace' => 'information', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('information', function(Request $request){
        return (new InformationController)->index($request);
    })->name('information');

});

//-----------------------------------
//1.5.1. 관리자 관리 (user)
//-----------------------------------

Route::group([
    'namespace' => 'user', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('user', function(Request $request){
        return (new UserController)->index($request);
    })->name('user');

    //user 목록
    Route::get('user-list', function(Request $request){
        return (new UserController)->getList($request);
    });
    Route::post('user-list', function(Request $request){
        return (new UserController)->getList($request);
    });

    //user 상세
    Route::get('user-detail', function(Request $request){
        return (new UserController)->getDetail($request);
    });
    Route::post('user-detail', function(Request $request){
        return (new UserController)->getDetail($request);
    });

});

//-----------------------------------
//1.5.1. 관리자 관리 (menu)
//-----------------------------------

Route::group([
    'namespace' => 'menu', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('menu', function(Request $request){
        return (new MenuController)->index($request);
    })->name('menu');

    //menu 목록
    Route::get('menu-list', function(Request $request){
        return (new MenuController)->getList($request);
    });
    Route::post('menu-list', function(Request $request){
        return (new MenuController)->getList($request);
    });

    //menu 상세
    Route::get('menu-detail', function(Request $request){
        return (new MenuController)->getDetail($request);
    });
    Route::post('menu-detail', function(Request $request){
        return (new MenuController)->getDetail($request);
    });

});

//-----------------------------------
//1.5.2. 로그 관리 (loginmenu)
//-----------------------------------

Route::group([
    'namespace' => 'loginmenu', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('loginmenu', function(Request $request){
        return (new LoginmenuController)->index($request);
    })->name('loginmenu');

    //loginmenu 목록
    Route::get('loginmenu-list', function(Request $request){
        return (new LoginmenuController)->getList($request);
    });
    Route::post('loginmenu-list', function(Request $request){
        return (new LoginmenuController)->getList($request);
    });
    
});

//-----------------------------------
Route::group([
    'namespace' => 'logins', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('logins', function(Request $request){
        return (new LoginsController)->index($request);
    })->name('logins');

    //logins 목록
    Route::get('logins-list', function(Request $request){
        return (new LoginsController)->getList($request);
    });
    Route::post('logins-list', function(Request $request){
        return (new LoginsController)->getList($request);
    });

});

//-----------------------------------
Route::group([
    'namespace' => 'accesshistory', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('accesshistory', function(Request $request){
        return (new AccessHistoryController)->index($request);
    })->name('accesshistory');

    //accesshistory 목록
    Route::get('accesshistory-list', function(Request $request){
        return (new AccessHistoryController)->getList($request);
    });
    Route::post('accesshistory-list', function(Request $request){
        return (new AccessHistoryController)->getList($request);
    });

});

//-----------------------------------
//1.5.1. 관리자 관리 (part)
//-----------------------------------

Route::group([
    'namespace' => 'part', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('part', function(Request $request){
        return (new PartController)->index($request);
    })->name('part');

    //part 목록
    Route::get('part-list', function(Request $request){
        return (new PartController)->getList($request);
    });
    Route::post('part-list', function(Request $request){
        return (new PartController)->getList($request);
    });

    //part 상세
    Route::get('part-detail', function(Request $request){
        return (new PartController)->getDetail($request);
    });
    Route::post('part-detail', function(Request $request){
        return (new PartController)->getDetail($request);
    });

});

//-----------------------------------
//1.3.1. 이사회 진행 관리 (meeting)
//-----------------------------------

Route::group([
    'namespace' => 'meeting', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('meeting', function(Request $request){
        return (new MeetingController)->index($request);
    })->name('meeting');

    //meeting 목록
    Route::get('meeting-list', function(Request $request){
        return (new MeetingController)->getList($request);
    });
    Route::post('meeting-list', function(Request $request){
        return (new MeetingController)->getList($request);
    });

    //meeting 상세
    Route::get('meeting-detail', function(Request $request){
        return (new MeetingController)->getDetail($request);
    });
    Route::post('meeting-detail', function(Request $request){
        return (new MeetingController)->getDetail($request);
    });

});

//-----------------------------------
//1.3.2. 위원회 진행 관리 (committee)
//-----------------------------------

Route::group([
    'namespace' => 'committee', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('committee', function(Request $request){
        return (new CommitteeController)->index($request);
    })->name('committee');

    //committee 목록
    Route::get('committee-list', function(Request $request){
        return (new CommitteeController)->getList($request);
    });
    Route::post('committee-list', function(Request $request){
        return (new CommitteeController)->getList($request);
    });

    //committee 상세
    Route::get('committee-detail', function(Request $request){
        return (new CommitteeController)->getDetail($request);
    });
    Route::post('committee-detail', function(Request $request){
        return (new CommitteeController)->getDetail($request);
    });

});

//-----------------------------------
//1.3.4. 실적보고서 관리 (report)
//-----------------------------------

Route::group([
    'namespace' => 'report', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('report', function(Request $request){
        return (new ReportController)->index($request);
    })->name('report');

    //report 목록
    Route::get('report-list', function(Request $request){
        return (new ReportController)->getList($request);
    });
    Route::post('report-list', function(Request $request){
        return (new ReportController)->getList($request);
    });

    //report 상세
    Route::get('report-detail', function(Request $request){
        return (new ReportController)->getDetail($request);
    });
    Route::post('report-detail', function(Request $request){
        return (new ReportController)->getDetail($request);
    });

});

//-----------------------------------
//1.3.5 공시 관리 (posting)
//-----------------------------------

Route::group([
    'namespace' => 'posting', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('posting', function(Request $request){
        return (new PostingController)->index($request);
    })->name('posting');

    //posting 목록
    Route::get('posting-list', function(Request $request){
        return (new PostingController)->getList($request);
    });
    Route::post('posting-list', function(Request $request){
        return (new PostingController)->getList($request);
    });

    //posting 상세
    Route::get('posting-detail', function(Request $request){
        return (new PostingController)->getDetail($request);
    });
    Route::post('posting-detail', function(Request $request){
        return (new PostingController)->getDetail($request);
    });

});

//-----------------------------------
//1.3.6 ESG 공시 관리 (esgposting)
//-----------------------------------

Route::group([
    'namespace' => 'esgposting', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('esgposting', function(Request $request){
        return (new EsgpostingController)->index($request);
    })->name('esgposting');

    //esgposting 목록
    Route::get('esgposting-list', function(Request $request){
        return (new EsgpostingController)->getList($request);
    });
    Route::post('esgposting-list', function(Request $request){
        return (new EsgpostingController)->getList($request);
    });

    //esgposting 상세
    Route::get('esgposting-detail', function(Request $request){
        return (new EsgpostingController)->getDetail($request);
    });
    Route::post('esgposting-detail', function(Request $request){
        return (new EsgpostingController)->getDetail($request);
    });

});

//-----------------------------------
//1.3.7. 수상실적 관리 (award)
//-----------------------------------

Route::group([
    'namespace' => 'award', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('award', function(Request $request){
        return (new AwardController)->index($request);
    })->name('award');

    //award 목록
    Route::get('award-list', function(Request $request){
        return (new AwardController)->getList($request);
    });
    Route::post('award-list', function(Request $request){
        return (new AwardController)->getList($request);
    });

    //award 상세
    Route::get('award-detail', function(Request $request){
        return (new AwardController)->getDetail($request);
    });
    Route::post('award-detail', function(Request $request){
        return (new AwardController)->getDetail($request);
    });

});

//-----------------------------------
//1.3.8. 사회공헌 관리 (csr)
//-----------------------------------

Route::group([
    'namespace' => 'csr', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('csr', function(Request $request){
        return (new ContributionController)->index($request);
    })->name('csr');

    //csr 목록
    Route::get('csr-list', function(Request $request){
        return (new ContributionController)->getList($request);
    });
    Route::post('csr-list', function(Request $request){
        return (new ContributionController)->getList($request);
    });

    //csr 상세
    Route::get('csr-detail', function(Request $request){
        return (new ContributionController)->getDetail($request);
    });
    Route::post('csr-detail', function(Request $request){
        return (new ContributionController)->getDetail($request);
    });

});

//-----------------------------------
//1.3.9. 직무소개 관리 (duty)
//-----------------------------------

Route::group([
    'namespace' => 'duty', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('duty', function(Request $request){
        return (new DutyController)->index($request);
    })->name('duty');

    //duty 목록
    Route::get('duty-list', function(Request $request){
        return (new DutyController)->getList($request);
    });
    Route::post('duty-list', function(Request $request){
        return (new DutyController)->getList($request);
    });

    //duty 상세
    Route::get('duty-detail', function(Request $request){
        return (new DutyController)->getDetail($request);
    });
    Route::post('duty-detail', function(Request $request){
        return (new DutyController)->getDetail($request);
    });

});

Route::group([
    'namespace' => 'admin', 
    'middleware' => 'isLoggedIn'
    ], function() {

    Route::get('deploy', function(Request $request){
        return (new UserController)->Deploy($request);
    });

});

//-----------------------------------
//공통. 언어 처리.
//-----------------------------------
Route::get('showLocale', function(){
    return response()->json([
        'locale' => app()->getLocale()
    ]);
})->name('lang.show.locale');

Route::get('js/lang-{locale}.js'   , 'LanguageController@getLang');
Route::get('chglang-{lang}'        , ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang'])->name('lang.change');
Route::get('js/lang.js'            , 'LanguageController@show')->name('lang.show');
