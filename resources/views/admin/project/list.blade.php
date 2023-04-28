{{-- 
  // 페이지명 : 프로젝트 관리 목록
  // 설명 : 프로젝트 목록을 페이지 단위로 표시 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_list', [
      'title' => '프로젝트 관리',
      'subject' => '프로젝트 관리 목록',   
      'lang' => 'ko',
      'tab_no' => 0,
      'menu_no' => 0
  ])

{{-- 2) 검색 영역 --}}
@section('search_area')

  <tr>
    <th scope="row">구분</th>
    <td>

      {{-- 지역선택 --}}
      @include('includes.select', [
          'text' => '지역선택',
          'id_name' => 'area',
          // 'code_id' => app('request')->input('area'),
          'items' => $items_area
          ])

      {{-- 사업분야 --}}
      @include('includes.select', [
          'text' => '사업분야',
          'id_name' => 'biz_area',
          // 'code_id' => app('request')->input('biz_area'),
          'items' => $items_biz_area
          ])

      {{-- 구분 --}}
      @include('includes.select', [
          'text' => '구분',
          'id_name' => 'gubun',
          // 'code_id' => app('request')->input('gubun'),
          'items' => $items_gubun
          ])

    </td>
  </tr>
  <tr>
    <th scope="row">검색</th>
    <td><input id="searchText" type="text" placeholder="검색어를 입력해주세요."></td>
  </tr>  
  <tr>
    <th scope="row">프로젝트 기간</th>
    <td>
      <div class="datepicker-box">
        <div id="fromBox" class="date-box">

          @if (isset($projects))
            <input id="from" type="text" value="{{ app('request')->input('from') }}">
          @else  
            <input id="from" type="text" value={{ now() }}>
          @endif

        </div>
        ~
        <div id="toBox" class="date-box">

          @if (isset($projects))
            <input id="to" type="text" value="{{ app('request')->input('to') }}">
          @else  
            <input id="to" type="text" value={{ now() }}>
          @endif

        </div>
      </div>
    </td>
  </tr>
  <tr>

    {{-- 공개여부 --}}
    @include('includes.radio', [
        'text' => '공개여부',
        'id_name' => 'open_yn',
        'items' => $items_open_yn,
        ])

  </tr>

@endsection

{{-- 3) 레코드 총개수 / 검색된 개수 --}}
@section('list_count_area')

  <div class="search-total">총 <span>{{ $project_count }}</span>건 / 검색결과
    <span>
      @if( isset($projects) ) 
        {{ $projects->total() }}
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
  <col style="width:12%;">
  <col style="width:13%;">
  <col style="width:24%;">
  <col style="width:8%;">
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
    <th scope="col">번호</th>
    <th scope="col">지역</th>
    <th scope="col">사업분야</th>
    <th scope="col">구분</th>
    <th scope="col">프로젝트명</th>
    <th scope="col">상단 메인<br>지정여부</th>
    <th scope="col">노출여부</th>
    <th scope="col">등록일</th>
  </tr>

@endsection

{{-- 6) 목록 데이터 영역 --}}
@section('column_data')

  @if( isset($projects) )

    @foreach($projects as $data)

    <tr>
      <td>
      <div class="check-box">
          <input type="checkbox">
      </div>
      </td>
      <td>{{ $data->id }}</td>
      <td>{{ $data->area }}</td>
      <td>{{ $data->biz_area }}</td>
      <td>{{ $data->gubun }}</td>

      <td>
        <a href="{{ url('/project-detail?id='.$data->id) }}">
        {{ $data->name_ko }}
        </a>
      </td>

      <td>{{ $data->main_yn }}</td>
      <td>{{ $data->open_yn }}</td>
      <td>{{ $data->created_at }}</td>
    </tr>

    @endforeach

  @endif

@endsection

{{-- 7) 페이지네이션 --}}
@section('pagenation_area')

  @include('includes.paginate', ['paginator' => $projects])

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
    var page = 1;
    var open_yn = '01'

    function init()
    {
      $( "#from, #to" ).datepicker({ dateFormat: 'yy-mm-dd' });
      $("#searchText").val("{{ app('request')->input('searchText') }}");

      $('#open_yn input').on('change', function (e) {
        open_yn = $(this).val()
        $('#open_yn input').removeAttr('checked')
        $(this).attr('checked', true)
      })
    }

    function Search(page)
    {
      var params = {
        page: page,
        area: $("#area").val(),
        biz_area: $("#biz_area").val(),
        gubun: $("#gubun").val(),
        from: $("#from").val(),
        to: $("#to").val(),
        open_yn: open_yn,
        searchText: $("#searchText").val()
      };      

      console.log('params ==> ' + JSON.stringify(params));

      $(location).attr('href', "{{ url('/project-list?') }}"+jQuery.param(params) );
    }

    function Add(id)
    {
      var params = {
        id: id,
        biz_area: '02'  //디폴트 무조건 주거시설 선택 됨.
      }

      $(location).attr('href', "{{ url('/project-detail?') }}"+jQuery.param(params) );
    }

    init();

    $( "#search" ).on('click', function(e)
    {
      e.preventDefault();
      Search(1);
    });

    $( "#biz_area" ).on('change', function(e)
    {
      e.preventDefault();

      var params = {
        biz_area: $("#biz_area").val()
      };      

      com_utils.post("{{ url('api/project/getcode') }}", params, function(res){
        if (res.code == '0000')
        {
          //gubun에 다시 초기화 한다.
          // console.log(res.data);
          var items = res.data.items_gubun;
          $("#gubun").empty();
          for(var i = 0; i < items.length; i++)
          {                
              var option = $('<option>', {value: items[i].code_id, text: items[i].code_nm});
              $('#gubun').append(option);
          }
        }
        else{
          var code = res.code;
          var message = res.message;
          if (res.data != null)
          {
            //맨 첫 컬럼 내용만 보여 줌.
            Vue.alert('['+code+'] '+res.data[0]);
          }
          else
          {
            Vue.alert('['+code+'] '+message);
          }
        }
      });
    });

    $( "#delete" ).on('click', function(e){
      e.preventDefault();
      if($(this).is(".btn-primary") === true)
      {
        // Vue.alert('btn-primary');
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

            Delete("{{ url('api/project/deletes') }}", arrId);
          }
        })
        .catch(()=>{
          // console.log('cancel...');
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