{{--
  // 페이지명 : 로그 관리 목록
  // 설명 : 로그 관리 목록을 페이지 단위로 표시 한다.
--}}

@php

@endphp

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_list', [
      'title' => '관리자 관리',
      'subject' => '로그 관리 목록',
      'lang' => 'ko',
      'tab_no' => 3,
      'menu_no' => 1
  ])

{{-- 2) 검색 영역 --}}
@section('search_area')

  <tr>
    <th scope="row">검색</th>
    <td>
      <div class="select-input">

        {{-- 검색 --}}
        @include('includes.select', [
            'text' => '검색',
            'id_name' => 'user_find_key',
            'items' => $items_user_find_key
            ])

        {{-- 검색어 --}}
        <input id="searchText" type="text" placeholder="검색어를 입력해주세요." value="{{ app('request')->input('searchText') }}">

      </div>
    </td>

  </tr>
  <tr>
    <th scope="row">기간</th>
    <td>
      <div class="datepicker-box">
        <div id="fromBox" class="date-box">

          @if (isset($items))
            <input id="from" type="text" value="{{ app('request')->input('from') }}">
          @else
            <input id="from" type="text" value={{ now() }}>
          @endif

        </div>
        ~
        <div id="toBox" class="date-box">

          @if (isset($items))
            <input id="to" type="text" value="{{ app('request')->input('to') }}">
          @else
            <input id="to" type="text" value={{ now() }}>
          @endif

        </div>
      </div>
    </td>
  </tr>

@endsection

{{-- 3) 레코드 총개수 / 검색된 개수 --}}
@section('list_count_area')

  <div class="search-total">총 <span>{{ $items_count }}</span>건 / 검색결과
    <span>
      @if( isset($items) )
        {{ $items->total() }}
      @else
        0
      @endif
  </span>건</div>

@endsection

{{-- 4) 목록 타이틀 스타일 영역 --}}
@section('column_style')

<colgroup>
  <col style="width:6%;">
  <col style="width:8%;">
  <col style="width:8%;">
  <col style="width:8%;">
  <col style="width:8%;">

  <col style="width:5%;">
  <col style="">
  <col style="width:10%;">
  <col style="width:20%;">
</colgroup>

@endsection

{{-- 5) 목록 타이틀 영역 --}}
@section('column_title')

  <tr>
    <th scope="col">번호</th>
    <th scope="col">이름</th>
    <th scope="col">아이디</th>
    <th scope="col">소속</th>
    <th scope="col">메뉴기능</th>

    <th scope="col">ID</th>
    <th scope="col">접속메뉴</th>
    <th scope="col">접속IP</th>
    <th scope="col">등록일자</th>
  </tr>

@endsection

{{-- 6) 목록 데이터 영역 --}}
@section('column_data')

  @if( isset($items) )

    @foreach($items as $item)

    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->user_id }}</td>
      <td>{{ (isset($item->part_nm))?$item->part_nm:'' }}</td>
      <td>{{ $item->menu_act }}</td>

      <td>{{ $item->ref_id }}</td>
      <td>{{ (isset($item->org_menu_nm))?$item->org_menu_nm:'' }}</td>
      <td>{{ $item->login_ip }}</td>
      <td>{{ $item->created_at }}</td>
    </tr>

    @endforeach

  @endif

@endsection

{{-- 7) 페이지네이션 --}}
@section('pagenation_area')

  @include('includes.paginate', ['paginator' => $items])

@endsection

{{-- 8) 기능버튼 영역 --}}
@section('button_area')

  <div class="btn-wrap">
    <div class="right">
      <button id="download" type="button" class="btn btn-primary">다운로드</button>
    </div>
  </div>

@endsection

{{-- 9) 스크립트 영역 --}}
@once
@push('srcipt_source')

<script>

  $(function(){

    function init()
    {
      $( "#from, #to" ).datepicker({ dateFormat: 'yy-mm-dd' });
      $("#searchText").val("{{ app('request')->input('searchText') }}");
    }

    var page = 1;

    function Search(page)
    {
      var params = {
        page: page,
        user_find_key: $("#user_find_key").val(),
        from: $("#from").val(),
        to: $("#to").val(),
        searchText: $("#searchText").val()
      };

      // console.log('params ==> ' + JSON.stringify(params));

      $(location).attr('href', "{{ url('/loginmenu-list?') }}"+jQuery.param(params) );
    }

    function download()
    {
      var params = {
        from: $("#from").val(),
        to: $("#to").val(),
        user_find_key: $("#user_find_key").val(),
        searchText: $("#searchText").val()
      };

      $.ajax({
        url: "{{ url('/api/loginmenu/log-download') }}",
        type: "GET",
        data: params,
        contentType:"application/json",
        success:function(res){
    	    //console.log(res);
          $(location).attr('href', res.url );
        }
      });
    }

    init();

    $( "#search" ).on('click', function(e)
    {
      e.preventDefault();
      Search(1);
    });

    $( "#download" ).on('click', function(e){
      e.preventDefault();
      download();
    });
  });

</script>

@endpush
@endonce
