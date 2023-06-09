<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : IR문의"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content i-if04 section header-black">
      <div class="inner">
        <div class="sub-header">
          <h2 class="sg-text-06">IR문의</h2>
          <p class="sg-text-01">신세계건설 IR과 관련된<br>
            문의를 답변드리겠습니다.</p>
        </div>
        <div class="flex-box width-type">
          <div class="inner-cell">
            <h3 class="sg-text-04">Investor Relations</h3>
          </div>
          <div class="inner-cell">
            <p class="sg-text-09">신세계건설 IR과 관련된 문의는 아래 유선을 통해 연락주세요!</p>
            <span class="phone">02-3406-6662</span>
          </div>
        </div>
      </div>
    </div>
    <!--: End #contents -->

    @include('main.ko.inc.footer')
  </div>
</div>

  <!-- common, plugins, app -->
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/plugins.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <!-- components -->
  <script>
    ($ => {
      $.depth1Index = 3
      $.depth2Index = 3

    })(window.jQuery)
  </script>
</body>
</html>
