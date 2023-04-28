{{-- 
  // 페이지명 : 관리자 관리 목록
  // 설명 : 관리자 관리 목록을 페이지 단위로 표시 한다.
--}}

@php

@endphp

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_list', [
      'title' => '관리자 관리',
      'subject' => '관리자 관리 목록',   
      'lang' => 'ko',
      'tab_no' => 3,
      'menu_no' => 0
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
  <col style="width:15%;">
  <col style="width:15%;">
  <col style="width:15%;">
  <col style="width:15%;">
  <col style="width:13%;">
  <col style="width:13%;">
</colgroup>

@endsection

{{-- 5) 목록 타이틀 영역 --}}
@section('column_title')

  <tr>
    <th scope="col">
    <div class="check-box">
        <input id="checkAll" type="checkbox">
    </div>
    </th>
    <th scope="col">번호</th>
    <th scope="col">이름</th>
    <th scope="col">아이디</th>
    <th scope="col">소속</th>
    <th scope="col">접속메뉴</th>
    <th scope="col">접속IP</th>
    <th scope="col">로그인일시</th>
  </tr>

@endsection

{{-- 6) 목록 데이터 영역 --}}
@section('column_data')

  @if( isset($items) )

    @foreach($items as $item)

    <tr>
      <td>
      <div class="check-box">
          <input type="checkbox">
      </div>
      </td>
      <td>{{($items->currentPage() - 1) * $items->perPage() + $loop->iteration}}</td>
      <td>
        <a href="{{ url('/user-detail?id='.$item->user_id) }}">
        {{ $item->name }}
        </a>
      </td>
      <td>
        <a href="{{ url('/user-detail?id='.$item->user_id) }}">
        {{ $item->user_id }}
        </a>
      </td>
      <td>{{ $item->part_nm }}</td>
      <td>{{ $item->menu_nm }}</td>
      <td>{{ $item->login_ip }}</td>
      <td>{{ $item->login_at }}</td>
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
    <div class="left">
        <button id="delete" type="button" class="btn btn-secondary">삭제</button>
    </div>
    <div class="right">
      <button id="modify" type="button" class="btn btn-secondary">수정</button>
      <button id="add" type="button" class="btn btn-primary">등록</button>
    </div>
  </div>

@endsection

{{-- 9) 스크립트 영역 --}}
@once
@push('srcipt_source')

<script>

  $(function(){

    var check_count = 0;

    function init()
    {
      $( "#from, #to" ).datepicker({ dateFormat: 'yy-mm-dd' });
      $("#searchText").val("{{ app('request')->input('searchText') }}");
    }

    var page = 1;

    function Search(page)
    {

      // var expo_yn = $('input[name="expo_yn"]:checked').val();
      var params = {
        page: page,
        user_find_key: $("#user_find_key").val(),
        from: $("#from").val(),
        to: $("#to").val(),
        // expo_yn: expo_yn,
        searchText: $("#searchText").val()
      };      

      console.log('params ==> ' + JSON.stringify(params));

      $(location).attr('href', "{{ url('/user-list?') }}"+jQuery.param(params) );
    }

    function Add(id)
    {
      var params = {
        id: id
      }

      $(location).attr('href', "{{ url('/user-detail?') }}"+jQuery.param(params) );
    }

    init();

    $( "#search" ).on('click', function(e)
    {
      e.preventDefault();
      Search(1);
    });
          
    $( "#delete" ).on('click', function(e){
      e.preventDefault();
      if($(this).is(".btn-primary") === true)
      {
        Vue.confirm('선택한 항목을 삭제하시겠습니까?').then((val)=>{
          if (val == true)
          {
            var arrId = [];

            $('input:checkbox').each(function(i)
            {
              if (this.checked)
              {
                var id = $(this).parents("td").next().next().next().text();
                arrId.push(id);
              }
            });

            Delete("{{ url('api/user/deletes') }}", arrId);
          }
        })
        .catch(()=>{
        });
      }
    });

    $( "#modify" ).on('click', function(e){
      e.preventDefault();
      if($(this).is(".btn-primary") === true)
      {
        $('input:checkbox').each(function(i)
        {
          if (this.checked)
          {
            var id = $(this).parents("td").next().next().next().text();
            console.log('id => ' + id);
            Add(id);
          }
        });
      }
    });

    $( "#add" ).on('click', function(e){
      e.preventDefault();
      if($(this).is(".btn-primary") === true)
      {
        //여긴 상세로 이동해야 함.
        Add(null);
      }
    });
  });

</script>

@endpush
@endonce