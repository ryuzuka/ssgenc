{{-- 
  // 페이지명 : 프로젝트 등록/수정
  // 설명 : 프로젝트 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '프로젝트 관리',
      'subject' => '프로젝트 등록/수정',
      'lang' => 'ko',
      'tab_no' => 0,
      'menu_no' => 0
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

$area = null;
$biz_area = null;
$gubun = null;
$open_yn = null;
$main_yn = null;

if(isset($project))
{
  $id = $project->id;
  $area = $project->area;
  $biz_area = $project->biz_area;
  $gubun = $project->gubun;
  $open_yn = $project->open_yn;
  $main_yn = $project->main_yn;
}

@endphp

  <tr>

    {{-- 지역 구분 --}}
    @include('includes.radio', [
        'text' => '지역 구분 <span>*</span>',
        'id_name' => 'area',
        'items' => $items_area,
        'code_id' => $area
        ])

  </tr>
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
    <th scope="row">프로젝트 설명(국문) <span>*</span></th>
    <td><textarea id="desc_ko" rows="3" cols="5" placeholder="한글 프로젝트 설명"
      >@if(isset($project)){!! $project->desc_ko !!}@endif</textarea></td>
  </tr>
  <tr>
    <th scope="row">프로젝트 설명(영문) <span>*</span></th>
    <td><textarea id="desc_en" rows="3" cols="5" placeholder="영문 프로젝트 설명"
      >@if(isset($project)){!! $project->desc_en !!}@endif</textarea></td>
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
    <th scope="row">세대수 (국문)</th>
    <td><input id="household_ko" type="text" class="w760"
      @if(isset($project)) value="{{ $project->household_ko }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">세대수 (영문)</th>
    <td><input id="household_en" type="text" class="w760"
      @if(isset($project)) value="{{ $project->household_en }}" @endif>
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

    @php

      $main_image = null; $main_image_text = null;
      $thumb_image = null; $thumb_image_text = null;
      $detail_image_1 = null; $detail_image_1_text = null; 
      $detail_image_2 = null; $detail_image_2_text = null;
      $detail_image_3 = null; $detail_image_3_text = null;
      $detail_image_4 = null; $detail_image_4_text = null;
      $main_mo_image = null; $main_mo_image_text = null;
      $thumb_mo_image = null; $thumb_mo_image_text = null;
      $detail_mo_image_1 = null; $detail_mo_image_1_text = null;
      $detail_mo_image_2 = null; $detail_mo_image_2_text = null;
      $detail_mo_image_3 = null; $detail_mo_image_3_text = null;
      $detail_mo_image_4 = null; $detail_mo_image_4_text = null;
      
      if ( isset($files) )
      {
        foreach($files as $file)
        {
          switch($file->file_view_id)
          {
            case '#main_image'        : $main_image         = $file->file_nm; $main_image_text = $file->file_text; break;
            case '#thumb_image'       : $thumb_image        = $file->file_nm; $thumb_image_text = $file->file_text; break;
            case '#detail_image_1'    : $detail_image_1     = $file->file_nm; $detail_image_1_text = $file->file_text; break;
            case '#detail_image_2'    : $detail_image_2     = $file->file_nm; $detail_image_2_text = $file->file_text; break;
            case '#detail_image_3'    : $detail_image_3     = $file->file_nm; $detail_image_3_text = $file->file_text; break;
            case '#detail_image_4'    : $detail_image_4     = $file->file_nm; $detail_image_4_text = $file->file_text; break;
            case '#main_mo_image'     : $main_mo_image      = $file->file_nm; $main_mo_image_text = $file->file_text; break;
            case '#thumb_mo_image'    : $thumb_mo_image     = $file->file_nm; $thumb_mo_image_text = $file->file_text; break;
            case '#detail_mo_image_1' : $detail_mo_image_1  = $file->file_nm; $detail_mo_image_1_text = $file->file_text; break;
            case '#detail_mo_image_2' : $detail_mo_image_2  = $file->file_nm; $detail_mo_image_2_text = $file->file_text; break;
            case '#detail_mo_image_3' : $detail_mo_image_3  = $file->file_nm; $detail_mo_image_3_text = $file->file_text; break;
            case '#detail_mo_image_4' : $detail_mo_image_4  = $file->file_nm; $detail_mo_image_4_text = $file->file_text; break;
          }
        }
      }

    @endphp

  {{-- 메인 이미지(PC) --}}
  @include('includes.file_image', [
      'text' => '메인 이미지(PC) ',
      'id_name' => 'main_image',
      'file_desc' => '687x687, 프로젝트 최상단 메인 이미지* (등록 가능 확장자 : jpg, gif, png)',
      'file_nm' => $main_image,
      'file_text' => $main_image_text,
      'file_token' => $file_token
      ])
  </tr>
  <tr>

  {{-- 대표 이미지(PC) --}}
  @include('includes.file_image', [
      'text' => '대표 이미지(PC) <span>*</span>',
      'id_name' => 'thumb_image',
      'file_desc' => '380X504 (등록 가능 확장자 : jpg, gif, png)',
      'file_nm' => $thumb_image,
      'file_text' => $thumb_image_text,
      'file_token' => $file_token
      ])

  </tr>
  <tr>
  
    {{-- 상세 이미지(PC) 타이틀 --}}
    @include('includes.file_image', [
        'text' => '상세 이미지(PC) <span>*</span>',
        'rowspan' => 4,
        'id_name' => 'detail_image_1',
        'file_desc' => '1920x1080 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_image_1,
        'file_text' => $detail_image_1_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 상세 이미지(PC) --}}
    @include('includes.file_image', [
        'id_name' => 'detail_image_2',
        'file_desc' => '1920x1080 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_image_2,
        'file_text' => $detail_image_2_text,
        'file_token' => $file_token
        ])
  </tr>
  <tr>

    {{-- 상세 이미지(PC) #3 --}} 
    @include('includes.file_image', [
        'id_name' => 'detail_image_3',
        'file_desc' => '1920x1080 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_image_3,
        'file_text' => $detail_image_3_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 상세 이미지(PC) #4 --}} 
    @include('includes.file_image', [
        'id_name' => 'detail_image_4',
        'file_desc' => '1920x1080 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_image_4,
        'file_text' => $detail_image_4_text,
        'file_token' => $file_token
        ])    
  </tr>
  <tr>

    {{-- 메인 이미지(MO) 타이틀 --}}
    @include('includes.file_image', [
        'text' => '메인 이미지(MO) ',
        'id_name' => 'main_mo_image',
        'file_desc' => '327x327, 프로젝트 최상단 메인 이미지* (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $main_mo_image,
        'file_text' => $main_mo_image_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 대표 이미지(MO) 타이틀 --}}
    @include('includes.file_image', [
        'text' => '대표 이미지(MO) <span>*</span>',
        'id_name' => 'thumb_mo_image',
        'file_desc' => '327x400 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $thumb_mo_image,
        'file_text' => $thumb_mo_image_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 상세 이미지(MO) 타이틀 --}}
    @include('includes.file_image', [
        'text' => '상세 이미지(MO) <span>*</span>',
        'rowspan' => 4,
        'id_name' => 'detail_mo_image_1',
        'file_desc' => '375x360 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_mo_image_1,
        'file_text' => $detail_mo_image_1_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 상세 이미지(MO) --}}
    @include('includes.file_image', [
        'id_name' => 'detail_mo_image_2',
        'file_desc' => '375x360 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_mo_image_2,
        'file_text' => $detail_mo_image_2_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 상세 이미지(MO) --}}
    @include('includes.file_image', [
        'id_name' => 'detail_mo_image_3',
        'file_desc' => '375x360 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_mo_image_3,
        'file_text' => $detail_mo_image_3_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 상세 이미지(MO) --}}
    @include('includes.file_image', [
        'id_name' => 'detail_mo_image_4',
        'file_desc' => '375x360 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_mo_image_4,
        'file_text' => $detail_mo_image_4_text,
        'file_token' => $file_token
        ])

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

    {{-- 메인여부 --}}
    @include('includes.radio', [
        'text' => '메인여부',
        'must_check' => true,
        'id_name' => 'main_yn',
        'items' => $items_main_yn,
        'code_id' => $main_yn
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
    var attach_id = {{ (isset($project))?$project->attach_id:0 }};

    setId(id);
    setAttachId(attach_id);
    setWorkId('project');

    $( function() {

      function getAttach()
      {
        var arrfiles = [
          "#main_image"
          ,"#thumb_image"
          ,"#detail_image_1"
          ,"#detail_image_2"
          ,"#detail_image_3"
          ,"#detail_image_4"
          ,"#main_mo_image"
          ,"#thumb_mo_image"
          ,"#detail_mo_image_1"
          ,"#detail_mo_image_2"
          ,"#detail_mo_image_3"
          ,"#detail_mo_image_4"
        ];
        
        return arrfiles;
      }

      function getItem()
      {
        var name_ko = $("#name_ko").val();
        var name_en = $("#name_en").val();
        var desc_ko = $("#desc_ko").val();
        var desc_en = $("#desc_en").val();
        var address_ko = $("#address_ko").val();
        var address_en = $("#address_en").val();
        var volumn_ko = $("#volumn_ko").val();
        var volumn_en = $("#volumn_en").val();          
        var household_ko = $("#household_ko").val();
        var household_en = $("#household_en").val();
        var from = $("#from").val();
        var to = $("#to").val();
        var project_yn = ($('#project_yn').is(':checked'))? 'Y' : 'N';

        var area = $('input[name="area"]:checked').val();
        var biz_area = $('input[name="biz_area"]:checked').val();
        var gubun = $('input[name="gubun"]:checked').val();
        var open_yn = $('input[name="open_yn"]:checked').val();
        var main_yn = $('input[name="main_yn"]:checked').val();
        var created_at = $("#created_at").val();

        var item = {
          id: id,
          area: area,
          biz_area: biz_area,
          gubun: gubun,
          name_ko: name_ko,
          name_en: name_en,
          desc_ko: $.trim(desc_ko),
          desc_en: $.trim(desc_en),
          address_ko: address_ko,
          address_en: address_en,
          volumn_ko: volumn_ko,
          volumn_en: volumn_en,
          household_ko: household_ko,
          household_en: household_en,
          from: from,
          to: to,
          project_yn: project_yn,
          open_yn: open_yn,
          main_yn: main_yn,
          created_at: created_at
        };

        return item;
      }

      function Add()
      {
        request(getItem(), getAttach(), null);
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