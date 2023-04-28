{{-- 
  // 페이지명 : 직무소개 등록/수정
  // 설명 : 직무소개 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => '직무소개 등록/수정',
      'lang' => 'ko',
      'tab_no' => 1,
      'menu_no' => 8
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

$thumb_image = null; $thumb_image_text = null;
$detail_image = null; $detail_image_text = null;
$thumb_mo_image = null; $thumb_mo_image_text = null;
$detail_mo_image = null; $detail_mo_image_text = null;
$person_image = null; $person_image_text = null;
$person_mo_image = null; $person_mo_image_text = null;

$expo_yn = null;

if(isset($item))
{
  $id = $item->id;
  $expo_yn = $item->expo_yn;
}

@endphp

  <tr>
    <th scope="row">직무명 <span>*</span></th>
    <td><input id="duty_nm" type="text" class="w760" placeholder="직무명을 입력해 주세요." 
      @if(isset($item)) value="{{ $item->duty_nm }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">부서명 <span>*</span></th>
    <td><input id="part_nm" type="text" class="w760" placeholder="부서명을 입력해 주세요." 
      @if(isset($item)) value="{{ $item->part_nm }}" @endif>
    </td>
  </tr>
  
  <tr>
    <th scope="row">직무 상세 설명 <span>*</span></th>
    <td><textarea id="duty_desc" rows="3" cols="5" placeholder="직무 상세 설명을 입력해 주세요."
      >@if(isset($item)) {{ $item->duty_desc }} @endif</textarea></td>
  </tr>
  <tr>

    @php

      if ( isset($files) )
      {
        foreach($files as $file)
        {
          switch($file->file_view_id)
          {
            case '#thumb_image'       : $thumb_image        = $file->file_nm; $thumb_image_text = $file->file_text; break;
            case '#detail_image'      : $detail_image       = $file->file_nm; $detail_image_text = $file->file_text; break;
            case '#thumb_mo_image'    : $thumb_mo_image     = $file->file_nm; $thumb_mo_image_text = $file->file_text; break;
            case '#detail_mo_image'   : $detail_mo_image    = $file->file_nm; $detail_mo_image_text = $file->file_text; break;
            case '#person_image'      : $person_image       = $file->file_nm; $person_image_text = $file->file_text; break;
            case '#person_mo_image'   : $person_mo_image    = $file->file_nm; $person_mo_image_text = $file->file_text; break;
          }
        }
      }

    @endphp

    {{-- 상세 이미지등록(PC) --}}
    @include('includes.file_image', [
        'text' => '상세 이미지등록(PC)',
        'id_name' => 'detail_image',
        'file_desc' => '1920x1080 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_image,
        'file_text' => $detail_image_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>
    {{-- 대표 이미지등록(썸네일 PC) --}}
    @include('includes.file_image', [
        'text' => '대표 이미지등록(썸네일 PC)',
        'id_name' => 'thumb_image',
        'file_desc' => '380x504 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $thumb_image,
        'file_text' => $thumb_image_text,
        'file_token' => $file_token
        ])
  </tr>
  <tr>
    {{-- 상세 이미지 등록 (MO) --}}
    @include('includes.file_image', [
        'text' => '상세 이미지 등록 (MO)',
        'id_name' => 'detail_mo_image',
        'file_desc' => '375x360 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $detail_mo_image,
        'file_text' => $detail_mo_image_text,
        'file_token' => $file_token
        ])
  </tr>
  <tr>
    {{-- 대표 이미지 등록 (썸네일 MO) --}} 
    @include('includes.file_image', [
        'text' => '대표 이미지 등록 (썸네일 MO)',
        'id_name' => 'thumb_mo_image',
        'file_desc' => '327x360 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $thumb_mo_image,
        'file_text' => $thumb_mo_image_text,
        'file_token' => $file_token
        ])    
  </tr>
  <tr>
    <th scope="row">현직자명 <span>*</span></th>
    <td><input id="name" type="text" class="w760" placeholder="현직자명을 입력해 주세요." 
      @if(isset($item)) value="{{ $item->name }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">현직자 인터뷰 <span>*</span></th>
    <td><textarea id="interview" rows="3" cols="5" placeholder="현직자 인터뷰를 입력해 주세요."
      >@if(isset($item)) {{ $item->interview }} @endif</textarea></td>
  </tr>

  <tr>
    {{-- 현직자 이미지 등록 (PC) --}}
    @include('includes.file_image', [
        'text' => '현직자 이미지 등록 (PC)',
        'id_name' => 'person_image',
        // 'file_desc' => '327x230 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $person_image,
        'file_text' => $person_image_text,
        'file_token' => $file_token
        ])
  </tr>
  <tr>
    {{-- 현직자 이미지 등록 (MO) --}}
    @include('includes.file_image', [
        'text' => '현직자 이미지 등록 (MO)',
        'id_name' => 'person_mo_image',
        // 'file_desc' => '327x230 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $person_mo_image,
        'file_text' => $person_mo_image_text,
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
    setWorkId('duty');

    $( function() {

      function getAttach()
      {
        var arrfiles = [
          "#thumb_image"
          ,"#detail_image"
          ,"#thumb_mo_image"
          ,"#detail_mo_image"
          ,"#person_image"
          ,"#person_mo_image"
        ];
        
        return arrfiles;
      }

      function getItem()
      {
        var created_at = $("#created_at").val();
        var expo_yn = $('input[name="expo_yn"]:checked').val();
        var duty_nm = $("#duty_nm").val();
        var part_nm = $("#part_nm").val();
        var duty_desc = $("#duty_desc").val();
        var name = $("#name").val();
        var interview = $("#interview").val();

        var item = {
          id: id,
          expo_yn: expo_yn,
          duty_nm: duty_nm,
          part_nm: part_nm,
          duty_desc: duty_desc,
          name: name,
          interview: interview,
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