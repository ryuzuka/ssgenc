{{-- 
  // 페이지명 : 메뉴 등록/수정
  // 설명 : 메뉴 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '관리자 관리',
      'subject' => '메뉴 등록/수정',
      'lang' => 'ko',
      'tab_no' => 3,
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
  $id = $item->menu_id;
  $expo_yn = $item->useflag;
}

@endphp

  <tr>
    <th scope="row">카테고리 <span>*</span></th>
    <td><input id="category" type="text" class="w760" placeholder="메뉴카테고리를 입력해 주세요." 
          @if(isset($item)) value="{{ $item->category }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">메뉴명 <span>*</span></th>
    <td><input id="menu_nm" type="text" class="w760" placeholder="메뉴명을 입력해 주세요." 
          @if(isset($item)) value="{{ $item->menu_nm }}" @endif>
    </td>
  </tr>  
  <tr>
    <th scope="row">메뉴url <span>*</span></th>
    <td><input id="url" type="text" class="w760" placeholder="메뉴url을 입력해 주세요." 
          @if(isset($item)) value="{{ $item->url }}" @endif>
    </td>
  </tr> 
  <tr>
    <th scope="row">메뉴 설명 <span>*</span></th>
    <td><textarea id="remark" rows="3" cols="5" placeholder="메뉴 설명을 입력해 주세요."
      >@if(isset($item)) {!! $item->remark !!} @endif</textarea></td>
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
      <li>최초작성 : <span>{{ $item->created_at }}</span></li>
      <li>최종수정 : <span>{{ $item->updated_at }}</span></li>
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
    setWorkId('menu');

    $( function() {

      function getItem()
      {
        var expo_yn = $('input[name="expo_yn"]:checked').val();
        var category = $("#category").val();
        var menu_nm = $("#menu_nm").val();
        var url = $("#url").val();
        var remark = $("#remark").val();

        var item = {
          id: id,
          useflag: expo_yn,
          category: category,
          menu_nm: menu_nm,
          url: url,
          remark: remark
        };

        return item;
      }

      function Add()
      {
        request(getItem(), null, null);
      }

      //등록버튼
      $( "#add" ).on('click', function(e){
        e.preventDefault();
        Add();
      });
      
    });

  </script>

@endpush
@endonce