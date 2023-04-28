{{-- 
  // 페이지명 : 고객상담, 제보 답변 등록/수정
  // 설명 : 고객상담, 제보 답변 등록/수정을 한다.
--}}

@php
  
  $type = request()->type;
  $page_subject = ($type=='01')? '고객상담' : '제보';
  $side_menu_no = ($type=='01')? 9 : 10;

  $id = null;
  $gubun = null;
  $writer_part = null;

  if(isset($item_quest))
  {
    $id = $item_quest->id;
  }

  if (isset($item_quest))
  {
    foreach ($items_gubun as $item)
    {
      if ($item->code_id == $item_quest->gubun)
      {
        $gubun = $item->code_nm;
      }
    }
  }
  else
  {
    $gubun = $items_gubun[0]->code_nm;
  }

  if ($type == '01')
  {
    $writer_part = $item_quest->part_nm;
  }
  else
  {
    if(isset($customer))
    {
      //dd($customer);
      switch($customer->company_cd)
      {
        default:
        case '01': $writer_part = '신세계건설 협력회사'; break;
        case '02': $writer_part = '신세계건설 임직원'; break;
        case '03': $writer_part = '기타'; break;
      }
    }
  }

  $file_attach_r_1 = ''; $file_path_r_1 = '';
  $file_attach_r_2 = ''; $file_path_r_2 = '';
  $file_attach_r_3 = ''; $file_path_r_3 = '';
  $file_attach_r_4 = ''; $file_path_r_4 = '';
  $file_attach_r_5 = ''; $file_path_r_5 = '';

  if ( isset($files_reply) )
  {
    foreach($files_reply as $file)
    {
      switch($file['file_view_id'])
      {
        case '#file_attach_r_1' : $file_attach_r_1 = $file['file_nm']; $file_path_r_1 = $file['file_path']; break;
        case '#file_attach_r_2' : $file_attach_r_2 = $file['file_nm']; $file_path_r_2 = $file['file_path']; break;
        case '#file_attach_r_3' : $file_attach_r_3 = $file['file_nm']; $file_path_r_3 = $file['file_path']; break;
        case '#file_attach_r_4' : $file_attach_r_4 = $file['file_nm']; $file_path_r_4 = $file['file_path']; break;
        case '#file_attach_r_5' : $file_attach_r_5 = $file['file_nm']; $file_path_r_5 = $file['file_path']; break;
      }
    }
  }

@endphp

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '게시판 관리',
      'subject' => $page_subject.' 답변 등록/수정',
      'lang' => 'ko',
      'tab_no' => 1,
      'menu_no' => $side_menu_no
  ])

{{-- 2) contents 영역 --}}
@section('contents')

  {{-- 고객상담 --}}
  @if ($type == '01')

    <tr>
      <th scope="row">상담자 정보</th>
      <td>
        <div class="view-box">
          <ul>
            <li>구분 : <span>{{ $gubun }}</span></li>
            <li>작성자 : <span>{{ (isset($customer->cust_nm))?$customer->cust_nm:'' }}</span></li>
            <li>E-mail : <span>{{ (isset($customer->email))?$customer->email:'' }}</span></li>
            <li>휴대폰 : <span>{{ (isset($customer->mobile))?$customer->mobile:'' }}</span></li>
            <li>답변 회신 여부 : <span>{{ (isset($item_quest->reply_yn) && $item_quest->reply_yn=='Y')?'필요':'불필요' }}</span></li>
          </ul>
        </div>
      </td>
    </tr>

    @if (isset($item_quest) && $item_quest->gubun == '03')

      <tr>
        <th scope="row">사업 개요</th>
        <td>
          <div class="view-box">
            <ul>
              <li>공사위치(주소) : <span>{{ (isset($item_quest->address))?$item_quest->address:'' }}</span></li>
              <li>지역지구 : <span>{{ (isset($item_quest->gu))?$item_quest->gu:'' }}</span></li>
              <li>용도 : <span>{{ $item_quest->usage }}</span></li>
              <li>연면적 : <span> {{ (isset($item_quest->gfa))? $item_quest->gfa:'' }} ㎡</span></li>
              <li>지상층수 : <span>@if(isset($item_quest->floors_no)){{ $item_quest->floors_no }}@endif</span></li>
              <li>세대수 : <span>{{ $item_quest->household }}</span></li>
              <li>대지면적 : <span>{{ (isset($item_quest->land_area))?$item_quest->land_area:'' }} ㎡</span></li>
              <li>지하층수 : <span>{{ $item_quest->basement_no }}</span></li>
              <li>도급액 : <span>{{ $item_quest->contract_amt }}</span></li>
            </ul>
          </div>
        </td>
      </tr>

    @endif

    <tr>
      <th scope="row">상담 내용</th>
      <td>
        <div class="view-box">
          <ul>
            <li>상담번호 : <span>{{ (isset($item_quest->id))?$item_quest->id:'' }}</span></li>
            <li>등록일자 : <span>{{ (isset($item_quest->created_at))?$item_quest->created_at:'' }}</span></li>
            <li>제목 : <span>{{ (isset($item_quest->subject))?$item_quest->subject:'' }}</span></li>
            <li>내용 : <span><br>{!! (isset($item_quest->content))?$item_quest->content:'' !!}</span></li>
            <li>첨부파일 : 

              @for($i=0; $i<$file_quest_count; $i++)

                <br>
                <a href="{{ $item_quest["file_attach".($i+1)] }}" class="file" download="{{ $item_quest["file_nm".($i+1)] }}">
                  {{ $item_quest["file_nm".($i+1)] }}
                </a>

              @endfor

          </li>
          </ul>
        </div>
      </td>
    </tr>
    <tr>
  
  @else {{-- 제보 --}}

      <tr>
        <th scope="row">작성자 정보</th>
        <td>
          <div class="view-box">
            <ul>
              <li>작성자 : <span>{{ (isset($customer->cust_nm))?$customer->cust_nm:'' }} [{{ ($item_quest->name_yn=='Y')? '실명' : '익명' }}]</span></li>
              <li>작성자소속 : <span>{{ $writer_part }}</span></li>
              <li>휴대폰 : <span>{{ (isset($customer->mobile))?$customer->mobile:'' }}</span></li>
              <li>E-mail : <span>{{ (isset($customer->email))?$customer->email:'' }}</span></li>
            </ul>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">제보 내용</th>
        <td>
          <div class="view-box">
            <ul>
              <li>제보번호 : <span>{{ (isset($item_quest->id))?$item_quest->id:'' }}</span></li>
              <li>등록일자 : <span>{{ (isset($item_quest->created_at))?$item_quest->created_at:'' }}</span></li>
              <li>제보대상자 : <span>{{ (isset($item_quest->accuser_nm))?$item_quest->accuser_nm:'' }}</span> {{ isset($customer->part_nm)?ᅵ: '' }} <span>{{ (isset($customer->part_nm))?$customer->part_nm:'' }}</span></li>
              <li>구분 : <span>{{ $gubun_text }}</span></li>
              <li>제목 : <span>{{ (isset($item_quest->subject))?$item_quest->subject:'' }}</span></li>
              <li>내용 : <span><br>{!! (isset($item_quest->content))?$item_quest->content:'' !!}</span></li>
              <li>결과통보 : <span>{{ (isset($item_quest->reply_yn))?(($item_quest->reply_yn=='Y')?'필요':'불필요'):'' }}</span></li>
              <li>첨부파일 : 

                  @for($i=0; $i<$file_quest_count; $i++)

                    <br>
                    <a href="{{ $item_quest["file_attach".($i+1)] }}" class="file" download="{{ $item_quest["file_nm".($i+1)] }}">
                      {{ $item_quest["file_nm".($i+1)] }}
                    </a>

                  @endfor

              </li>
            </ul>
          </div>
        </td>
      </tr>

  @endif

  <tr>
    <th scope="row">답변제목 <span>*</span></th>
    <td><input id="subject" type="text" class="w760" placeholder="답변제목을 입력해 주세요. 불필요 체크시 불필요 사유를 적어주세요." 
      @if(isset($item_reply)) value="{{ $item_reply->subject }}" @endif>
    </td>
  </tr>
  <tr>
    <th scope="row">답변 내용 <span>*</span></th>
    <td>
      <textarea id="content" rows="3" cols="5" placeholder="답변내용을 입력해 주세요. 불필요 체크시 불필요 사유를 적어주세요."
      >{{ ( isset($item_reply) )? $item_reply->content : '' }}</textarea>
    </td>
  </tr>

  <tr>

    {{-- 답변여부/결과통보여부 --}}
    @include('includes.radio', [
        'text' => (($type=='01')?'답변여부':'결과통보여부'). ' <span>*</span>',
        'must_check' => true,
        'id_name' => 'reply_flag',
        'items' => $items_reply_flag,
        'code_id' => ( isset($item_quest) )?$item_quest->reply_flag:'02'
        ])

  </tr>

  <tr>

    {{-- 첨부파일 등록 --}}
    @include('includes.file_attach', [
        'text' => '첨부파일(최대 50MB)<span>*</span>',
        'multiple' => false,
        'id_name' => 'file_attach_r_1',
        'file_desc' => 'png, jpg, jpeg, gif, pdf',
        'file_nm' => $file_attach_r_1,
        'file_path' => $file_path_r_1
        ])

  </tr>

  <tr>

    @include('includes.file_attach', [
      'text' => '',
      'multiple' => false,
      'id_name' => 'file_attach_r_2',
      'file_desc' => 'png, jpg, jpeg, gif, pdf',
      'file_nm' => $file_attach_r_2,
      'file_path' => $file_path_r_2
      ])

  </tr>

  <tr>

    @include('includes.file_attach', [
      'text' => '',
      'multiple' => false,
      'id_name' => 'file_attach_r_3',
      'file_desc' => 'png, jpg, jpeg, gif, pdf',
      'file_nm' => $file_attach_r_3,
      'file_path' => $file_path_r_3
      ])

  </tr>

  <tr>

    @include('includes.file_attach', [
      'text' => '',
      'multiple' => false,
      'id_name' => 'file_attach_r_4',
      'file_desc' => 'png, jpg, jpeg, gif, pdf',
      'file_nm' => $file_attach_r_4,
      'file_path' => $file_path_r_4
      ])

  </tr>

  <tr>

    @include('includes.file_attach', [
      'text' => '',
      'multiple' => false,
      'id_name' => 'file_attach_r_5',
      'file_desc' => 'png, jpg, jpeg, gif, pdf',
      'file_nm' => $file_attach_r_5,
      'file_path' => $file_path_r_5
      ])

  </tr>

@endsection

{{-- 3) 기능버튼 영역 --}}
@section('button_area')

  <div class="btn-wrap">
    <div class="left">
      <button id="delete" type="button" class="btn btn-secondary">응답삭제</button>
      <button id="list" type="button" class="btn btn-primary">목록</button>
    </div>
    <div class="right">
      <button id="cancel" type="button" class="btn btn-secondary">취소</button>
      <button id="add" type="button" class="btn btn-primary">등록</button>
    </div>
  </div>

@endsection

{{-- 4) 수정이력 영역 --}}
@if (isset($item_reply))

@section('modify_history_area')

  <!-- 수정이력 -->
  <div class="modify-history">
    <em>수정이력</em>
    <ul>
      <li>최초작성 : <span>{{ $item_reply->created_id }}</span> <span>{{ $item_reply->created_at }}</span></li>
      <li>최종수정 : <span>{{ $item_reply->updated_id }}</span> <span>{{ $item_reply->updated_at }}</span></li>
    </ul>
  </div>
  <!-- // 수정이력 -->

@endsection

@endif

{{-- 5) 스크립트 영역 --}}
@once
@push('srcipt_source')
  
  <script>

  var type = "{{ $type }}";
  var id = "{{ $id }}";

    setId(id);
    setWorkId('custrply');

    $( function() {

      function getItem()
      {
        var subject = $("#subject").val();
        var content = $("#content").val();
        var reply_flag = $('input[name="reply_flag"]:checked').val();

        var item = {
          id: id,
          type: type,
          subject: subject,
          content: content,
          reply_flag: reply_flag
        };

        return item;
      }

      function getAttach()
      {
        var arrfiles = [
            "#file_attach_r_1"
          , "#file_attach_r_2"
          , "#file_attach_r_3"
          , "#file_attach_r_4"
          , "#file_attach_r_5"
        ];
        
        return arrfiles;
      }

      function Add()
      {
        request(getItem(), getAttach(), null);
      }

      // datepicker
      $( "#from, #to" ).datepicker({ dateFormat: 'yy-mm-dd' });

      //등록버튼
      $( "#add" ).on('click', function(e){
        e.preventDefault();
        Add();
      });

      //목록버튼   
      $( "#list" ).on('click', function(e){
          e.preventDefault();
          window.location.replace(document.referrer);
      });

      $('#file_attach_r_1_delete').on('click', function(){
        $('#file_attach_r_1').val('');
      })
      $('#file_attach_r_2_delete').on('click', function(){
        $('#file_attach_r_2').val('');
      })
      $('#file_attach_r_3_delete').on('click', function(){
        $('#file_attach_r_3').val('');
      })
      $('#file_attach_r_4_delete').on('click', function(){
        $('#file_attach_r_4').val('');
      })
      $('#file_attach_r_5_delete').on('click', function(){
        $('#file_attach_r_5').val('');
      })
      
      $('.file').on('click', function(){

        var item = {
            id: id,
            file_nm: $(this).text()
        }

        com_utils.post(getUrl('downloadAttach'), item, function(res){});

      })
    });

  </script>

@endpush
@endonce