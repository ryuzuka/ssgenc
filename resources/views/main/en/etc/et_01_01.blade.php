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
    <div class="etc-section etc01 section header-black">
      <div class="inner">
        <p class="sg-text-04"><span class="ft-light">We are sorry.</span><br>A <span class="ft-color">temporary system error</span> occurred.</p>
        <p class="sg-text-07">If the problem continues,please contact our service administrator.</p>
        <div class="btn-wrap">
          <button type="button" class="btn btn-primary"><span>Previous page</span></button>
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
