<!DOCTYPE html>
<html lang="ko">
<head>

  @include('main.en.inc.meta',[
    "title" => "SHINSEGAE E&C"
    ])

</head>

<body class="en">
<div class="wrap">

  @include('main.en.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="etc-section etc04 section header-black">
      <div class="inner">
        <p class="sg-text-04">Service is <span class="ft-color">in preparation.</span></p>
        <p class="sg-text-07">This page is under preparation for better service.</p>
      </div>
    </div>
  </div>
  <!--: End #contents -->

  @include('main.en.inc.footer')

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
