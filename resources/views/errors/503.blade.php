<!DOCTYPE html>
<html lang="ko">

@php

$lang = session('applocale');
if(!isset($lang))
{
  $lang = App::getLocale();
}

@endphp

<head>
  @include('main.ko.inc.meta',[
    "title" => "신세계 건설"
    ])
</head>

<body>
<div class="wrap">

  {{-- @include('main.ko.inc.header') --}}

  <!--: Start #contents -->
  <div class="contents">
    <div class="etc-section etc02 section header-black">
      <div class="inner">
        <p class="sg-text-04"><span class="ft-light">죄송합니다.</span><br><span class="ft-color">시스템 점검중</span> 입니다</p>
        <p class="sg-text-07">안정적인 서비스 제공을 위해 <br class="mobile-only">시스템 점검을 진행합니다</p>
        <div class="system-check">
          <em>시스템 점검시간</em>
          <span>{{ date("Y-m-d") }} (Day) ~ <br class="mobile-only">{{ date("Y-m-d") }} (Day)</span>
        </div>
      </div>
    </div>
  </div>
  <!--: End #contents -->

  {{-- @include('main.ko.inc.footer') --}}

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
