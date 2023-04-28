{{-- 
  // 페이지명 : 프로젝트 관리 목록
  // 설명 : 프로젝트 목록을 페이지 단위로 표시 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_list', [
      'title' => '프로젝트 목록',
      'lang' => 'ko',
      'tab_no' => 0,
      'menu_no' => 0
  ])

{{-- 2) 검색 영역 --}}
@section('search_area')

  {{-- 검색영역에 대한 드롭박스나 에디트 입력등등 --}}

@endsection

{{-- 3) 레코드 총개수 / 검색된 개수 --}}
@section('list_count_area')

  {{-- <div class="search-total">총 <span>{{ 전체개수 }}</span>건 / 검색결과
    <span>
      @if( isset(목록조회결과) ) 
        {{ 목록조회개수 }}
      @else
        0
      @endif
  </span>건</div> --}}

@endsection

{{-- 4) 목록 타이틀 스타일 영역 --}}
@section('column_style')

  {{-- 타이틀 간격 및 스타일 --}}

@endsection

{{-- 5) 목록 타이틀 영역 --}}
@section('column_title')

  {{-- 목록 타이틀 --}}

@endsection

{{-- 6) 목록 데이터 영역 --}}
@section('column_data')

  {{-- 목록 데이터 렌더링 --}}

@endsection

{{-- 7) 페이지네이션 --}}
@section('pagenation_area')

  {{-- @include('includes.paginate', ['paginator' => $projects]) --}}

@endsection

{{-- 8) 기능버튼 영역 --}}
@section('button_area')

  {{-- 하단 기능 버튼 영역 --}}

@endsection

{{-- 9) 스크립트 영역 --}}
@push('srcipt_source')

<script>

  $(function(){


  });

</script>

@endpush