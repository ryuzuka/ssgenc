{{-- 
  // 페이지명 : 수상실적 등록/수정
  // 설명 : 수상실적 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => (($gubun=='01')?'수상':'인증').'실적 등록/수정',
      'lang' => 'ko',
      'tab_no' => 1,
      'menu_no' => 6
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

$main_image = null; $main_image_text = null;
$main_mo_image = null; $main_mo_image_text = null;

$expo_yn = null;

if(isset($item))
{
  $id = $item->id;
  $expo_yn = $item->expo_yn;
}

@endphp

  <tr>
    <th scope="row">주관기관(국문) <span>*</span></th>
    <td><input id="agency_ko" type="text" class="w760" placeholder="한글 주관기관을 입력해 주세요." 
      @if(isset($item)) value="{{ $item->agency_ko }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">주관기관(영문) <span>*</span></th>
    <td><input id="agency_en" type="text" class="w760" placeholder="영문 주관기관을 입력해 주세요."
      @if(isset($item)) value="{{ $item->agency_en }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">제목(국문) <span>*</span></th>
    <td><input id="subject_ko" type="text" class="w760" placeholder="한글 제목을 입력해 주세요." 
      @if(isset($item)) value="{{ $item->subject_ko }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">제목(영문) <span>*</span></th>
    <td><input id="subject_en" type="text" class="w760" placeholder="영문 제목을 입력해 주세요." 
      @if(isset($item)) value="{{ $item->subject_en }}" @endif>
    </td>
  </tr>
  <tr>

    @php

      if ( isset($files) )
      {
        foreach($files as $file)
        {
          switch($file->file_view_id)
          {
            case '#main_image'    : $main_image     = $file->file_nm; $main_image_text = $file->file_text; break;
            case '#main_mo_image' : $main_mo_image  = $file->file_nm; $main_mo_image_text = $file->file_text; break;
          }
        }
      }

    @endphp

    {{-- 대표 이미지등록(PC) --}}
    @include('includes.file_image', [
        'text' => '대표 이미지등록(PC)',
        'id_name' => 'main_image',
        'file_nm' => $main_image,
        'file_text' => $main_image_text,
        'file_token' => $file_token
        ])
  </tr>
  <tr>
    {{-- 대표 이미지 등록 (MO) --}} 
    @include('includes.file_image', [
        'text' => '대표 이미지 등록 (MO)',
        'id_name' => 'main_mo_image',
        'file_nm' => $main_mo_image,
        'file_text' => $main_mo_image_text,
        'file_token' => $file_token
        ])    
  </tr>
  <tr>
    <th scope="row">등록일 <span>*</span></th>
    <td>
      <div class="datepicker-box">
        <div class="date-box">
          <input id="registed_at" type="text" class="datepicker"
          @if(isset($item)) value={{ $item->registed_at }} @endif>
        </div>
    </td>
  </tr>
  <tr>

    {{-- 노출여부 --}}
    @include('includes.radio', [
        'text' => '노출여부 <span>*</span>',
        'must_check' => true,
        'id_name' => 'expo_yn',
        'items' => $items_expo_yn,
        'code_id' => $expo_yn
        ])

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
@if (isset($item))

@section('modify_history_area')

  <!-- 수정이력 -->
  <div class="modify-history">
    <em>수정이력</em>
    <ul>
      <li>최초작성 : <span>{{ $item->created_id }}</span> <span>{{ $item->created_at }}</span></li>
      <li>최종수정 : <span>{{ $item->updated_id }}</span> <span>{{ $item->updated_at }}</span></li>
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
    var gubun = "{{ $gubun }}";
    var attach_id = {{ (isset($item))?$item->attach_id:0 }};

    setId(id);
    setAttachId(attach_id);
    setWorkId('award');

    $( function() {

      function getAttach()
      {
        var arrfiles = [
          "#main_image"
          ,"#main_mo_image"
        ];
        
        return arrfiles;
      }

      function getItem()
      {
        var registed_at = $("#registed_at").val();
        var expo_yn = $('input[name="expo_yn"]:checked').val();
        var agency_ko = $("#agency_ko").val();
        var agency_en = $("#agency_en").val();
        var subject_ko = $("#subject_ko").val();
        var subject_en = $("#subject_en").val();

        var item = {
          id: id,
          gubun: gubun,
          expo_yn: expo_yn,
          agency_ko: agency_ko,
          agency_en: agency_en,
          subject_ko: subject_ko,
          subject_en: subject_en,
          registed_at: registed_at
        };

        return item;
      }

      function Add()
      {
        request(getItem(), getAttach(), null);
      }

      // datepicker
      $( "#registed_at" ).datepicker({ dateFormat: 'yy-mm-dd' });

      //등록버튼
      $( "#add" ).on('click', function(e){
        e.preventDefault();
        Add();
      });

    });

  </script>

@endpush
@endonce