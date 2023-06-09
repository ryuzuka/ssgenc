<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 뉴스"
  ])
</head>

<body>
  <div class="wrap header-black">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="sub-content i-if04 section header-black">
        <div class="inner">
          <div class="view">
            <div class="view-subject">
              <em class="sg-text-03">신세계 ESG 관련 온라인 교육 실적</em>
              <span class="date">2021.01.01</span>
            </div>
            <div class="view-content">
              <ul class="list-esg">
                <li>01 임직원 온라인 교육
                  <em>온라인 교육</em>
                  <ul>
                    <li>-SSG EDU 사이트 운영 (경영/마케팅, 스마트워크 등 13개 분야, 626개 컨텐츠 제공, 1-12월)</li>
                    <li>-내부회계관리 제도 교육(6-7월)</li>
                    <li>-비즈니스 협상력 교육(9-10월, 11-12월)</li>
                    <li>-정보보안 교육(11-12월)</li>
                    <li>-안전관리 교육(11월)</li>
                  </ul>
                </li>
                <li>02 임직원 윤리 교육
                  <em>공정거래 교육</em>
                  <ul>
                    <li>-하도급법의 이해(10-12월)</li>
                  </ul>
                  <em>부패방지 교육</em>
                  <ul>
                    <li>-리스크 매니지먼트 교육(6-7월)</li>
                  </ul>
                  <em>인권 교육</em>
                  <ul>
                    <li>-인권침해 방지 교육(7월)</li>
                    <li>-장애인 인식개선 교육(8월)</li>
                    <li>-직장내 괴롭힘 예방교육(8월)</li>
                  </ul>
                </li>
                <li>03 협력사를 위한 교육제공
                  <ul>
                    <li>-교육인프라가 약한 협력사를 위한 무료 교육 컨텐츠 제공</li>
                    <li>-역걍강화교육부터 법정의무교육까지!</li>
                  </ul>
                  <p>20년 운영 과정 : 경영일반 및 어학, 자기계발, 법정필수 등 분야<br>
                    367개 컨텐트 운영, 중소기업 48개사 지원 (20.7~12월)<br>
                    *21년 하반기 운영 중</p>
                </li>
              </ul>

              <!--
              <div class="img-wrap">
                <picture>
                  <source media="(max-width: 1024px)" srcset="/images/information/img-view-dummy-m.jpg">
                  <img src="/images/information/img-view-dummy.jpg" alt="">
                </picture>
              </div>
              신세계건설은 주거브랜드 빌리브를 통해 아파트 브랜드 시장의 후발 주자이지만 독특한 마케팅 방법과 메세지로 시장의 흐름을 주도하고있다. ‘빌리브(villiv)’는 신세계건설이 2018년 처음 선보인 주거브랜드로 모던한 형태의 마을 ‘village’와 존중되는 삶의공간 ‘live’의 의미가 결합된 섬세하고 감각적인 라이프 스타일 브랜드다.
              <br><br>
              건설사 최초로 자체 미디어인 ‘빌리브매거진’을 운영하며, 전세계의 다양한 공간과 라이프스타일, 그리고
              삶의 가치에 대해 이야기하며 라이프스타일먼트의 가치를 선보이고있다. 감각적인 콘텐츠뿐만 아니라 온라인 플랫폼을 활용한 동영상 콘텐츠를 선보이며, 다양한 소재와 높은 완성도로 긍정적인 평가를 받고있다. 건설사 최초로 자체 미디어인 ‘빌리브매거진’을 운영하며, 전세계의 다양한 공간과 라이프스타일, 그리고
              삶의 가치에 대해 이야기하며 라이프스타일먼트의 가치를 선보이고있다. 감각적인 콘텐츠뿐만 아니라 온라인 플랫폼을 활용한 동영상 콘텐츠를 선보이며, 다양한 소재와 높은 완성도로 긍정적인 평가를 받고있다.
              -->
            </div>
          </div>
          <dl class="page">
            <dt>다음글</dt>
            <dd>다음글이 없습니다.</dd>
          </dl>
          <div class="btn-wrap">
            <a href="governance?tabIndex=4" class="btn btn-primary"><span>목록</span></a>
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
      $.depth1Index = 3
      $.depth2Index = 0

    })(window.jQuery)
  </script>
</body>
</html>
