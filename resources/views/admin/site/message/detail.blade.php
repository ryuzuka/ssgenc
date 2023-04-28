{{-- 
  // 페이지명 : 메인 키비주얼/메세지 등록/수정
  // 설명 : 메인 키비주얼/메세지 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => '메인 키비주얼/메세지 등록/수정',
      'lang' => 'ko',
      'tab_no' => 2,
      'menu_no' => 0
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

$msg_acc = null;
$expo_yn = null;
$lang = 'ko'; //탭 선택에 따라 변경 됨.

if(isset($item))
{
  $id = $item->id;
  $msg_acc = $item->msg_acc;
  $expo_yn = $item->expo_yn;
}

// dd($item);

@endphp

{{-- 이곳에 탭이 있어야 함 => 국문, 영어 프로젝트 처럼 수정--}}

<ul class="tab">
  <li class="current"><a href="#">국문</a></li>
  <li><a href="#">영문</a></li>
</ul>

  <tr>

    {{-- 구좌 --}}
    @include('includes.radio', [
        'text' => '구좌 <span>*</span>',
        'id_name' => 'msg_acc',
        'items' => $items_msg_acc,
        'code_id' => $msg_acc
        ])

  </tr>
  <tr class="tab_ko">
    <th scope="row">키메세지(국문) <span>*</span></th>
    <td><input id="key_msg_ko" type="text" class="w760" placeholder="키메세지를 입력해 주세요." 
          @if(isset($item)) value="{{ $item->key_msg_ko }}" @endif>
    </td>
  </tr>
  <tr class="tab_en" style="display: none;">
    <th scope="row">키메세지(영문) <span>*</span></th>
    <td><input id="key_msg_en" type="text" class="w760" placeholder="키메세지를 입력해 주세요." 
          @if(isset($item)) value="{{ $item->key_msg_en }}" @endif>
    </td>
  </tr>  
  <tr class="tab_ko">
    <th scope="row">디스크립션(국문) <span>*</span></th>
    <td><textarea id="key_msg_desc_ko" rows="3" cols="5" placeholder="설명을 입력해 주세요."
      >@if(isset($item)) {!! $item->key_msg_desc_ko !!} @endif</textarea></td>
  </tr>
  <tr class="tab_en" style="display: none;">
    <th scope="row">디스크립션(영문) <span>*</span></th>
    <td><textarea id="key_msg_desc_en" rows="3" cols="5" placeholder="설명을 입력해 주세요."
      >@if(isset($item)) {!! $item->key_msg_desc_en !!} @endif</textarea></td>
  </tr>
  <tr>
    <th scope="row">링크 </th>
    <td>
      <div class="regist-text">

        <div class="area tab_ko">
          <span class="text fw">URL(국문)</span>
          <input id="url" type="text" class="w375" @if(isset($item)) value="{{ $item->url }}" @endif>
        </div>

        <div class="area tab_en" style="display: none;">
          <span class="text fw">URL(영문)</span>
          <input id="url_en" type="text" class="w375" @if(isset($item)) value="{{ $item->url_en }}" @endif>
        </div>

        <div class="area tab_ko">
          <span class="text">링크 텍스트(국문)</span>
          <input id="link_text_ko" type="text" class="w375" 
              @if(isset($item)) value="{{ $item->link_text_ko }}" @endif>
          <span class="text-info">20자 이내 등록 가능합니다.</span>
        </div>

        <div class="area tab_en" style="display: none;">
          <span class="text">링크 텍스트(영문)</span>
          <input id="link_text_en" type="text" class="w375" 
              @if(isset($item)) value="{{ $item->link_text_en }}" @endif>
          <span class="text-info">20자 이내 등록 가능합니다.</span>
        </div>

      </div>
    </td>
  </tr>
  <tr>
    <th scope="row">수치및넘버 1) </th>
    <td>
      <div class="regist-text">
        <div class="area tab_ko">
          <span class="text fw">수치및넘버(국문)</span>
          <input id="data_1_ko" type="text" class="w375" @if(isset($item)) value="{{ $item->data_1_ko }}" @endif>
        </div>

        <div class="area tab_en">
          <span class="text fw">수치및넘버(영문)</span>
          <input id="data_1_en" type="text" class="w375" @if(isset($item)) value="{{ $item->data_1_en }}" @endif>
        </div>

        <div class="area tab_ko">
          <span class="text">관련설명(국문)</span>
          <input id="desc_1_ko" type="text" class="w375" 
              @if(isset($item)) value="{{ $item->desc_1_ko }}" @endif>
          <span class="text-info">20자 이내 등록 가능합니다.</span>
        </div>

        <div class="area tab_en" style="display: none;">
          <span class="text">관련설명(영문)</span>
          <input id="desc_1_en" type="text" class="w375" 
              @if(isset($item)) value="{{ $item->desc_1_en }}" @endif>
          <span class="text-info">20자 이내 등록 가능합니다.</span>
        </div>

      </div>
    </td>
  </tr>
  <tr>
    <th scope="row">수치및넘버 2) </th>
    <td>
      <div class="regist-text">
        <div class="area tab_ko">
          <span class="text fw">수치및넘버(국문)</span>
          <input id="data_2_ko" type="text" class="w375" @if(isset($item)) value="{{ $item->data_2_ko }}" @endif>
        </div>

        <div class="area tab_en">
          <span class="text fw">수치및넘버(영문)</span>
          <input id="data_2_en" type="text" class="w375" @if(isset($item)) value="{{ $item->data_2_en }}" @endif>
        </div>

        <div class="area tab_ko">
          <span class="text">관련설명(국문)</span>
          <input id="desc_2_ko" type="text" class="w375" 
              @if(isset($item)) value="{{ $item->desc_2_ko }}" @endif>
          <span class="text-info">20자 이내 등록 가능합니다.</span>
        </div>

        <div class="area tab_en" style="display: none;">
          <span class="text">관련설명(영문)</span>
          <input id="desc_2_en" type="text" class="w375" 
              @if(isset($item)) value="{{ $item->desc_2_en }}" @endif>
          <span class="text-info">20자 이내 등록 가능합니다.</span>
        </div>

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
          switch($file->file_view_id)
          {
            case '#pc_image' : $pc_image = $file->file_nm; $pc_image_text = $file->file_text; break;
            case '#mo_image' : $mo_image = $file->file_nm; $mo_image_text = $file->file_text; break;
          }
        }
      }

    @endphp

    {{-- PC 이미지 타이틀 --}}
    @include('includes.file_image', [
        'text' => 'PC 이미지 <span>*</span>',
        'id_name' => 'pc_image',
        'file_desc' => '1810x843 권장 (등록 가능 확장자 : jpg, gif, png)',
        'file_nm' => $pc_image,
        'file_text' => $pc_image_text,
        'file_token' => $file_token
        ])

  </tr>
  <tr>

    {{-- MOBILE 이미지 --}}
    @include('includes.file_image', [
        'text' => 'MOBILE 이미지 <span>*</span>',
        'id_name' => 'mo_image',
        'file_desc' => '000*000 이미지를 등록해주세요. 등록 가능한 확장자 : jpg,gif,png',
        'file_nm' => $mo_image,
        'file_text' => $mo_image_text,
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
    setWorkId('message');

    $( function() {

      function getAttach()
      {
        var arrfiles = [
          "#pc_image"
          ,"#mo_image"
        ];
        
        return arrfiles;
      }

      function getItem()
      {
        var msg_acc = $('input[name="msg_acc"]:checked').val();
        var expo_yn = $('input[name="expo_yn"]:checked').val();
        var key_msg_ko = $("#key_msg_ko").val();
        var key_msg_en = $("#key_msg_en").val();
        var key_msg_desc_ko = $("#key_msg_desc_ko").val();
        var key_msg_desc_en = $("#key_msg_desc_en").val();
        var url = $("#url").val();
        var url_en = $("#url_en").val();
        var link_text_ko = $("#link_text_ko").val();
        var link_text_en = $("#link_text_en").val();
        var data_1_ko = $("#data_1_ko").val();
        var data_1_en = $("#data_1_en").val();
        var desc_1_ko = $("#desc_1_ko").val();
        var desc_1_en = $("#desc_1_en").val();
        var data_2_ko = $("#data_2_ko").val();
        var data_2_en = $("#data_2_en").val();
        var desc_2_ko = $("#desc_2_ko").val();
        var desc_2_en = $("#desc_2_en").val();

        var item = {
          id: id,
          msg_acc: msg_acc,
          expo_yn: expo_yn,
          key_msg_ko: key_msg_ko,
          key_msg_en: key_msg_en,
          key_msg_desc_ko: key_msg_desc_ko,
          key_msg_desc_en: key_msg_desc_en,
          url: url,
          url_en: url_en,
          link_text: link_text_ko,
          link_text: link_text_en,
          data_1_ko: data_1_ko,
          data_2_ko: data_2_ko,
          data_1_en: data_1_en,
          data_2_en: data_2_en,
          desc_1_ko: desc_1_ko,
          desc_2_ko: desc_2_ko,
          desc_1_en: desc_1_en,
          desc_2_en: desc_2_en
        };

        return item;
      }

      function Add(attach_id)
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

      //탭 처리
      $(".tab li a").on("click", function(){
        const num = $(".tab li a").index($(this));
        $(".tab li").removeClass("current");
        $('.tab li:eq(' + num + ')').addClass("current");

        if (num == 0)
        {
          $(".tab_ko").show();
          $(".tab_en").hide();
        }
        else
        {
          $(".tab_ko").hide();
          $(".tab_en").show();
        }
      });

    });

  </script>

@endpush
@endonce