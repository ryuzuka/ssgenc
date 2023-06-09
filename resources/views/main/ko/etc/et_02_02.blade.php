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
        <p class="sg-text-04"><span class="ft-color">서비스 준비중</span> 입니다.</p>
        <p class="sg-text-07">해당페이지는 서비스 준비중입니다.</p>
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
