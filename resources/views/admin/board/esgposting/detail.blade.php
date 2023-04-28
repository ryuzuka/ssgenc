{{-- 
  // 페이지명 : ESG 공시 등록/수정
  // 설명 : ESG 공시 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => 'ESG 공시 등록/수정',
      'lang' => 'ko',
      'tab_no' => 1,
      'menu_no' => 5
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;
$expo_yn = null;

if(isset($item))
{
  $id = $item->id;
  $expo_yn = $item->expo_yn;
}

@endphp

  <tr>
    <th scope="row">제목 <span>*</span></th>
    <td><input id="subject" type="text" class="w760" placeholder="제목을 입력해 주세요." 
          @if(isset($item)) value="{{ $item->subject }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">등록일 <span>*</span></th>
    <td>
      <div class="datepicker-box">
        <div class="date-box">
          <input id="created_at" type="text" class="datepicker"
          @if(isset($item)) value="{{ $item->created_at }}" @endif>
        </div>
    </td>
  </tr>
  <tr>

    @php

      $pc_image = null; $pc_image_text = null;
      $mo_image = null; $mo_image_text = null;

      if ( isset($files) )
      {
        foreach($files as $file)
        {
          switch($file['file_view_id'])
          {
            case '#pc_image' : $pc_image = $file['file_nm']; $pc_image_text = $file['file_text']; break;
            case '#mo_image' : $mo_image = $file['file_nm']; $mo_image_text = $file['file_text']; break;
          }
        }
      }

    @endphp

    {{-- 이미지(PC) --}}
    @include('includes.file_image', [
        'text' => '이미지(PC)',
        'id_name' => 'pc_image',
        'file_nm' => $pc_image,
        'file_text' => $pc_image_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 이미지(MO) --}}
    @include('includes.file_image', [
        'text' => '이미지(MO)',
        'id_name' => 'mo_image',
        'file_nm' => $mo_image,
        'file_text' => $mo_image_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>
    <th scope="row">내용</th>
    <td><textarea id="content" rows="3" cols="5" placeholder="내용을 입력하세요."
      >@if(isset($item)) {!! $item->content !!} @endif</textarea></td>
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
    setWorkId('esgposting');

    $( function() {

      function getAttach()
      {
        var arrfiles = [
          "#pc_image",
          "#mo_image"
        ];
        
        return arrfiles;
      }

      function getItem()
      {
        var created_at = $("#created_at").val();
        var expo_yn = $('input[name="expo_yn"]:checked').val();
        var subject = $("#subject").val();
        var content = $("#content").val();

        var item = {
          id: id,
          expo_yn: expo_yn,
          subject: subject,
          content: content,
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