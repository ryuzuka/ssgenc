<!DOCTYPE html>
<html lang="en">
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
    <div class="etc-section etc02 section header-black">
      <div class="inner">
        <p class="sg-text-04"><span class="ft-light">We are sorry.</span><br>The system is <span class="ft-color">under checking.</span></p>
        <p class="sg-text-07">The system is under checking for better service.</p>
        <div class="system-check">
          <em>System check time</em>
          <span>YYYY.MM.DDHH:MM (Day) ~ <br class="mobile-only">YYYY.MM.DDHH:MM (Day)</span>
        </div>
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
