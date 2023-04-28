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
          <p class="sg-text-03">고객 ･ 협력사 ･ 직원 여러분의 <br class="pc-only">
            고충상담 및 동반성장 관련, 기타의견 등을 접수 받고 있습니다.</p>
          <p class="sg-text-05">신세계건설 임직원의 부정부실과 관련된 잘못된 관행 또는 정책 부문에 대한 의견이 있을 경우 <br class="pc-only"><a href="ombudsman">‘신문고’</a>를 통해 제보하여 주시기 바랍니다.</p>
          <div class="btn-wrap">
            <a href="footer-contact-us" class="btn btn-primary"><span>문의하기</span></a>
            <a href="search-inquiry?type=01" class="btn btn-primary"><span>상담결과조회</span></a>
          </div>
          <div class="as-contactus">
            <h3 class="sg-text-04">A/S 문의 접수 연락번호</h3>
            <ul class="list">
              <li><span>1533-1960</span> / CS 동부센터(경기/강원/충청)</li>
              <li><span>1533-1961</span> / CS 서부센터(서울/인천)</li>
              <li><span>1533-1962</span> / CS 남부센터(충청/전라/경상/제주)</li>
            </ul>
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
