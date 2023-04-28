<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : CSR 개요"
  ])
</head>

<body>
  <div class="wrap">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="sub-content c-cr01 section header-black">
        <div class="inner">
          <div class="sub-header">
            <em class="sg-text-06">CSR 개요</em>
            <p class="sg-text-03">건설산업 선도 기업으로서 <span>책임과 사명</span>을 다하는,<br>
              <span>사회적 책임경영</span>을 지속 발전시켜 나가고자 합니다.</p>
          </div>
          <div class="img-wrap">
            <picture>
              <source media="(max-width: 1024px)" srcset="/images/csr/img-cr1-03-m.png">
              <img src="/images/csr/img-cr1-03.png" alt="건설산업 선도기업 사회적 책임경영 선도 지역사회와의 성장/배려 지원, 협력회사와의 동반성장, 투명하고 공정한 기업 운영">
            </picture>
          </div>
          <div class="flex-box">
            <div class="inner-cell">
              <h3 class="sg-text-04">사회적 책임 <br class="pc-only">경영 선포</h3>
            </div>
            <div class="inner-cell">
              <p class="sg-text-09">신세계 건설은 2013년 기업 경영 패러다임을 사회적 책임 경영으로 선언했습니다.
                정직하고 투명한 경영, 전 임직원과 회사가 자발적인 사회공헌, 기업의 성장과 고용유지를 통한 국가 경제발전에 기여한다는
                근본철학을 가지고 사회적 책임수행을 위해 노력하고 있습니다.</p>
              <ul class="list01">
                <li>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/csr/img-cr1-01-m.jpg">
                    <img src="/images/csr/img-cr1-01.jpg" alt="사회적 책임 경영 선포 이미지1">
                  </picture>
                </li>
                <li>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/csr/img-cr1-02-m.jpg">
                    <img src="/images/csr/img-cr1-02.jpg" alt="사회적 책임 경영 선포 이미지2">
                  </picture>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="group-box">
          <div class="inner">
            <div class="sub-header">
              <em class="sg-text-06">안전·보건 / 품질 / 환경 방침·목표</em>
              <p class="sg-text-03">모든 종사자의 안전보건을 최우선 핵심가치로 실천하기 위하여 <br class="pc-only">
                신세계건설은 <span>안전한 작업환경을 구축</span>하고 <br class="pc-only">
                <span>중대재해 ZERO 목표 지속달성과 품질혁신/환경경영 실천</span>을 통하여 <br class="pc-only">
                <span>기업의 사회적 책임과 회사의 지속적 성장을 달성</span>한다.</p>
            </div>
            <ul class="list02">
              <li>
                <em class="in-title">안전</em>
                <span class="sg-text-07">참여하는 안전보건경영<br>(중대재해 ZERO 지속달성)</span>
                <ul>
                  <li>건설환경 변화에 따른 적극적 대응</li>
                  <li>중대재해 취약분야 집중관리<br>(8대 요인 특별관리)</li>
                  <li>Smart 안전기법 적용 강화</li>
                  <li>기술안전 문화 내재화</li>
                </ul>
              </li>
              <li>
                <em class="in-title">품질</em>
                <span class="sg-text-07">품질혁신을 통한 고객만족 실현</span>
                <ul>
                  <li>품질관리 활동 효율화</li>
                  <li>품질관리 사내 소통 강화</li>
                  <li>임직원 협력사 CS MIND 향상</li>
                </ul>
              </li>
              <li>
                <em class="in-title">환경</em>
                <span class="sg-text-07">환경 경영 고도화</span>
                <ul>
                  <li>환경 경영 시스템과 연계한 관리활동 정착</li>
                  <li>현장 환경관리 모니터링 체계화</li>
                  <li>LEGAL RISK 사전 관리</li>
                </ul>
              </li>
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
      $.depth2Index = 0

    })(window.jQuery)
  </script>
</body>
</html>
