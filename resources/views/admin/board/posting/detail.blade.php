{{-- 
  // 페이지명 : 공시 등록/수정
  // 설명 : 공시 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => '공시 등록/수정',
      'lang' => 'ko',
      'tab_no' => 1,
      'menu_no' => 4
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;
$gubun = null;
$expo_yn = null;

if(isset($item))
{
  $id = $item->id;
  $gubun = $item->gubun;
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

    {{-- 구분 --}}
    @include('includes.radio', [
        'text' => '구분 <span>*</span>',
        'must_check' => true,
        'id_name' => 'gubun',
        'items' => $items_gubun,
        'code_id' => $gubun
        ])

  </tr>
  <tr>

    @php

      $att_name = null;
      
      if ( isset($files) )
      {
        foreach($files as $file)
        {
          switch($file['file_view_id'])
          {
            case '#file_attach':
                  $att_name .= $file['file_nm'];
                  $att_name .= ',';
                  break;
          }
        }

        //맨뒤 , 제거
        $att_name = substr( $att_name, 0, -1);
      }

    @endphp

    {{-- 첨부파일 등록 --}}
    @include('includes.file_attach', [
        'text' => '첨부파일 등록',
        'id_name' => 'file_attach',
        'multiple' => false,
        'file_desc' => '(등록 가능 확장자 : pdf)',
        'file_nm' => $att_name
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
    setWorkId('posting');

    $( function() {

      function getAttach()
      {
        return '#file_attach';
      }

      function getItem()
      {
        var created_at = $("#created_at").val();
        var gubun = $('input[name="gubun"]:checked').val();
        var expo_yn = $('input[name="expo_yn"]:checked').val();
        var subject = $("#subject").val();

        var item = {
          id: id,
          gubun: gubun,
          expo_yn: expo_yn,
          subject: subject,
          created_at: created_at
        };

        return item;
      }

      function Add()
      {
        request(getItem(), null, getAttach());
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