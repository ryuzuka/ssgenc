<?php

use App\Models\Code;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('paginate/project', 'ProjectController@index');

//세션제어
Route::group([
    'middleware' => 'api',
    'prefix' => 'session'
], function(){
    Route::get('get'       , 'SessionController@accessSessionData');
    Route::get('set'       , 'SessionController@storeSessionData');
    Route::get('remove'    , 'SessionController@deleteSessionData');
});

//사용자 관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'user'
], function(){

    Route::post('pwdchg'        , 'UserController@PwdChg');
    Route::post('send-pwdgen'   , 'UserController@sendMailWithPwdGenHtml');
    Route::post('deletes'       , 'UserController@deletes');
    Route::post('delete'        , 'UserController@delete');
    Route::post('upload'        , 'UserController@upload');
    Route::post('user-checkid'  , 'UserController@checkUserId');
    Route::post('user-enable'   , 'UserController@enableUser');

});

//로그인
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function(){

    Route::get('login'     , 'AuthController@login');
    Route::post('login'    , 'AuthController@login');
    Route::post('register' , 'AuthController@register');
    Route::post('logout'   , 'AuthController@logout');;
    // Route::post('refresh'  , 'AuthController@refresh');
    Route::post('forcedLogin', 'AuthController@forcedLogin');

});

//메뉴관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'menu'
], function(){

    Route::post('store'     , 'MenuController@store');
    Route::post('deletes'   , 'MenuController@deletes');
    Route::post('delete'    , 'MenuController@delete');
    Route::post('upload'    , 'MenuController@upload');

});

//부서관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'part'
], function(){

    Route::post('store'     , 'PartController@store');
    Route::post('deletes'   , 'PartController@deletes');
    Route::post('delete'    , 'PartController@delete');
    Route::post('upload'    , 'PartController@upload');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'meeting'
], function(){

    Route::post('getContent', 'MeetingController@getContentList');
    Route::post('deletes'   , 'MeetingController@deletes');
    Route::post('delete'    , 'MeetingController@delete');
    Route::post('upload'    , 'MeetingController@upload');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'committee'
], function(){

    Route::post('getContent', 'CommitteeController@getContentList');
    Route::post('deletes'   , 'CommitteeController@deletes');
    Route::post('delete'    , 'CommitteeController@delete');
    Route::post('upload'    , 'CommitteeController@upload');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'posting'
], function(){

    Route::post('deletes'   , 'PostingController@deletes');
    Route::post('delete'    , 'PostingController@delete');
    Route::post('upload'    , 'PostingController@upload');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'esgposting'
], function(){

    Route::post('deletes'   , 'EsgpostingController@deletes');
    Route::post('delete'    , 'EsgpostingController@delete');
    Route::post('upload'    , 'EsgpostingController@upload');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'report'
], function(){

    Route::post('deletes'   , 'ReportController@deletes');
    Route::post('delete'    , 'ReportController@delete');
    Route::post('upload'    , 'ReportController@upload');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'award'
], function(){

    Route::get('getContentList' , 'AwardController@getContentList');
    Route::post('deletes'       , 'AwardController@deletes');
    Route::post('delete'        , 'AwardController@delete');
    Route::post('upload'        , 'AwardController@upload');
    Route::post('deleteAttach'  , 'AwardController@deleteAttach');
    Route::get ('loadmore'      , 'AwardController@loadMore');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'csr'
], function(){

    Route::post('store'         , 'ContributionController@store');
    Route::post('deletes'       , 'ContributionController@deletes');
    Route::post('delete'        , 'ContributionController@delete');
    Route::post('upload'        , 'ContributionController@upload');
    Route::post('deleteAttach'  , 'ContributionController@deleteAttach');
    Route::get ('loadmore'      , 'ContributionController@loadMore');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'duty'
], function(){

    Route::post('deletes'       , 'DutyController@deletes');
    Route::post('delete'        , 'DutyController@delete');
    Route::post('upload'        , 'DutyController@upload');
    Route::post('deleteAttach'  , 'DutyController@deleteAttach');
    Route::get ('loadmore'      , 'DutyController@loadMore');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'access'
], function(){

    Route::post('store' , 'AccessController@store');
    Route::post('delete', 'AccessController@delete');
    Route::post('upload', 'AccessController@upload');
    Route::post('store' , 'AccessController@insertAll');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'code'
], function(){
    
    Route::get('all', function(){
        $data = Code::select(['codegroup_id', 'code_id', 'code_nm'])->get();
        return response()->json($data);
    });

    Route::get('{codegroup_id}', function($codegroup_id){

        //쿼리 디버깅할때...
        // DB::enableQueryLog();

        $data = Code::where(['codegroup_id' => $codegroup_id])->get();
        // $data = Code::where(['code_id' => '01', 'codegroup_id' => $codegroup_id])->get();

        // dd(DB::getQueryLog());

        return response()->json($data);
    });
    Route::post('{codegroup_id}', function($codegroup_id){
        $data = Code::where(['codegroup_id' => $codegroup_id])->get();
        return response()->json($data);
    });
});

//프로젝트
Route::group([
    'middleware' => 'api',
    'prefix' => 'project'
], function(){

    Route::post('show'          , 'ProjectController@show');
    Route::post('store'         , 'ProjectController@store');
    Route::post('deletes'       , 'ProjectController@deletes');
    Route::post('delete'        , 'ProjectController@delete');
    Route::post('upload'        , 'ProjectController@upload');
    Route::post('deleteAttach'  , 'ProjectController@deleteAttach');

    Route::post('getcode'       , 'ProjectController@getGubunCd');
    Route::post('getcontent'    , 'ProjectController@getContentList');
    Route::get ('loadmore'      , 'ProjectController@loadMore');

});

//프로젝트 실적
Route::group([
    'middleware' => 'api',
    'prefix' => 'projectlist'
], function(){

    Route::post('show'      , 'ProjectListController@show');
    Route::post('store'     , 'ProjectListController@store');
    Route::post('deletes'   , 'ProjectListController@deletes');
    Route::post('delete'    , 'ProjectListController@delete');
    Route::post('upload'    , 'ProjectListController@upload');
    Route::post('getItems'  , 'ProjectListController@getItems');
});

//뉴스 공지관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'notice'
], function(){

    Route::post('show'          , 'NoticeController@show');
    Route::post('store'         , 'NoticeController@store');
    Route::post('deletes'       , 'NoticeController@deletes');
    Route::post('delete'        , 'NoticeController@delete');
    Route::post('upload'        , 'NoticeController@upload');
    Route::post('deleteAttach'  , 'NoticeController@deleteAttach');

});

//메시지관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'message'
], function(){

    Route::post('show'          , 'MessageController@show');
    Route::post('store'         , 'MessageController@store');
    Route::post('deletes'       , 'MessageController@deletes');
    Route::post('delete'        , 'MessageController@delete');
    Route::post('upload'        , 'MessageController@upload');
    Route::post('deleteAttach'  , 'MessageController@deleteAttach');

});

//메인공지관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'mainnotice'
], function(){

    Route::post('show'          , 'MainNoticeController@show');
    Route::post('store'         , 'MainNoticeController@store');
    Route::post('deletes'       , 'MainNoticeController@deletes');
    Route::post('delete'        , 'MainNoticeController@delete');
    Route::post('upload'        , 'MainNoticeController@upload');

});

//메인팝업관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'mainpopup'
], function(){

    Route::post('show'          , 'MainPopupController@show');
    Route::post('store'         , 'MainPopupController@store');
    Route::post('deletes'       , 'MainPopupController@deletes');
    Route::post('delete'        , 'MainPopupController@delete');
    Route::post('upload'        , 'MainPopupController@upload');
    Route::post('deleteAttach'  , 'MainPopupController@deleteAttach');

});

//메인정보관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'information'
], function(){

    Route::post('store' , 'InformationController@store');
    Route::post('delete', 'InformationController@delete');

});

//첨부파일관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'file'
], function(){

    Route::post('add'       , 'FileController@store');
    Route::post('modify'    , 'FileController@update');
    Route::post('delete'    , 'FileController@deleteOne');
    Route::post('deploy'    , 'FileController@uploadZip');
    Route::post('downloadList/{id}', function($id){
        return (new FileController)->downloadList($id);
    });

});

//고객상담/제보관리
Route::group([
    'middleware' => ['api', 'XSS'],
    'prefix' => 'custsvc'
], function(){

    Route::post('add'           , 'CustomQuestionController@store');
    Route::post('store'         , 'CustomQuestionController@store');
    Route::get('show'           , 'CustomQuestionController@show');
    Route::post('save'          , 'CustomQuestionController@update');
    Route::post('upload'        , 'CustomQuestionController@upload');
    Route::post('deletes'       , 'CustomQuestionController@deletes');
    Route::post('delete'        , 'CustomQuestionController@delete');
    Route::post('checkReceipt'  , 'CustomQuestionController@checkReceipt');
    Route::post('sendmail-regist', 'CustomQuestionController@sendMailRegist');
    Route::post('sendmail-change', 'CustomQuestionController@sendMailChange');

});

//고객상담/제보 답변관리
Route::group([
    'middleware' => ['api', 'XSS'],
    'prefix' => 'custrply'
], function(){

    Route::post('add'           , 'CustomReplyController@store');
    Route::post('store'         , 'CustomReplyController@store');
    Route::get('show'           , 'CustomReplyController@show');
    Route::post('deletes'       , 'CustomReplyController@deletes');
    Route::post('delete'        , 'CustomReplyController@delete');
    Route::post('upload'        , 'CustomReplyController@upload');
    Route::post('deleteAttach'  , 'CustomReplyController@deleteAttach');
    Route::post('sendmail-reply', 'CustomReplyController@sendMailReply');
    Route::post('downloadAttach', 'CustomReplyController@downloadAttach');

});

//채용공고
Route::group([
    'middleware' => 'api',
    'prefix' => 'employment'
], function(){

    Route::post('getItems'      , 'EmploymentController@getItems');

});

//메일발송
Route::group([
    'middleware' => 'api',
    'prefix' => 'mail'
], function(){

    Route::get('sendmail'       , 'MailController@sendmail');
    Route::post('sendmail'      , 'MailController@sendmail');
    Route::post('sendmailMulti' , 'MailController@sendmailMulti');

});

//로그관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'loginmenu'
], function(){

    Route::get('log-download'  , 'LoginmenuController@download');
    Route::post('log-download' , 'LoginmenuController@download');

});

//로그인 이력 관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'logins'
], function(){

    Route::get('log-download'  , 'LoginsController@download');
    Route::post('log-download' , 'LoginsController@download');

});

//메뉴권한 이력 관리
Route::group([
    'middleware' => 'api',
    'prefix' => 'accesshistory'
], function(){

    Route::get('log-download'  , 'AccessHistoryController@download');
    Route::post('log-download' , 'AccessHistoryController@download');

});
