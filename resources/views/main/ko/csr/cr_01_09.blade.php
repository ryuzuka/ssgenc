<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 신세계건설 신문고"
  ])
</head>

<body>
  <div class="wrap">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="visual csr section">
        <div class="text-box">
          <h2 class="sg-text-01">신세계건설 신문고</h2>
          <p class="sg-text-05">당사 임직원의 부정부실, 부당행위, 불공정 거래 행위 등<br>사회적 책임경영에 어긋나는 행위에 대해 제보해 주시기 바랍니다.</p>
        </div>
      </div>
      <div class="sub-content c-cr09 section header-black">
        <div class="inner">
          <ul class="list01">
            <li>
              <em class="sg-text-05">조사과정에서 제보자의 <br class="mobile-only">신원은 철저히 <br class="pc-only">비밀로 <br class="mobile-only">보장됩니다.</em>
            </li>
            <li>
              <em class="sg-text-05">다음에 해당하는 내용은 <br class="mobile-only">접수되지 않습니다.</em>
              <p>단순 민원/문의, 불명확한내용, 근거없는 비방, 개인간 법적대응 등</p>
            </li>
          </ul>
          <p class="sg-text-05">A/S, 하자 등 고객서비스 및 아파트/상가 등의 분양과 관련된 사항은 <a href="customer-service-center">‘고객상담실’</a>을 통해 관련내용을 접수하시기 바랍니다. <br class="pc-only">
            신문고에서는 해당 건에 대해서는 별도 회신을 드리지 않습니다</p>
        </div>
        <div class="group-box">
          <div class="inner">
            <div class="flex-box">
              <div class="inner-cell">
                <h3 class="sg-text-04">제보대상</h3>
              </div>
              <div class="inner-cell">
                <ul class="common-list">
                  <li>
                    <span class="number">01</span>
                    <span>임직원의 부당한 업무처리 및 <br class="pc-only">거래상 불공정행위</span>
                  </li>
                  <li>
                    <span class="number">02</span>
                    <span>금품수수 및 향응요구, <br class="pc-only">사회적 책임경영 위반사례</span>
                  </li>
                  <li>
                    <span class="number">03</span>
                    <span>불법/탈법행위 및 기타 개선사항</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="btn-wrap">
              <a href="write-a-report" class="btn btn-primary"><span>신문고 작성</span></a>
              <a href="search-inquiry?type=02" class="btn btn-primary"><span>제보 조회</span></a>
            </div>
          </div>
        </div>
        <div class="inner">
          <h4 class="sg-text-06">CSR 담당자 연락처</h4>
          <ul class="contact-address">
            <li>
              <em>TEL</em>
              <span>02)3406-6763</span>
            </li>
            <li>
              <em>FAX</em>
              <span>02)3406-6700</span>
            </li>
            <li>
              <em>E-mail</em>
              <span><a href="mailto:ssgenc@shinsegae.com">ssgenc@shinsegae.com</a></span>
            </li>
          </ul>
          <div class="btn-wrap">
            <a href="contact-us" class="btn btn-primary"><span>오시는 길 보기</span></a>
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
      $.depth2Index = 8

    })(window.jQuery)
  </script>
</body>
</html>
