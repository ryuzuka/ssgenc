{{-- 
  // 페이지명 : 위원회 운영내역 관리 목록
  // 설명 : 위원회 운영내역 관리 목록을 페이지 단위로 표시 한다.
--}}

@php

@endphp

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_list', [
      'title' => '게시판 관리',
      'subject' => '위원회 운영내역 관리 목록',
      'lang' => 'ko',
      'tab_no' => 1,
      'menu_no' => 1
  ])

{{-- 2) 검색 영역 --}}
@section('search_area')

  <tr>
    <th scope="row">검색</th>
    <td>
      <div class="select-input">

        {{-- 구분 --}}
        @include('includes.select', [
            'text' => '구분',
            'id_name' => 'commit_type',
            'items' => $items_commit_type,
            ])
  
        {{-- 검색어 --}}
        <input id="searchText" type="text" placeholder="검색어를 입력해주세요.">
  
      </div>
    </td>
  </tr>
  <tr>
    <th scope="row">등록일</th>
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
  <col style="width:13%;">
  <col style="width:13%;">
  <col style="width:47%;">
  <col style="width:8%;">
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
    <th scope="col">위원회명</th>
    <th scope="col">개최일자</th>
    <th scope="col">의안내용</th>
    <th scope="col">가결여부</th>
    <th scope="col">등록일</th>
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
      <td style="display: none;">{{ $item->id }}</td>
      <td>{{ $item->commit_type }}</td>
      <td>{{ $item->hold_at }}</td>
      <td>
        <a href="{{ url('/committee-detail?id='.$item->id) }}">
        {{ $item->subject }}
        </a>
      </td>
      <td>{{ $item->vote_st }}</td>
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
      var params = {
        page: page,
        commit_type: $("#commit_type").val(),
        from: $("#from").val(),
        to: $("#to").val(),
        searchText: $("#searchText").val()
      };      

      $(location).attr('href', "{{ url('/committee-list?') }}"+jQuery.param(params) );
    }

    function Add(id)
    {
      var params = {
        id: id
      }

      $(location).attr('href', "{{ url('/committee-detail?') }}"+jQuery.param(params) );
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
                var id = $(this).parents("td").next().text();
                arrId.push(id);
              }
            });

            Delete("{{ url('api/committee/deletes') }}", arrId);
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
            var id = $(this).parents("td").next().text();
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