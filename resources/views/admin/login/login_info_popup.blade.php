@include('includes.header', ['title' => '에러', 'lang' => 'ko'])

  <div class="wrap">
    <div class="layer-popup">
      <h1>최근 로그인 정보</h1>
      <div class="layer-content">
        <span class="cont">최근 로그인 일시 : <span>@if(isset($login_at)) {{ $login_at }} @endif</span><br>접속 IP : <span>@if(isset($login_ip)) {{ $login_ip }} @endif</span></span>
        <div class="btn-wrap">
          <button id="confirm" type="button" class="btn-primary">확인</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(function(){
      $('#confirm').on('click',function(e)
      {
          e.preventDefault();
          $(location).attr('href', "{{ url('main') }}");
      });
    })    
  </script>  

@include('includes.footer')
