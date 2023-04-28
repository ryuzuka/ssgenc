{{-- 
  // 페이지명 : 부서 등록/수정
  // 설명 : 부서 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '관리자 관리',
      'subject' => '부서 등록/수정',
      'lang' => 'ko',
      'tab_no' => 3,
      'menu_no' => 2
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

$state = null;
$lang = 'ko'; //탭 선택에 따라 변경 됨.

if(isset($item))
{
  $id = $item->part_id;
  $expo_yn = $item->useflag;
}

@endphp

  <tr>
    <th scope="row">부서명 <span>*</span></th>
    <td><input id="part_nm" type="text" class="w760" placeholder="부서명을 입력해 주세요." 
          @if(isset($item)) value="{{ $item->part_nm }}" @endif>
    </td>
  </tr>  
  <tr>
    <th scope="row">비고 <span>*</span></th>
    <td><textarea id="remark" rows="3" cols="5" placeholder="비고를 입력해 주세요."
      >@if(isset($item)){{ $item->remark }}@endif</textarea></td>
  </tr>
  <tr>

    {{-- 사용여부 --}}
    @include('includes.radio', [
        'text' => '사용여부 <span>*</span>',
        'must_check' => true,
        'id_name' => 'state',
        'items' => $items_state,
        'code_id' => $state
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
    setWorkId('part');

    $( function() {

      function getItem()
      {
        var state = $('input[name="state"]:checked').val();
        var part_nm = $("#part_nm").val();
        var remark = $("#remark").val();

        var item = {
          id: id,
          useflag: state,
          part_nm: part_nm,
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