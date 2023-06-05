<?php

use App\Models\Project;
// use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\EsgpostingController;
use App\Http\Controllers\ProjectListController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\CustomQuestionController;

//
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//메인 페이지 호출
Route::get('/', function (Request $request){
    return (new MainController)->index($request);
});

//오류 페이지
Route::get('/system-error', function (){
    return view('main.'.App::getLocale().'.etc.et_01_01');
});
//시스템 점검
Route::get('/under-checking', function (){
    return view('main.'.App::getLocale().'.etc.et_01_02');
});
//페이지 없음
Route::get('/page-not-found', function (){
    return view('main.'.App::getLocale().'.etc.et_02_01');
});
//준비중
Route::get('/in-preparation', function (){
    return view('main.'.App::getLocale().'.etc.et_02_02');
});
//오류 페이지
Route::get('/auth-error', function (){
    return view('main.'.App::getLocale().'.etc.authfail');
});

//Company Information
Route::get('ceo-message', function (){
    return view('main.'.App::getLocale().'.company.cp_01_01');
});
Route::get('vision', function (){
    return view('main.'.App::getLocale().'.company.cp_01_02');
});
Route::get('timeline', function (){
    return view('main.'.App::getLocale().'.company.cp_01_04');
});
Route::get('future-growth', function (){
    return view('main.'.App::getLocale().'.company.cp_01_05');
});
Route::get('contact-us', function (){
    return view('main.'.App::getLocale().'.company.cp_01_06');
});

// Business Areas Project
Route::get('main-project-list', function (Request $request){
    return (new ProjectListController)->getResultList($request);
});
Route::get('main-project-content', function (Request $request){
    return (new ProjectController)->getContentList($request);
});
// 상세
Route::get('main-project-detail', function (Request $request){
    return (new ProjectController)->getContentDetail($request);
});

Route::get('housing-facility', function (Request $request){
    $request['biz_area'] = '02';
    return (new ProjectController)->getContentList($request);
});
Route::get('construction-facility', function (Request $request){
    $request['biz_area'] = '03';
    return (new ProjectController)->getContentList($request);
});
Route::get('civil-engineering-facility', function (Request $request){
    $request['biz_area'] = '04';
    return (new ProjectController)->getContentList($request);
});
Route::get('leisure-business', function (Request $request){
    $request['biz_area'] = '05';
    return (new ProjectController)->getContentList($request);
});

// Information
Route::get('awards', function (Request $request){
    $request['gubun'] = '01';
    return (new AwardController)->getContentList($request);
});
Route::get('certifications', function (Request $request){
    $request['gubun'] = '02';
    return (new AwardController)->getContentList($request);
});

Route::get('ci-bi', function (){
    return view('main.'.App::getLocale().'.information.if_03');
});
Route::get('recruit-process', function (){
    return view('main.'.App::getLocale().'.information.if_05_01');
});
Route::get('personnel-system', function (){
    return view('main.'.App::getLocale().'.information.if_05_02');
});
Route::get('job-introduction', function (Request $request){
    return (new DutyController)->getContentList($request);
});
Route::get('job-introduction-dtl', function (Request $request){
    return (new DutyController)->getContentDetail($request);
});
Route::get('job-posting', function (Request $request){
    return (new EmploymentController)->index($request);
});
Route::get('job-posting-dtl', function (){
    return view('main.'.App::getLocale().'.information.if_05_04_dt');
});

//지배구조
Route::get('governance', function (Request $request){
    return view('main.'.App::getLocale().'.information.governance_shc');
});
Route::get('governance-shc', function (Request $request){
    return view('main.'.App::getLocale().'.information.governance_shc');
});

//외부감사
Route::get('governance-exaudit', function (Request $request){
    return view('main.'.App::getLocale().'.information.governance_exaudit');
});

//지배구조헌장(법인정관)
Route::get('governance-aoi', function (Request $request){
    return view('main.'.App::getLocale().'.information.governance_aoi');
});

//이사회
Route::get('governance-meet', function (Request $request){
    //기존버전
    //return (new MeetingController)->getContentAll($request);

    //새버전
    return (new MeetingController)->getContent($request);
});

//ESG 정보공시
Route::get('governance-esg', function (Request $request){
    return (new EsgpostingController)->getContentList($request);
});
Route::get('governance-esg-dtl', function (Request $request){
    return (new EsgpostingController)->getContentDetail($request);
});

Route::get('governance-dtl', function (){
    return view('main.'.App::getLocale().'.information.if_04_01_01_05_dt');
});
Route::get('articles-inc', function (){
    return view('main.'.App::getLocale().'.information.if_04_01_02');
});
Route::get('sales-status', function (){
    return view('main.'.App::getLocale().'.information.if_04_02_01');
});
Route::get('financial-status', function (){
    return view('main.'.App::getLocale().'.information.if_04_02_02');
});
Route::get('income-status', function (){
    return view('main.'.App::getLocale().'.information.if_04_02_03');
});
Route::get('credit-rating', function (){
    return view('main.'.App::getLocale().'.information.if_04_02_04_01');
});
Route::get('stock-related', function (){
    return view('main.'.App::getLocale().'.information.if_04_03_01');
});

//실적보고서
Route::get('performance-report', function (Request $request){
    return (new ReportController)->getContentList($request);
});
Route::get('stock-dividend', function (){
    return view('main.'.App::getLocale().'.information.if_04_03_03');
});
Route::get('ir-schedule', function (){
    return view('main.'.App::getLocale().'.information.if_04_03_04');
});
Route::get('ir-inquiry', function (){
    return view('main.'.App::getLocale().'.information.if_04_03_05');
});

//공시정보 테스트
Route::get('disclosure-info-test', function (){
    return view('main.'.App::getLocale().'.information.if_04_04_01');
});

//공시정보-DART 공시
Route::get('disclosure-info', function (){
    return view('main.'.App::getLocale().'.information.disclosure_info_dart');
});
Route::get('disclosure-info-dart', function (){
    return view('main.'.App::getLocale().'.information.disclosure_info_dart');
});

//공시정보-결산공시
Route::get('disclosure-info-sd', function (Request $request){
    $request['gubun'] = '01';
    return (new PostingController)->getContentList($request);
});

//공시정보-주주총회공시
Route::get('disclosure-info-gm', function (Request $request){
    $request['gubun'] = '02';
    return (new PostingController)->getContentList($request);
});

//csr : 지속가능경영
Route::get('csr-overview', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_01');
});
Route::get('transparent-management', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_02');
});

//사회공헌
Route::get('social-contribution', function (Request $request){
    return (new ContributionController)->getContentList($request);
});
Route::get('social-contribution-dtl', function (Request $request){
    return (new ContributionController)->getContentDetail($request);
});

Route::get('quality-management', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_04');
});
Route::get('safely-health-management', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_05');
});
Route::get('eco-friendly-management', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_06_01');
});
Route::get('shared-growth', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_07_01');
});
Route::get('four-major-action-items', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_07_02_01');
});
Route::get('business-partner-portal', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_07_03');
});
Route::get('search-inquiry-no', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_08_02_pu');
});
Route::get('search-result', function (Request $request){
    return (new CustomQuestionController)->show($request);
});
Route::get('ombudsman', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_09');
});

//고객제보
Route::get('write-a-report', function (){
    return (new CustomQuestionController)->get('02');
});
Route::get('customer-service-center', function (){
    return view('main.'.App::getLocale().'.csr.cr_01_08');
});
Route::get('search-inquiry', function (Request $request){
    return (new CustomQuestionController)->searchInquery($request);
});

//footer information
Route::get('privacy-policy', function (){
    return view('main.'.App::getLocale().'.footer.ft_02');
});
Route::get('privacy-policy-230117', function (){
  return view('main.'.App::getLocale().'.footer.ft_02_230117');
});
Route::get('privacy-policy-220831', function (){
  return view('main.'.App::getLocale().'.footer.ft_02_220831');
});
Route::get('privacy-policy-220328', function (){
  return view('main.'.App::getLocale().'.footer.ft_02_220328');
});
Route::get('video-policy', function (){
    return view('main.'.App::getLocale().'.footer.ft_03');
});
Route::get('legal-notice', function (){
    return view('main.'.App::getLocale().'.footer.ft_04');
});

//contact-us 등록 페이지 (고객상담)
Route::get('footer-contact-us', function (){
    return (new CustomQuestionController)->get('01');
});
Route::get('footer-faq', function (){
    return view('main.'.App::getLocale().'.footer.ft_01_01');
});
Route::get('footer-receipt', function (Request $request){
    return (new CustomQuestionController)->receipt($request);
});
Route::get('footer-check-popup', function (){
    return view('main.'.App::getLocale().'.footer.ft_01_02_popup');
});
Route::get('footer-add-question', function (){
    return view('main.'.App::getLocale().'.footer.ft_01_02_popup2');
});

//투자정보
Route::get('news', function (Request $request){
    return (new NoticeController)->getContentList($request);
});
Route::get('news-dtl', function (Request $request){
    return (new NoticeController)->getContentDetail($request);
});
Route::get('press-news-dtl', function (Request $request){
    return (new NoticeController)->getContentPressDetail($request);
});
