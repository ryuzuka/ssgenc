<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
    "title" => "신세계 건설"
    ])
</head>

<body>
<div class="wrap">

  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="etc-section etc04 section header-black">
      <div class="inner">
        <p class="sg-text-04"><span class="ft-color">접근 권한 오류 </span> 입니다.</p>
        <p class="sg-text-07">사용중인 아이디는 접근 권한이 허용되지 않습니다 관리자에게 문의 바랍니다.</p>
        <div class="btn-wrap">
          <button id="moveLogin" type="button" class="btn btn-primary"><span>로그인 페이지 이동</span></button>
        </div>
      </div>
    </div>
  </div>
  <!--: End #contents -->

  @include('main.ko.inc.footer')

</div>

<!-- common, plugins, app -->
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="/js/plugins.js"></script>
<script type="text/javascript" src="/js/index.js"></script>

<!-- components -->
<script>
  ($ => {

    $('#moveLogin').on('click', function(){
      window.location.href = "{{ url('login') }}";
    })

  })(window.jQuery)
</script>
</body>
</html>
