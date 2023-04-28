{{-- 
  // 페이지명 : 관리자 소스 배포
  // 설명 : 관리자 관리 소스 배포를 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '관리자 관리',
      'subject' => '관리자 소스 배포',
      'lang' => 'ko',
      'tab_no' => 3,
      'menu_no' => 0
  ])

{{-- 2) contents 영역 --}}
@section('contents')

  <tr>

    {{-- 배포파일 등록(개발용 배포경로) --}}
    @include('includes.file_attach', [
        'text' => '배포파일 등록',
        'id_name' => 'file_attach',
        'file_desc' => '50MB미만으로 등록 가능합니다. (최대 3개까지 등록 권장)',
        'file_nm' => '배포파일명.zip'
        ])

  </tr>
  <tr>
    <th scope="row">배포파일등록 <span>*</span></th>
    <td>
      <div class="find-id">
        <input type="text" class="w375" readonly>
        <button id="dev_deploy" type="button" class="btn">업로드</button>
      </div>
    </td>
  </tr>    

@endsection

{{-- 3) 기능버튼 영역 --}}
@section('button_area')

  <div class="btn-wrap">
    <div class="left">
      <button id="cancel" type="button" class="btn btn-secondary">취소</button>
    </div>
  </div>

@endsection

{{-- 5) 스크립트 영역 --}}
@once
@push('srcipt_source')
  
  <script>

    $( function() {

      $( "#cancel" ).removeClass("btn-secondary");
      $( "#cancel" ).addClass("btn-primary");

      //취소버튼   
      $( "#cancel" ).on('click', function(e){
        e.preventDefault();
        // window.history.back();
        window.location.replace(document.referrer);
      });

      $("#dev_deploy").on('click', function(e){
        e.preventDefault();
        // Vue.alert(111);

        //전송할 파일 id를 배열로 등록 함.
        var files = [
          "#file_attach"
        ];

        //파일 존재여부 체크
        var file_count = 0;
        $.each(files, function(i, id){

          if (!com_utils.isEmpty($(id).val()))
          {
            file_count++;
          }
        });

        if (file_count == 0)
        {
          Vue.alert('업로드할 파일이 없습니다.');
          return;
        }

        com_utils.uploadMany(
          "{{ csrf_token() }}",
          "{{ url('/api/file/deploy') }}",
          files,
          ".wrap-loading",
          function(res){
            if (res != null)
            {
              if (res.code == '0000')
              {
                Vue.alert(res.message);
              }
              else
              {
                var code = res.code;
                var message = res.message;
                Vue.alert('['+code+'] '+message);
              }
            }
          }
        );
      });

    });

  </script>

@endpush
@endonce