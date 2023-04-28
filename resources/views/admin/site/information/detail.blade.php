{{-- 
  // 페이지명 : 정보 관리 등록
  // 설명 : 정보 관리 등록을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_contents', [
      'title' => '사이트 관리',
      'subject' => '정보 관리',
      'lang' => 'ko',
      'tab_no' => 2,
      'menu_no' => 1
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;
$housing    = null;
$construct  = null;
$leisure    = null;
$civil      = null;
$hf_age     = null;
$hf_project = null;
$hf_amt     = null;
$hf_amt_en  = null;
$cf_age     = null;
$cf_project = null;
$cf_amt     = null;
$cf_amt_en  = null;
$ce_age     = null;
$ce_project = null;
$ce_amt     = null;
$ce_amt_en  = null;
$lb_age     = null;
$lb_count   = null;
$lb_amt     = null;
$lb_amt_en  = null;
$ent_age    = null;
$ent_count  = null;
$ent_amt    = null;
$ent_amt_en = null;
$created_id = null;
$created_at = null;
$updated_id = null;
$updated_at = null;

$lang = 'ko'; //탭 선택에 따라 변경 됨.

if( isset($item) )
{
  $id         = $item->id;
  $housing    = $item->housing;
  $construct  = $item->construct;
  $leisure    = $item->leisure;
  $civil      = $item->civil;
  $hf_age     = $item->hf_age;
  $hf_project = $item->hf_project;
  $hf_amt     = $item->hf_amt;
  $hf_amt_en  = $item->hf_amt_en;
  $cf_age     = $item->cf_age;
  $cf_project = $item->cf_project;
  $cf_amt     = $item->cf_amt;
  $cf_amt_en  = $item->cf_amt_en;
  $ce_age     = $item->ce_age;
  $ce_project = $item->ce_project;
  $ce_amt     = $item->ce_amt;
  $ce_amt_en  = $item->ce_amt_en;
  $lb_age     = $item->lb_age;
  $lb_count   = $item->lb_count;
  $lb_amt     = $item->lb_amt;
  $lb_amt_en  = $item->lb_amt_en;
  $ent_age    = $item->ent_age;
  $ent_count  = $item->ent_count;
  $ent_amt    = $item->ent_amt;
  $ent_amt_en = $item->ent_amt_en;
  $created_id = $item->created_id;
  $created_at = $item->created_at;
  $updated_id = $item->updated_id;
  $updated_at = $item->updated_at;
}

@endphp

  <!-- 사이트 관리 > 정보관리 -->
  <table class="tbl">
    <colgroup>
      <col style="width:20%;">
      <col style="width:9%;">
      <col style="width:71%;">
    </colgroup>
    <tbody>
    <tr>
      <th scope="row">메인 프로젝트 수치</th>
      <td colspan="2">
        <ul class="list-admin">
          <li>
            <span>주거시설</span>
            <input id="housing" type="text" value="{{ $housing }}">
          </li>
          <li>
            <span>건설시설</span>
            <input id="construct" type="text" value="{{ $construct }}">
          </li>
          <li>
            <span>레저시설</span>
            <input id="leisure" type="text" value="{{ $leisure }}">
          </li>
          <li>
            <span>토목시설</span>
            <input id="civil" type="text" value="{{ $civil }}">
          </li>
        </ul>
      </td>
    </tr>
    <tr>
      <th scope="row">주거시설 프로젝트 세부 수치</th>
      <td colspan="2">
        <ul class="list-admin">
          <li>
            <span>총 시공년수</span>
            <input id="hf_age" type="text" value="{{ $hf_age }}">
          </li>
          <li>
            <span>프로젝트 수</span>
            <input id="hf_project" type="text" value="{{ $hf_project }}">
          </li>
          <li>
            <span>총 공사비(국문)</span>
            <input id="hf_amt" type="text" value="{{ $hf_amt }}">
          </li>
          <li>
            <span>총 공사비(영문)</span>
            <input id="hf_amt_en" type="text" value="{{ $hf_amt_en }}">
          </li>
        </ul>
      </td>
    </tr>
    <tr>
      <th scope="row">건축시설 프로젝트 세부 수치</th>
      <td colspan="2">
        <ul class="list-admin">
          <li>
            <span>총 시공년수</span>
            <input id="cf_age" type="text" value="{{ $cf_age }}">
          </li>
          <li>
            <span>프로젝트 수</span>
            <input id="cf_project" type="text" value="{{ $cf_project }}">
          </li>
          <li>
            <span>총 공사비(국문)</span>
            <input id="cf_amt" type="text" value="{{ $cf_amt }}">
          </li>
          <li>
            <span>총 공사비(영문)</span>
            <input id="cf_amt_en" type="text" value="{{ $cf_amt_en }}">
          </li>
        </ul>
      </td>
    </tr>
    <tr>
      <th scope="row">토목시설 프로젝트 세부 수치</th>
      <td colspan="2">
        <ul class="list-admin">
          <li>
            <span>총 시공년수</span>
            <input id="ce_age" type="text" value="{{ $ce_age }}">
          </li>
          <li>
            <span>프로젝트 수</span>
            <input id="ce_project" type="text" value="{{ $ce_project }}">
          </li>
          <li>
            <span>총 공사비(국문)</span>
            <input id="ce_amt" type="text" value="{{ $ce_amt }}">
          </li>
          <li>
            <span>총 공사비(영문)</span>
            <input id="ce_amt_en" type="text" value="{{ $ce_amt_en }}">
          </li>
        </ul>
      </td>
    </tr>    
    <tr>
      <th scope="row" rowspan=2">레저사업 프로젝트 세부 수치</th>
      <th scope="row" class="ft-s">골프장</th>
      <td>
        <ul class="list-admin">
          <li>
            <span>총 운영년수</span>
            <input id="lb_age" type="text" value="{{ $lb_age }}">
          </li>
          <li>
            <span>운영사업장 수</span>
            <input id="lb_count" type="text" value="{{ $lb_count }}">
          </li>
          <li>
            <span>총 규모(국문)</span>
            <input id="lb_amt" type="text" value="{{ $lb_amt }}">
          </li>
          <li>
            <span>총 규모(영문)</span>
            <input id="lb_amt_en" type="text" value="{{ $lb_amt_en }}">
          </li>
        </ul>
      </td>
    </tr>
    <tr>
      <th scope="row" class="ft-s">엔터테인먼트</th>
      <td>
        <ul class="list-admin">
          <li>
            <span>총 운영년수</span>
            <input id="ent_age" type="text" value="{{ $ent_age }}">
          </li>
          <li>
            <span>운영사업장 수</span>
            <input id="ent_count" type="text" value="{{ $ent_count }}">
          </li>
          <li>
            <span>총 규모(국문)</span>
            <input id="ent_amt" type="text" value="{{ $ent_amt }}">
          </li>
          <li>
            <span>총 규모(영문)</span>
            <input id="ent_amt_en" type="text" value="{{ $ent_amt_en }}">
          </li>
        </ul>
      </td>
    </tr>
    </tbody>
  </table>
  <!-- // 사이트 관리 > 정보관리 -->

@endsection

{{-- 3) 기능버튼 영역 --}}
@section('button_area')

  <div class="btn-wrap">
    <div class="left">
      <button id="cancel" type="button" class="btn btn-secondary">취소</button>
    </div>
    <div class="right">
      <button id="add" type="button" class="btn btn-primary">저장</button>
    </div>
  </div>

@endsection

{{-- 4) 수정이력 영역 --}}
@if (isset($item))

@section('modify_history_area')

  <!-- 수정이력 -->
  <div class="modify-history">
    <em>수정이력</em>
    <ul>
      <li>최초작성 : <span>{{ $created_id }}</span> <span>{{ $created_at }}</span></li>
      <li>최종수정 : <span>{{ $updated_id }}</span> <span>{{ $updated_at }}</span></li>
    </ul>
  </div>
  <!-- // 수정이력 -->

@endsection

@endif

{{-- 5) 스크립트 영역 --}}
@once
@push('srcipt_source')
  
  <script>

    $( function() {

      var id = "{{ $id }}";

      $( "#cancel" ).removeClass("btn-secondary");
      $( "#cancel" ).addClass("btn-primary");

      $( "#add" ).removeClass("btn-secondary");
      $( "#add" ).addClass("btn-primary");

      function Add()
      {
        var housing    = $("#housing").val();
        var construct  = $("#construct").val();
        var leisure    = $("#leisure").val();
        var civil      = $("#civil").val();
        var hf_age     = $("#hf_age").val();
        var hf_project = $("#hf_project").val();
        var hf_amt     = $("#hf_amt").val();
        var hf_amt_en  = $("#hf_amt_en").val();
        var cf_age     = $("#cf_age").val();
        var cf_project = $("#cf_project").val();
        var cf_amt      = $("#cf_amt").val();
        var cf_amt_en   = $("#cf_amt_en").val();
        var ce_age      = $("#ce_age").val();
        var ce_project  = $("#ce_project").val();
        var ce_amt      = $("#ce_amt").val();
        var ce_amt_en   = $("#ce_amt_en").val();
        var lb_age      = $("#lb_age").val();
        var lb_count    = $("#lb_count").val();
        var lb_amt      = $("#lb_amt").val();
        var lb_amt_en   = $("#lb_amt_en").val();
        var ent_age     = $("#ent_age").val();
        var ent_count   = $("#ent_count").val();
        var ent_amt     = $("#ent_amt").val();
        var ent_amt_en  = $("#ent_amt_en").val();

        var params = {
          id: id,
          housing     : housing,
          construct   : construct,
          leisure     : leisure,
          civil       : civil,
          hf_age      : hf_age,
          hf_project  : hf_project,
          hf_amt      : hf_amt,
          hf_amt_en   : hf_amt_en,
          cf_age      : cf_age,
          cf_project  : cf_project,
          cf_amt      : cf_amt,
          cf_amt_en   : cf_amt_en,
          ce_age      : ce_age,
          ce_project  : ce_project,
          ce_amt      : ce_amt,
          ce_amt_en   : ce_amt_en,
          lb_age      : lb_age,
          lb_count    : lb_count,
          lb_amt      : lb_amt,
          lb_amt_en   : lb_amt_en,
          ent_age     : ent_age,
          ent_count   : ent_count,
          ent_amt     : ent_amt,
          ent_amt_en  : ent_amt_en
        };

        com_utils.post("{{ url('api/information/store') }}", params, function(res){
          if (res.code == '0000')
          {
            Vue.alert(res.message).then((val)=>{
              if (val == true)
              {
                window.location.replace(document.referrer);
              }
            });
          }
          else{
            var code = res.code;
            var message = res.message;
            if (res.data != null)
            {
              //맨 첫 컬럼 내용만 보여 줌.
              Vue.alert('['+code+'] '+res.data[0]);
            }
            else
            {
              Vue.alert('['+code+'] '+message);
            }
          }
        });
      }

      // datepicker
      $( "#created_at" ).datepicker({ dateFormat: 'yy-mm-dd' });

      //등록버튼
      $( "#add" ).on('click', function(e){
        e.preventDefault();
        Add();
      });

    });

  </script>

@endpush
@endonce