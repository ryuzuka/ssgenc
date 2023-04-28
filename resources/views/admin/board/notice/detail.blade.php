{{-- 
  // 페이지명 : 뉴스&공지/영상 등록/수정
  // 설명 : 뉴스&공지/영상 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => '뉴스&공지/영상 등록/수정',
      'lang' => 'ko',
      'tab_no' => 1,
      'menu_no' => 2
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

$news_gubun = null;
$shortcut_expo_yn = null;
$expo_yn = null;
$main_yn = null;

if(isset($notice))
{
  $id = $notice->id;
  $news_gubun = $notice->news_gubun;
  $shortcut_expo_yn = $notice->shortcut_expo_yn;
  $expo_yn = $notice->expo_yn;
}

@endphp

  <tr>

    {{-- 구분 --}}
    @include('includes.radio', [
        'text' => '구분 <span>*</span>',
        'id_name' => 'news_gubun',
        'items' => $items_news_gubun,
        'code_id' => $news_gubun
        ])

  </tr>
  <tr>
    <th scope="row">제목 <span>*</span></th>
    <td><input id="subject" type="text" class="w760" placeholder="제목을 입력해 주세요." 
          @if(isset($notice)) value="{{ $notice->subject }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">내용 </th>
    <td><textarea id="content" rows="3" cols="5" placeholder="내용을 입력해 주세요."
      >@if(isset($notice)) {{ $notice->content }} @endif</textarea></td>
  </tr>
  <tr>

    @php

      $pc_image = null; 
      $pc_image_text = null; 
      $mo_image = null;
      $mo_image_text = null;
      $att_name = null;

      // dd($files);
      
      if ( isset($files) )
      {
        foreach($files as $file)
        {
          switch($file['file_view_id'])
          {
            case '#pc_image' :
                  $pc_image = $file['file_nm'];
                  $pc_image_text = $file['file_text'];
                  break;
            case '#mo_image' :
                  $mo_image = $file['file_nm'];
                  $mo_image_text = $file['file_text'];
                  break;
            case '#file_attach':
                  $att_name = $file['file_nm']; //한개만 등록 가능
                  break;
          }
        }
      }

    @endphp

    {{-- 상세 이미지 등록(PC) 타이틀 --}}
    @include('includes.file_image', [
        'text' => '상세 이미지등록(PC)',
        'id_name' => 'pc_image',
        'file_nm' => $pc_image,
        'file_text' => $pc_image_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 상세 이미지 등록(MO) #1 --}}
    @include('includes.file_image', [
        'text' => '상세 이미지 등록(MO)',
        'id_name' => 'mo_image',
        'file_nm' => $mo_image,
        'file_text' => $mo_image_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- 첨부파일 등록 --}}
    @include('includes.file_attach', [
        'text' => '첨부파일 등록',
        'id_name' => 'file_attach',
        'multiple' => false,
        'file_desc' => '50MB미만으로 등록 가능합니다. (최대 1개만 등록 가능)',
        'file_nm' => $att_name
        ])

  </tr>
  <tr>
    <th scope="row">바로가기 버튼 등록</th>
    <td>
      @include('includes.radio_part', [
        'must_check' => true,
        'id_name' => 'shortcut_expo_yn',
        'items' => $items_shortcut_expo_yn,
        'code_id' => $shortcut_expo_yn
        ])

      <div class="regist-text type">
        <div class="area">
          <span class="text">버튼명</span>
          <input id="shortcut_nm" type="text" class="w375">
          <span class="text-info">10자 이내 등록 가능합니다.</span>
        </div>
        <div class="area">
          <span class="text">URL</span>
          <input id="shortcut_url" type="text" class="w760">
        </div>
      </div>
    </td>
  </tr>
  <tr>
    <th scope="row">유튜브 URL </th>
    <td>
      <input id="youtube_url" type="text" class="w375">
    </td>
  </tr>
  <tr>
    <th scope="row">등록일 <span>*</span></th>
    <td>
      <div class="datepicker-box">
        <div class="date-box">
          <input id="created_at" type="text" class="datepicker"
          @if(isset($notice)) value={{ $notice->created_at }} @endif>
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
@if (isset($notice))

@section('modify_history_area')

  <!-- 수정이력 -->
  <div class="modify-history">
    <em>수정이력</em>
    <ul>
      <li>최초작성 : <span>{{ $notice->created_id }}</span> <span>{{ $notice->created_at }}</span></li>
      <li>최종수정 : <span>{{ $notice->updated_id }}</span> <span>{{ $notice->updated_at }}</span></li>
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
    var attach_id = {{ (isset($notice))?$notice->attach_id:0 }};

    setId(id);
    setAttachId(attach_id);
    setWorkId('notice');

    $( function() {

      function getImage()
      {
        var arrfiles = [
          "#pc_image",
          "#mo_image"
        ];
        
        return arrfiles;
      }

      function getAttach()
      {
        return '#file_attach';
      }

      function getItem()
      {
        var created_at = $("#created_at").val();
        var news_gubun = $('input[name="news_gubun"]:checked').val();
        var shortcut_expo_yn = $('input[name="shortcut_expo_yn"]:checked').val();
        var expo_yn = $('input[name="expo_yn"]:checked').val();
        var subject = $("#subject").val();
        var content = $("#content").val();
        var shortcut_nm = $("#shortcut_nm").val();
        var shortcut_url = $("#shortcut_url").val();
        var yourtube_url = $("#yourtube_url").val();

        var item = {
          id: id,
          news_gubun: news_gubun,
          created_at: created_at,
          shortcut_expo_yn: shortcut_expo_yn,
          expo_yn: expo_yn,
          subject: subject,
          content: content,
          shortcut_nm: shortcut_nm,
          shortcut_url: shortcut_url,
          yourtube_url: yourtube_url
        };

        return item;
      }
      
      function Add()
      {
        request(getItem(), getImage(), getAttach());
      }

      // datepicker
      $( "#created_at" ).datepicker({ dateFormat: 'yy-mm-dd' });

      //등록버튼
      $( "#add" ).on('click', function(e){
        e.preventDefault();
        Add();
      });

      // $("#pc_image_delete").on('click', function(e){
      //   e.preventDefault();
      //   Vue.alert('사진삭제...');
      // });

    });

  </script>

@endpush
@endonce