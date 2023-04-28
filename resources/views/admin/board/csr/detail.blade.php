{{-- 
  // 페이지명 : 사회공헌 등록/수정
  // 설명 : 사회공헌 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => '사회공헌 등록/수정',
      'lang' => 'ko',
      'tab_no' => 1,
      'menu_no' => 7
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

$thumb_image = null; $thumb_image_text = null; 
$detail_image_1 = null; $detail_image_1_text = null;
$detail_image_2 = null; $detail_image_2_text = null;
$thumb_mo_image = null; $thumb_mo_image_text = null;
$detail_mo_image_1 = null; $detail_mo_image_1_text = null;
$detail_mo_image_2 = null; $detail_mo_image_2_text = null;

$item_contrib = null;
$expo_yn = null;

if(isset($item))
{
  $id = $item->id;
  $item_contrib = $item->contrib;
  $expo_yn = $item->expo_yn;
}

// dd($item_contrib);

@endphp

  <tr>

    {{-- 구분 --}}
    @include('includes.radio', [
        'text' => '구분 <span>*</span>',
        'id_name' => 'items_contrib',
        'items' => $items_contrib,
        'code_id' => $item_contrib
        ])

  </tr>
  <tr>
    <th scope="row">제목(국문) <span>*</span></th>
    <td><input id="subject_ko" type="text" class="w760" placeholder="국문제목을 입력해 주세요." 
          @if(isset($item)) value="{{ $item->subject_ko }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">제목(영문) <span>*</span></th>
    <td><input id="subject_en" type="text" class="w760" placeholder="영문제목을 입력해 주세요." 
          @if(isset($item)) value="{{ $item->subject_en }}" @endif>
    </td>
  </tr>
  
  <tr>
    <th scope="row">내용(국문) <span>*</span></th>
    <td><textarea id="content_ko" rows="3" cols="5" placeholder="국문내용을 입력해 주세요."
      >@if(isset($item)) {{ $item->content_ko }} @endif</textarea></td>
  </tr>
  <tr>
    <th scope="row">내용(영문) <span>*</span></th>
    <td><textarea id="content_en" rows="3" cols="5" placeholder="영문내용을 입력해 주세요."
      >@if(isset($item)) {{ $item->content_en }} @endif</textarea></td>
  </tr>  
  <tr>

    @php

      if ( isset($files) )
      {
        foreach($files as $file)
        {
          switch($file->file_view_id)
          {
            case '#thumb_image'       : $thumb_image = $file->file_nm; $thumb_image_text = $file->file_text; break;
            case '#detail_image_1'    : $detail_image_1 = $file->file_nm; $detail_image_1_text = $file->file_text; break;
            case '#detail_image_2'    : $detail_image_2 = $file->file_nm; $detail_image_2_text = $file->file_text; break;
            case '#thumb_mo_image'    : $thumb_mo_image = $file->file_nm; $thumb_mo_image_text = $file->file_text; break;
            case '#detail_mo_image_1' : $detail_mo_image_1 = $file->file_nm; $detail_mo_image_1_text = $file->file_text; break;
            case '#detail_mo_image_2' : $detail_mo_image_2 = $file->file_nm; $detail_mo_image_2_text = $file->file_text; break;
          }
        }
      }

    @endphp

    {{-- 대표 이미지등록(썸네일 PC) --}}
    @include('includes.file_image', [
        'text' => '대표 이미지등록(썸네일 PC)',
        // 'rowspan' => 4,
        'id_name' => 'thumb_image',
        'file_desc' => '380x504 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $thumb_image,
        'file_text' => $thumb_image_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 상세 상단 이미지등록(PC) --}}
    @include('includes.file_image', [
        'text' => '상세 상단 이미지등록(PC)',
        'id_name' => 'detail_image_1',
        'file_desc' => '1920x1080 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_image_1,
        'file_text' => $detail_image_1_text,
        'file_token' => $file_token
        ])
  </tr>
  <tr>

    {{-- 상세 이미지 등록 (PC) --}} 
    @include('includes.file_image', [
        'text' => '상세 이미지등록(PC)',
        'id_name' => 'detail_image_2',
        'file_desc' => '1200x600 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_image_2,
        'file_text' => $detail_image_2_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 대표 이미지 등록 (썸네일 MO) --}} 
    @include('includes.file_image', [
        'text' => '대표 이미지 등록 (썸네일 MO)',
        'id_name' => 'thumb_mo_image',
        'file_desc' => '327x430 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $thumb_mo_image,
        'file_text' => $thumb_mo_image_text,
        'file_token' => $file_token
        ])    
  </tr>
  <tr>

    {{-- 상세 상단 이미지 등록 (MO) --}}
    @include('includes.file_image', [
        'text' => '상세 상단 이미지 등록 (MO)',
        // 'rowspan' => 4,
        'id_name' => 'detail_mo_image_1',
        'file_desc' => '375x360 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_mo_image_1,
        'file_text' => $detail_mo_image_1_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 상세 이미지 등록 (MO) --}}
    @include('includes.file_image', [
        'text' => '상세 이미지 등록 (MO)',
        'id_name' => 'detail_mo_image_2',
        'file_desc' => '327x230 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_mo_image_2,
        'file_text' => $detail_mo_image_2_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>
    <th scope="row">등록일 <span>*</span></th>
    <td>
      <div class="datepicker-box">
        <div class="date-box">
          <input id="created_at" type="text" class="datepicker"
          @if(isset($item)) value={{ $item->created_at }} @endif>
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
    var attach_id = {{ (isset($item))?$item->attach_id:0 }};

    setId(id);
    setAttachId(attach_id);
    setWorkId('csr');

    $( function() {

      function getAttach()
      {
        var arrfiles = [
          "#thumb_image"
          ,"#detail_image_1"
          ,"#detail_image_2"
          ,"#thumb_mo_image"
          ,"#detail_mo_image_1"
          ,"#detail_mo_image_2"
        ];
        
        return arrfiles;
      }

      function getItem()
      {
        var created_at = $("#created_at").val();
        var contrib = $('input[name="items_contrib"]:checked').val();
        var expo_yn = $('input[name="expo_yn"]:checked').val();
        var subject_ko = $("#subject_ko").val();
        var subject_en = $("#subject_en").val();
        var content_ko = $("#content_ko").val();
        var content_en = $("#content_en").val();

        var item = {
          id: id,
          contrib: contrib,
          expo_yn: expo_yn,
          subject_ko: subject_ko,
          subject_en: subject_en,
          content_ko: content_ko,
          content_en: content_en,
          created_at: created_at
        };

        return item;
      }

      function Add()
      {
        request(getItem(), getAttach(), null);
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