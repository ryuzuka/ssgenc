{{-- 
  // 페이지명 : 메인 공지 등록/수정
  // 설명 : 메인 공지 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => '메인 공지 등록/수정',
      'lang' => 'ko',
      'tab_no' => 2,
      'menu_no' => 3
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

$expo_yn = null;
$lang = 'ko'; //탭 선택에 따라 변경 됨.

if(isset($item))
{
  $id = $item->id;
  $expo_yn = $item->expo_yn;
}

// dd($item);

@endphp

{{-- 이곳에 탭이 있어야 함 => 국문, 영어 프로젝트 처럼 수정--}}

{{-- <ul class="tab">
  <li class="current"><a href="#">국문</a></li>
  <li><a href="#">영문</a></li>
</ul> --}}

  <tr class="tab_ko">
    <th scope="row">제목 <span>*</span></th>
    <td><input id="subject_ko" type="text" class="w760" placeholder="한글제목을 입력해 주세요." 
          @if(isset($item)) value="{{ $item->subject_ko }}" @endif>
    </td>
  </tr>

  <tr class="tab_en" style="display: none;">
    <th scope="row">제목(영문) <span>*</span></th>
    <td><input id="subject_en" type="text" class="w760" placeholder="영문제목을 입력해 주세요." 
          @if(isset($item)) value="{{ $item->subject_en }}" @endif>
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

    setId(id);
    setWorkId('mainnotice');

    $( function() {

      function getItem()
      {
        var expo_yn = $('input[name="expo_yn"]:checked').val();
        var subject_ko = $("#subject_ko").val();
        var subject_en = $("#subject_en").val();
        var url = $("#url").val();
        var link_text_ko = $("#link_text_ko").val();
        var link_text_en = $("#link_text_en").val();

        var item = {
          id: id,
          expo_yn: expo_yn,
          subject_ko: subject_ko,
          subject_en: subject_en,
          url: url,
          link_text_ko: link_text_ko,
          link_text_en: link_text_en
        };

        return item;
      }

      function Add()
      {
        request(getItem(), null, null);
      }

      // datepicker
      $( "#created_at" ).datepicker({ dateFormat: 'yy-mm-dd' });

      //등록버튼
      $( "#add" ).on('click', function(e){
        e.preventDefault();
        Add();
      });

      //탭 처리 => 공지사항은 영문이 없으므로 제외 됨(2022-05-20)
      /*
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
      */

    });

  </script>

@endpush
@endonce