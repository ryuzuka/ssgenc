{{--
  // 페이지명 : 메인 팝업 등록/수정
  // 설명 : 메인 팝업 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => '메인 팝업 등록/수정',
      'lang' => 'ko',
      'tab_no' => 2,
      'menu_no' => 2
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

// $msg_acc = null;
$expo_yn = null;
$lang = 'ko'; //탭 선택에 따라 변경 됨.

if(isset($item))
{
  $id = $item->id;
  // $msg_acc = $item->msg_acc;
  $expo_yn = $item->expo_yn;
}

// dd($item);

@endphp

  <tr>
    <th scope="row">제목 <span>*</span></th>
    <td><input id="subject" type="text" class="w760" placeholder="제목을 입력해 주세요."
          @if(isset($item)) value="{{ $item->subject }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">디스크립션 <span>*</span></th>
    <td><input id="descript" type="text" class="w760" placeholder="디스크립션을 입력해 주세요."
          @if(isset($item)) value="{{ $item->descript }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">링크 </th>
    <td>
      <div class="regist-text">
        <div class="area">
          <span class="text fw">URL</span>
          <input id="url" type="text" class="w375" @if(isset($item)) value="{{ $item->url }}" @endif>
        </div>

        <div>
          <span class="text">링크 텍스트</span>
          <input id="link_text" type="text" class="w375"
              @if(isset($item)) value="{{ $item->link_text }}" @endif>
          <span class="text-info">20자 이내 등록 가능합니다.</span>
        </div>
      </div>
    </td>
  </tr>
  <tr>

    @php

      $pc_popupimage = null; $pc_popupimage_text = null;
      $mo_popupimage = null; $mo_popupimage_text = null;

      if ( isset($files) )
      {
        foreach($files as $file)
        {
          switch($file->file_view_id)
          {
            case '#pc_popupimage' : $pc_popupimage = $file->file_nm; $pc_popupimage_text = $file->file_text; break;
            case '#mo_popupimage' : $mo_popupimage = $file->file_nm; $mo_popupimage_text = $file->file_text; break;
          }
        }
      }

    @endphp

    {{-- PC 이미지 타이틀 --}}
    @include('includes.file_image', [
        'text' => 'PC 이미지 <span>*</span>',
        'id_name' => 'pc_popupimage',
        'file_desc' => '450x174 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $pc_popupimage,
        'file_text' => $pc_popupimage_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- MOBILE 이미지 --}}
    @include('includes.file_image', [
        'text' => 'MOBILE 이미지 <span>*</span>',
        'id_name' => 'mo_popupimage',
        'file_desc' => '654x348 이미지를 등록해주세요. 등록 가능한 확장자 : jpg,gif,png',
        'file_nm' => $mo_popupimage,
        'file_text' => $mo_popupimage_text,
        'file_token' => $file_token
        ])

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
      <li>최초작성 : <span>{{ isset($item)? $item->created_id : '' }}</span> <span>{{ isset($item)? $item->created_at : '' }}</span></li>
      <li>최종수정 : <span>{{ isset($item)? $item->updated_id : '' }}</span> <span>{{ isset($item)? $item->updated_at : '' }}</span></li>
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
    setWorkId('mainpopup');

    $( function() {

      function getAttach()
      {
        var arrfiles = [
          "#pc_popupimage"
          ,"#mo_popupimage"
        ];

        return arrfiles;
      }

      function getItem()
      {
        var expo_yn = $('input[name="expo_yn"]:checked').val();
        var subject = $("#subject").val();
        var descript = $("#descript").val();
        var url = $("#url").val();
        var link_text = $("#link_text").val();

        var item = {
          id: id,
          expo_yn: expo_yn,
          subject: subject,
          descript: descript,
          url: url,
          link_text: link_text
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
