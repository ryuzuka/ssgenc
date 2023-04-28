<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : Result inquiry"
  ])  
</head>

<body class="en">
  <div class="wrap">
    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="visual csr section">
        <div class="text-box">
          <h2 class="sg-text-01">Result inquiry</h2>
          <p class="sg-text-05">Tell us your story for a better day</p>
        </div>
      </div>
      <div class="sub-content c-cr08 section header-black">
        <div class="inner">
          <h3 class="sg-text-03">Search your inquiry</h3>
          <div class="cr-inquiry">
            <div class="question">
              <span class="category">Consultation about the contracted order</span>
              <span class="subject">Description of your inquiry submitted (12345678)</span>
              <span class="state">Answer in progress</span>
              <div class="info">
                <span class="write">Hong Gil-Dong</span>
                <span class="date">Date of inquiry <span>00-00-00</span></span>
              </div>
            </div>
            <div class="inquiry-content">
              내용
              <div class="tbl">
                <dl class="address">
                  <dt><span>Worksite</span></dt>
                  <dd><span>Address</span></dd>
                </dl>
                <dl>
                  <dt><span>District information</span></dt>
                  <dd><span>Details</span></dd>
                  <dt><span>Usage</span></dt>
                  <dd><span>Details</span></dd>
                </dl>
                <dl class="column">
                  <dt><span>Gross floor area</span></dt>
                  <dd><span>ㅇㅇㅇ ㎡</span></dd>
                  <dt><span>Number of floors from the ground</span></dt>
                  <dd><span>0층</span></dd>
                  <dt><span>Number of households</span></dt>
                  <dd><span>0세대</span></dd>
                </dl>
                <dl class="column">
                  <dt><span>Gross floor area</span></dt>
                  <dd><span>ㅇㅇㅇ ㎡</span></dd>
                  <dt><span>Gross floor area</span></dt>
                  <dd><span>0층</span></dd>
                  <dt><span>Contract amount</span></dt>
                  <dd><span>0</span></dd>
                </dl>
              </div>
            </div>
            <div class="answer">
              <span class="subject">Answer to your inquiry in progress.</span>
              <div class="group">
                <span class="date">Date of inquiry <span>00-00-00</span></span>
              </div>
            </div>
            <div class="inquiry-content">
              답변
            </div>
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
      $.depth1Index = 2
      $.depth2Index = 7

    })(window.jQuery)
  </script>
</body>
</html>
