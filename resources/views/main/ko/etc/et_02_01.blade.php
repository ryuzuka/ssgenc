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
    <div class="etc-section etc03 section header-black">
      <div class="inner">
        <p class="sg-text-04"><span class="ft-normal">서비스이용에 불편을 드려 죄송합니다.</span><br>요청하신 페이지를 찾을 수 없습니다.</p>
        <p class="sg-text-07">방문 하시려는 페이지의 주소가 잘못 입력 되었거나<br>
          페이지의 주소가 변경 혹은 삭제 되어 <br class="mobile-only">페이지를 찾을 수 없습니다.<br>
          동일한 문제가 지속적으로 발생할 경우 <br class="mobile-only">고객상담실로 문의해 주시기 바랍니다.</p>
        <div class="btn-wrap">
          <button type="button" class="btn btn-primary"><span>이전페이지</span></button>
          <button type="button" class="btn btn-primary"><span>문의하기</span></button>
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
    $.depth1Index = -1
    $.depth2Index = -1

  })(window.jQuery)
</script>
</body>
</html>
