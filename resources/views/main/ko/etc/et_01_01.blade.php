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
    <div class="etc-section etc01 section header-black">
      <div class="inner">
        <p class="sg-text-04"><span class="ft-light">죄송합니다.</span><br>시스템이상으로 <br class="mobile-only"><span class="ft-color">일시적인 오류</span>가 발생했습니다.</p>
        <p class="sg-text-07">오류가 지속될 경우, 해당 서비스 관리자에게 문의해 주시기 바랍니다.</p>
        <div class="btn-wrap">
          <button type="button" class="btn btn-primary"><span>이전페이지</span></button>
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
