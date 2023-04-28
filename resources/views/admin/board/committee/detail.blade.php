{{-- 
  // 페이지명 : 위원회 진행사항 등록/수정
  // 설명 : 위원회 진행사항 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => '위원회 진행사항 등록/수정',
      'lang' => 'ko',
      'tab_no' => 1,
      'menu_no' => 1
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;

$vote_st = null;
$commit_type = null;

$dir_a_nm = null;
$dir_b_nm = null;
$dir_c_nm = null;
$dir_d_nm = null;

$dir_a_yn = null;
$dir_b_yn = null;
$dir_c_yn = null;
$dir_d_yn = null;

if(isset($item))
{
  $id = $item->id;

  $commit_type = $item->commit_type;
  $vote_st = $item->vote_st;

  $dir_a_nm = $item->dir_a_nm;
  $dir_b_nm = $item->dir_b_nm;
  $dir_c_nm = $item->dir_c_nm;
  $dir_d_nm = $item->dir_d_nm;

  $dir_a_yn = $item->dir_a_yn;
  $dir_b_yn = $item->dir_b_yn;
  $dir_c_yn = $item->dir_c_yn;
  $dir_d_yn = $item->dir_d_yn;
}

@endphp

  <tr>
    <th scope="row">위원회명 <span>*</span></th>
    <td>
      @include('includes.select', [
        'id_name' => 'commit_type',
        'items' => $items_commit_type,
        'code_id' => $commit_type
        ])
    </td>
  </tr>

  <tr>
    <th scope="row">의안내용 <span>*</span></th>
    <td><input id="subject" type="text" class="w760" placeholder="의안내용을 입력해 주세요." 
      @if(isset($item)) value="{{ $item->subject }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">개최일자 <span>*</span></th>
    <td>
      <div class="datepicker-box">
        <div class="date-box">
          <input id="hold_at" type="text" class="datepicker"
          @if(isset($item)) value="{{ $item->hold_at }}" @endif>
        </div>
    </td>
  </tr>
  <tr>
    <th scope="row">등록일자 <span>*</span></th>
    <td>
      <div class="datepicker-box">
        <div class="date-box">
          <input id="created_at" type="text" class="datepicker"
          @if(isset($item)) value="{{ $item->created_at }}" @endif>
        </div>
    </td>
  </tr>
  <tr>

    {{-- 가결여부 --}}
    @include('includes.radio', [
        'text' => '가결여부 <span>*</span>',
        'must_check' => true,
        'id_name' => 'vote_st',
        'items' => $items_vote_st,
        'code_id' => $vote_st
        ])

  </tr>

  <tr>
    <th scope="row">사내/사외이사a동의 성명 여부</th>
    <td>

        @include('includes.select', [
            'id_name' => 'dir_a_nm',
            'items' => $items_committee,
            'code_id' => $dir_a_nm
            ])
            
        @include('includes.radio_part', [
            'must_check' => true,
            'id_name' => 'dir_a_yn',
            'items' => $items_agree_yn,
            'code_id' => $dir_a_yn
            ])

    </td>
  </tr>

  <tr>
    <th scope="row">사내/사외이사b동의 성명 여부</th>
    <td>

        @include('includes.select', [
            'id_name' => 'dir_b_nm',
            'items' => $items_committee,
            'code_id' => $dir_b_nm
            ])
            
        @include('includes.radio_part', [
            'must_check' => true,
            'id_name' => 'dir_b_yn',
            'items' => $items_agree_yn,
            'code_id' => $dir_b_yn
            ])

    </td>
  </tr>

  <tr>
    <th scope="row">사내/사외이사c동의 성명 여부</th>
    <td>

        @include('includes.select', [
            'id_name' => 'dir_c_nm',
            'items' => $items_committee,
            'code_id' => $dir_c_nm
            ])
            
        @include('includes.radio_part', [
            'must_check' => true,
            'id_name' => 'dir_c_yn',
            'items' => $items_agree_yn,
            'code_id' => $dir_c_yn
            ])

    </td>
  </tr>

  <tr>
    <th scope="row">사내/사외이사d동의 성명 여부</th>
    <td>

        @include('includes.select', [
            'id_name' => 'dir_d_nm',
            'items' => $items_committee,
            'code_id' => $dir_d_nm
            ])
            
        @include('includes.radio_part', [
            'must_check' => true,
            'id_name' => 'dir_d_yn',
            'items' => $items_agree_yn,
            'code_id' => $dir_d_yn
            ])

    </td>
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

    setId(id);
    setWorkId('committee');

    $( function() {

      function getItem()
      {
        var hold_at = $("#hold_at").val();
        var created_at = $("#created_at").val();
        var vote_st = $('input[name="vote_st"]:checked').val();
        var subject = $("#subject").val();
        var commit_type = $("#commit_type").val();
        var dir_a_nm = $("select[name=dir_a_nm] option:selected").val();
        var dir_b_nm = $("select[name=dir_b_nm] option:selected").val();
        var dir_c_nm = $("select[name=dir_c_nm] option:selected").val();
        var dir_d_nm = $("select[name=dir_d_nm] option:selected").val();

        var dir_a_yn = $('input[name="dir_a_yn"]:checked').val();
        var dir_b_yn = $('input[name="dir_b_yn"]:checked').val();
        var dir_c_yn = $('input[name="dir_c_yn"]:checked').val();
        var dir_d_yn = $('input[name="dir_d_yn"]:checked').val();

        var item = {
          id: id,
          subject: subject,
          commit_type: commit_type,
          vote_st: vote_st,
          hold_at: hold_at,
          created_at: created_at,
          dir_a_nm: dir_a_nm,
          dir_b_nm: dir_b_nm,
          dir_c_nm: dir_c_nm,
          dir_d_nm: dir_d_nm,
          dir_a_yn: dir_a_yn,
          dir_b_yn: dir_b_yn,
          dir_c_yn: dir_c_yn,
          dir_d_yn: dir_d_yn
        };

        return item;
      }

      function Add()
      {
        request(getItem(), null, null);
      }

      // datepicker
      $( "#hold_at" ).datepicker({ dateFormat: 'yy-mm-dd' });
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