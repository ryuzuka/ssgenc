{{-- 
  // 페이지명 : 고객상담 관리 목록
  // 설명 : 고객상담 관리 목록을 페이지 단위로 표시 한다.
--}}

@php
  
  // dd($items_type);
  $type = request()->type;
  $page_subject = ($type=='01')? '고객상담' : '제보';
  $side_menu_no = ($type=='01')? 9 : 10;

  $searchText = '';
  if (isset(request()->searchText))
  {
    $searchText = request()->searchText;
  }

  $gubun_arr_01 = [];
  $gubun_arr_02 = [];
  foreach ($items_gubun_01 as $it) {
    $gubun_arr_01[$it->code_id] = $it->code_nm;
  }
  
  foreach ($items_gubun_02 as $it) {
    $gubun_arr_02[$it->code_id] = $it->code_nm;
  }

  $gubun_01 = json_encode($gubun_arr_01, JSON_FORCE_OBJECT);
  $gubun_02 = json_encode($gubun_arr_02, JSON_FORCE_OBJECT);

@endphp

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_list', [
      'title' => '게시판 관리',
      'subject' => $page_subject . ' 관리 목록',   
      'lang' => 'ko',
      'tab_no' => 1,
      'menu_no' => $side_menu_no
  ])

{{-- 2) 검색 영역 --}}
@section('search_area')

  <tr>
    <th scope="row">검색</th>
    <td>
      <div class="select-input">

        {{-- 구분 --}}
        @include('includes.select', [
            'text' => '검색',
            'id_name' => 'gubun',
            'items' => $items_gubun_find
            ])

        {{-- 검색어 --}}
        <input id="searchText" type="text" value="{{ $searchText }}" placeholder="검색어를 입력해주세요.">

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
  <tr>

@endsection

{{-- 3) 레코드 총개수 / 검색된 개수 --}}
@section('list_count_area')

  <div class="search-total">총 <span>{{ $item_count }}</span>건 / 검색결과
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
  <col style="width:12%;">
  <col style="width:12%;">
  <col style="width:32%;">
  <col style="width:8%;">
  <col style="width:10%;">
  <col style="width:11%;">
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
    <th scope="col">문의번호</th>
    <th scope="col">유형</th>
    <th scope="col">구분</th>
    <th scope="col">제목</th>
    <th scope="col">@if($type=='01') 담당자 @else 실명여부 @endif</th>
    <th scope="col">@if($type=='01') 답변여부 @else 결과통보여부 @endif</th>
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
      <td>{{ $item->id }}</td>

      {{-- <td>{{ $item->type }}</td> --}}
      <td>
        <div class="select-box">
          <select class="select-type">
            @foreach ( $items_type as $it )

              @if ($it->code_id == $type)
                <option value="{{ $it->code_id }}" selected>{{ $it->code_nm }}</option>
              @else
                <option value="{{ $it->code_id }}">{{ $it->code_nm }}</option>
              @endif

            @endforeach
          </select>
        </div>
      </td>
      
      {{-- <td>{{ $item->gubun }}</td> --}}
      <td>
        <div class="select-box">
          <select class="select-gubun">
            @foreach ( $items_gubun as $it )

              @if ($it->code_id == $item->gubun)
                <option value="{{ $it->code_id }}" selected>{{ $it->code_nm }}</option>
              @else
                <option value="{{ $it->code_id }}">{{ $it->code_nm }}</option>
              @endif
            @endforeach
          </select>
        </div>
      </td>

      <td><a href="{{ url('/custom-detail?type='.$type.'&id='.$item->id) }}">{{ $item->subject }}</a></td>
      {{-- <td>@if($type=='01') {{ (isset($item->part_nm))? $item->part_nm : '' }} @else {{ (isset($item->name_yn))? $item->name_yn : '' }} @endif</td> --}}
      <td>@if($type=='01') CSR @else {{ (isset($item->name_yn))? $item->name_yn : '' }} @endif</td>
      <td>{{ (isset($item->reply_flag))? $item->reply_flag : '' }}</td>
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
      <button id="save" type="button" class="btn btn-secondary">저장</button>
      {{-- <button id="modify" type="button" class="btn btn-secondary">답변수정</button> --}}
      <button id="add_reply" type="button" class="btn btn-primary">답변등록/수정</button>
    </div>
  </div>

@endsection

{{-- 9) 스크립트 영역 --}}
@once
@push('srcipt_source')

<script>

  $(function(){

    var check_count = 0;
    var type = "{{ $type }}";

    var gubun_01 = <?php echo $gubun_01 ?>;
    var gubun_02 = <?php echo $gubun_02 ?>;

    function init()
    {
      $( "#from, #to" ).datepicker({ dateFormat: 'yy-mm-dd' });
      $("#searchText").val("{{ app('request')->input('searchText') }}");

      $( "#save" ).removeClass("btn-secondary");
      $( "#save" ).addClass("btn-primary");

      // $( "#add" ).removeClass("btn-secondary");
      // $( "#add" ).addClass("btn-primary");
    }

    var page = 1;

    //--------------------------------------------
    //기본 host url을 리턴한다.
    function getBaseUrl()
    {
      return "{{ url('/') }}";
    }

    //--------------------------------------------
    //지정된 업무id에 해당되는 url을 생성해서 리턴한다.
    function getUrl(key)
    {
      return getBaseUrl() + '/api/custsvc/' + key;
    }

    //고객상담 <-> 제보 변경 알림 메일
    function send_mail(item)
    {
      var params = {
        prev_type: item.prev_type,
        type: item.type, //이관되는 최종 타입(문의<->제보)
        gubun: item.gubun,
        receipt_id: item.id
      }

      com_utils.post(getUrl('sendmail-change'), params, function(res){
        if (res.code == '0000')
        {
        }
        else
        {
          var code = res.code;
          var message = res.message;
          if ( !com_utils.isEmpty(res.data) )
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
    }

    function Search(page)
    {
      // if($("#gubun").val() == '00')
      // {
      //   Vue.alert('구분을 선택해 주세요.');
      //   return;
      // }

      // var expo_yn = $('input[name="expo_yn"]:checked').val();
      var params = {
        page: page,
        type: type,
        gubun: $("#gubun").val(),
        from: $("#from").val(),
        to: $("#to").val(),
        searchText: $("#searchText").val()
      };      

      console.log('params ==> ' + JSON.stringify(params));

      $(location).attr('href', "{{ url('/custom-list?') }}"+jQuery.param(params) );
    }

    function Add(id)
    {
      var params = {
        id: id,
        type: type
      }

      $(location).attr('href', "{{ url('/custom-detail?') }}" + jQuery.param(params));
    }

    function Save(id, index, i, count, obj)
    {
      var ret = 0;
      var params = {
        id: id
      }

      //type 코드

      //변경전 타입을 보내고, 메일 전송 결정은 서버가 해야 한다.
      params.prev_type = type;

      var v_type = obj.next().find('option:selected').val();
      params.type = v_type;

      //gubun 코드
      var gubun = obj.next().next().find('option:selected').val();
      params.gubun = gubun;

      com_utils.post("{{ url('api/custsvc/save') }}", params, function(res){
          if (res.code == '0000')
          {
            if (i = count)
            {
              //메일 보내기
              send_mail(params);

              Vue.alert(res.message)
                .then((val)=>{
                  if (val == true)
                  {
                    window.location.reload();
                  }
              });
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
            ret = -1;
          }
      });

      return ret;
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

            Delete("{{ url('api/custsvc/deletes') }}", arrId);
          }
        })
        .catch(()=>{
        });
      }
    });

    $( "#save" ).on('click', function(e){
      e.preventDefault();
      var count = 0;
      var j = 0;
      $('input:checkbox').each(function(i)
      {
        if (this.checked)
        {
          count++;
        }
      });

      $('input:checkbox').each(function(i)
      {
        if (this.checked)
        {
          j++;
          var id = $(this).parents("td").next().text();
          Save(id, i, j, count, $(this).parents("td").next());
        }
      });
    });

    $( "#add_reply" ).on('click', function(e){
      e.preventDefault();
      if($(this).is(".btn-primary") === true)
      {
        var id = null;

        $('input:checkbox').each(function(i)
        {
          if (this.checked)
          {
            id = $(this).parents("td").next().text();
            Add(id);
          }
        });

        if (id == null)
        {
          Vue.alert('등록할 항목을 선택해 주세요.');
          return;
        }
      }
    });

    $(".select-box .select-type").on('click', function(e){
      e.preventDefault();
      var text = $(this).find('option:selected').text();
      var index = $(this).parent().parent().parent().index();

      $('input:checkbox').eq(index+1).prop('checked', true);

      if (text == '고객상담')
      {
        changeGubun(index, gubun_01);
      }
      else
      {
        changeGubun(index, gubun_02);
      }
    });

    $(".select-box .select-gubun").on('click', function(e){
      e.preventDefault();
      var index = $(this).parent().parent().parent().index();
      $('input:checkbox').eq(index+1).prop('checked', true);
    });

    //선택된 타입에 따라 구분을 변경해 준다.
    function changeGubun(index, gubun){
      var el = $("#list_item").find("tr").eq(index);
      el.find(".select-box .select-gubun option").remove();
      var it = el.find(".select-box .select-gubun");

      $.each(gubun, function(key, val){
        it.append("<option"+" value='"+key+"'>"+val+"</option>");
      });
    }    
  });

</script>

@endpush
@endonce