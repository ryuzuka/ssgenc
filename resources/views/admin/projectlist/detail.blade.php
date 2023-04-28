{{-- 
  // 페이지명 : 프로젝트 실적 등록/수정
  // 설명 : 프로젝트 실적 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '프로젝트 관리',
      'subject' => '프로젝트 실적 등록/수정',
      'lang' => 'ko',
      'tab_no' => 0,
      'menu_no' => 1
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

$area = null;
$biz_area = null;
$gubun = null;
$open_yn = null;

if(isset($project))
{
  $id = $project->id;
  $area = $project->area;
  $biz_area = $project->biz_area;
  $gubun = $project->gubun;
  $open_yn = $project->open_yn;
}

@endphp

  {{-- <tr>

    @include('includes.radio', [
        'text' => '지역 구분 <span>*</span>',
        'id_name' => 'area',
        'items' => $items_area,
        'code_id' => $area
        ])

  </tr> --}}
  <tr>

    {{-- 사업분야 --}}
    @include('includes.radio', [
        'text' => '사업분야 <span>*</span>',
        'id_name' => 'biz_area',
        'items' => $items_biz_area,
        'code_id' => $biz_area
        ])

  </tr>
  <tr>

    {{-- 구분 --}}
    @include('includes.radio', [
        'text' => '구분 <span>*</span>',
        'id_name' => 'gubun',
        'items' => $items_gubun,
        'code_id' => $gubun
        ])

  </tr>
  <tr>
    <th scope="row">프로젝트명 (국문) <span>*</span></th>
    <td><input id="name_ko" type="text" class="w760" placeholder="한글 프로젝트명을 입력" 
          @if(isset($project)) value="{{ $project->name_ko }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">프로젝트명 (영문) <span>*</span></th>
    <td><input id="name_en" type="text" class="w760" placeholder="영문 프로젝트명을 입력"
      @if(isset($project)) value="{{ $project->name_en }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">프로젝트 주소 (국문)</th>
    <td><input id="address_ko" type="text" class="w760" placeholder="한글 주소를 입력"
      @if(isset($project)) value="{!! $project->address_ko !!}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">프로젝트 주소 (영문)</th>
    <td><input id="address_en" type="text" class="w760" placeholder="영문 주소를 입력"
      @if(isset($project)) value="{!! $project->address_en !!}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">규모/연면적 (국문) <span>*</span></th>
    <td><input id="volumn_ko" type="text" class="w760"
      @if(isset($project)) value="{!! $project->volumn_ko !!}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">규모/연면적 (영문) <span>*</span></th>
    <td><input id="volumn_en" type="text" class="w760"
      @if(isset($project)) value="{!! $project->volumn_en !!}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">기간 <span>*</span></th>
    <td>
      <div class="datepicker-box">
        <div class="date-box">
          <input id="from" type="text" class="datepicker"
          @if(isset($project)) value="{{ $project->from }}" @endif>
        </div>
        ~
        <div class="date-box">
          <input id="to" type="text" class="datepicker"
          @if(isset($project)) value="{{ $project->to }}" @endif>
        </div>
      </div>
      <div class="check-box">
        <input id="project_yn" type="checkbox" @if(isset($project) && $project->project_yn=='Y') checked @endif>
        <label for="project_yn">프로젝트 진행중</label>
      </div>
    </td>
  </tr>
  <tr>

    {{-- 공개여부 --}}
    @include('includes.radio', [
        'text' => '공개여부',
        'must_check' => true,
        'id_name' => 'open_yn',
        'items' => $items_open_yn,
        'code_id' => $open_yn
        ])

  </tr>

  <tr>
    <th scope="row">등록일자 <span>*</span></th>
    <td>
      <div class="datepicker-box">
        <div class="date-box">
          <input id="created_at" type="text" class="datepicker"
          @if(isset($project)) value="{{ $project->created_at }}" @endif>
        </div>
    </td>
  </tr>

@endsection

{{-- 3) 기능버튼 영역 --}}
@section('button_area')

  <div class="btn-wrap">
    <div class="left">
      <button id="delete" type="button" class="btn btn-secondary">삭제</button>
    </div>
    <div class="right">
      <button id="cancel" type="button" class="btn btn-secondary">취소</button>
      <button id="add" type="button" class="btn btn-primary">등록</button>
    </div>
  </div>

@endsection

{{-- 4) 수정이력 영역 --}}
@if (isset($project))

@section('modify_history_area')

  <!-- 수정이력 -->
  <div class="modify-history">
    <em>수정이력</em>
    <ul>
      <li>최초작성 : <span>{{ (isset($project))?$project->created_id:'' }}</span> <span>{{ (isset($project))?$project->created_at:'' }}</span></li>
      <li>최종수정 : <span>{{ (isset($project))?$project->updated_id:'' }}</span> <span>{{ (isset($project))?$project->updated_at:'' }}</span></li>
    </ul>
  </div>
  <!-- // 수정이력 -->

@endsection

@endif

{{-- 5) 스크립트 영역 --}}
@once
@push('srcipt_source')

  <script>

    var id = "{{ $id }}";

    setId(id);
    setWorkId('projectlist');

    $( function() {

      function getItem()
      {
        var name_ko = $("#name_ko").val();
        var name_en = $("#name_en").val();
        var address_ko = $("#address_ko").val();
        var address_en = $("#address_en").val();
        var volumn_ko = $("#volumn_ko").val();
        var volumn_en = $("#volumn_en").val();          
        var from = $("#from").val();
        var to = $("#to").val();
        var project_yn = ($('#project_yn').is(':checked'))? 'Y' : 'N';

        // var area = $('input[name="area"]:checked').val();
        var biz_area = $('input[name="biz_area"]:checked').val();
        var gubun = $('input[name="gubun"]:checked').val();
        var open_yn = $('input[name="open_yn"]:checked').val();
        var created_at = $("#created_at").val();

        var item = {
          id: id,
          // area: area,
          biz_area: biz_area,
          gubun: gubun,
          name_ko: name_ko,
          name_en: name_en,
          address_ko: address_ko,
          address_en: address_en,
          volumn_ko: volumn_ko,
          volumn_en: volumn_en,
          from: from,
          to: to,
          project_yn: project_yn,
          open_yn: open_yn,
          created_at: created_at
        };

        return item;
      }

      function Add()
      {
        request(getItem(), null, null);
      }

      // datepicker
      $( "#from, #to" ).datepicker({ dateFormat: 'yy-mm-dd' });
      $( "#created_at" ).datepicker({ dateFormat: 'yy-mm-dd' });

      //등록버튼
      $( "#add" ).on('click', function(e){
        e.preventDefault();
        Add();
      });

      $( "#biz_area" ).on('change', function(e)
      {
        e.preventDefault();

        var biz_area = $('input[name="biz_area"]:checked').val();

        var params = {
          biz_area: biz_area
        };      

        com_utils.post("{{ url('api/project/getcode') }}", params, function(res){
          if (res.code == '0000')
          {
            //gubun에 다시 초기화 한다.
            // console.log(res.data);
            var items = res.data.items_gubun;
            $("#gubun").empty();

            for(var i = 0; i < items.length; i++)
            {  
                if (items[i].view == 'Y')
                {
                  var $radioBox = $("<div>", {class: "radio-box"});
                  var label = $("<label>", {for:"gubun_"+items[i].code_id, text:items[i].code_nm});
                  var input = $('<input>', {type:"radio", id:"gubun_"+items[i].code_id,
                                            value: items[i].code_id, name:"gubun"});
                  $radioBox.append(input);
                  $radioBox.append(label);
                  $("#gubun").append($radioBox);
                }
            }

            //첫번째 아이템 강제 선택
            $('#gubun > .radio-box input:radio').eq(0).prop('checked', true);

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
      });

    });

  </script>

@endpush
@endonce