<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 고객상담실"
  ])  
</head>

<body>
  <div class="wrap">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="visual csr section">
        <div class="text-box">
          <h2 class="sg-text-01">고객상담실</h2>
          <p class="sg-text-05">더 나은 하루를 위해 당신의 이야기를 들려주세요</p>
        </div>
      </div>
      <div class="sub-content c-cr08 section header-black">
        <div class="inner">
          <h3 class="sg-text-03">상담결과 조회 결과</h3>
          <div class="cr-inquiry">
            <div class="question">
              <span class="category">수주상담</span>
              <span class="subject">상담내용(00000000)</span>
              <span class="state">답변준비중</span>
              <div class="info">
                <span class="write">홍길동</span>
                <span class="date">상담일 00-00-00</span>
              </div>
            </div>
            <div class="inquiry-content">
              내용
              <div class="tbl">
                <dl class="address">
                  <dt><span>공사위치</span></dt>
                  <dd><span>주소입니다.</span></dd>
                </dl>
                <dl>
                  <dt><span>지역지구</span></dt>
                  <dd><span>내용</span></dd>
                  <dt><span>용도</span></dt>
                  <dd><span>내용</span></dd>
                </dl>
                <dl class="column">
                  <dt><span>연단적</span></dt>
                  <dd><span>ㅇㅇㅇ ㎡</span></dd>
                  <dt><span>지상층수</span></dt>
                  <dd><span>0층</span></dd>
                  <dt><span>세대수</span></dt>
                  <dd><span>0세대</span></dd>
                </dl>
                <dl class="column">
                  <dt><span>대지면적</span></dt>
                  <dd><span>ㅇㅇㅇ ㎡</span></dd>
                  <dt><span>지하층수</span></dt>
                  <dd><span>0층</span></dd>
                  <dt><span>도급액</span></dt>
                  <dd><span>0</span></dd>
                </dl>
              </div>
            </div>
            <div class="answer">
              <span class="subject">답변 제목입니다.</span>
              <div class="group">
                <span class="date">답변일 - <span>0000.00.00</span></span>
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
    @include('main.ko.inc.footer')
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
