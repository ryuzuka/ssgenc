<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 지배구조"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content i-if04 section header-black">
      <div class="inner">
        <h2 class="sg-text-04">지배구조</h2>
        <div class="tab governance">
          <div class="dropdown tabs js-dropdown" placeholder="주주구성">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false">주주구성</button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="true"><button type="button" data-value="">주주구성</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">이사회</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">외부감사인 &amp; ESG등급현황</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">지배구조헌장</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">ESG 정보공시</button></li>
            </ul>
          </div>
          <div class="tab-list" role="tablist">
            <button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="true">주주구성</button>
            <button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="false">이사회</button>
            <button type="button" id="tab3" role="tab" aria-controls="tab-content3" aria-selected="false">외부감사인 &amp; ESG등급현황</button>
            <button type="button" id="tab4" role="tab" aria-controls="tab-content4" aria-selected="false">지배구조헌장</button>
            <button type="button" id="tab5" role="tab" aria-controls="tab-content5" aria-selected="false">ESG 정보공시</button>
          </div>
          <div class="tab-content">
            <div id="tab-content1" class="content" role="tabpanel" aria-labelledby="tab1" tabindex="0">
              <h3 class="sg-text-05">주주의 권익보장</h3>
              <p class="sg-text-03">신세계건설은 적극적인 E.S.G활동을 기반한<br>믿을 수 있는 투명한 경영활동으로 주주의 권익보장을 극대화하겠습니다.</p>
              <h4 class="sg-text-04">주주 구성 현황(2022.12.31 기준)</h4>
              <div class="chart-wrap">
                <div class="img-box">
                  <source media="(max-width: 1024px)" srcset="/images/information/img-if4-01-m.png">
                  <img src="/images/information/img-if4-01.png" alt="최대주주와 특수관계인 - 42.7%, 내국인 - 51.01%, 외국인 - 6.24%">
                </div>
                <div class="cont-wrap">
                  <ul>
                    <li>
                      <em>최대주주와 특수관계인</em>
                      <span>1,707,907주(42.70%)</span>
                    </li>
                    <li>
                      <em>내국인</em>
                      <span>2,042,424주(51.06%)</span>
                    </li>
                    <li>
                      <em>외국인</em>
                      <span>249,669주(6.24%)</span>
                    </li>
                  </ul>
                  <div class="total">
                    <em>합계</em>
                    <span>4,000,000주</span>
                  </div>
                </div>
              </div>
              <h4 class="sg-text-04">5% 이상 주주의 주식소유 현황</h4>
              <table class="tbl-list">
                <caption><span class="blind">5% 이상 주주의 주식소유 현황 정보</span></caption>
                <colgroup>
                  <col style="width:13%;">
                  <col style="width:29%;">
                  <col style="width:29%;">
                  <col style="width:29%;">
                </colgroup>
                <thead>
                <tr>
                  <th scope="col">순위</th>
                  <th scope="col">성명</th>
                  <th scope="col">주식수</th>
                  <th scope="col">지분율</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td class="emp">1</td>
                  <td>이마트</td>
                  <td>1,707,907주</td>
                  <td>42.70%</td>
                </tr>
                </tbody>
              </table>

              <h4 class="sg-text-04">제 32기 정기주주총회 결과[2023.03.23]</h4>
              <div class="flex-box">
                <div class="inner-cell">
                  <h5 class="sg-text-04">참석 주식수<br>및 참여율</h5>
                </div>
                <div class="inner-cell">
                  <span class="sg-text-09">총 4,000,000주 중 <br class="mobile-only">2,053,315주 참석 (51.33%)<br>
                    [감사위원 3% 적용시 총 2,412,093주 중 <br class="mobile-only">465,408주 참석 (19.29%)]</span>
                </div>
              </div>
              <div class="flex-box">
                <div class="inner-cell">
                  <h5 class="sg-text-04">의안별 가결 여부</h5>
                </div>
                <div class="inner-cell">
                  <ul class="list01">
                    <li><span>제1호 의안 '재무제표 승인' 가결</span>(1,997,080주 찬성, 97.3%)</li>
                    <li><span>제2호 의안 '사내이사 민일만 선임의 건' 가결</span>(2,037,720주 찬성, 99.2%)</li>
                    <li><span>제3호 의안 '감사위원이 되는 사외이사 이건기 선임의 건' 가결</span>(449,753주 찬성, 96.7%)</li>
                    <li><span>제4호 의안 '이사보수 한도 책정의 건' 가결</span>(1,952,895주 찬성, 95.1%)</li>
                  </ul>
                  <br>
                  <p class="text">※ 최대주주 및 특수관계인을 제외한 참석율은 8.64%(345,408주)이며, 제 3호 의안 참석률은 14.32%(345,408주) 입니다.</p>
                </div>
              </div>
            </div>
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
    // $.depth1Index = 3
    // $.depth2Index = 3

    $(document).ready(function () {
      $.switchUI.init($.viewType)

      $('#tab-content1').addClass('active');

      $('.js-dropdown .dropdown-list button').on('click', function () {
        let index = $(this).parent().index();
        switch(index)
        {
          case 0: $(location).attr('href', "{{ url('governance-shc') }}"); break;
          case 1: $(location).attr('href', "{{ url('governance-meet') }}"); break;
          case 2: $(location).attr('href', "{{ url('governance-exaudit') }}"); break;
          case 3: $(location).attr('href', "{{ url('governance-aoi') }}"); break;
          case 4: $(location).attr('href', "{{ url('governance-esg') }}"); break;
        }
      })

      $('#tab1').on('click', function(){ $(location).attr('href', "{{ url('governance-shc') }}") })
      $('#tab2').on('click', function(){ $(location).attr('href', "{{ url('governance-meet') }}") })
      $('#tab3').on('click', function(){ $(location).attr('href', "{{ url('governance-exaudit') }}") })
      $('#tab4').on('click', function(){ $(location).attr('href', "{{ url('governance-aoi') }}") })
      $('#tab5').on('click', function(){ $(location).attr('href', "{{ url('governance-esg') }}") })

    })
  })(window.jQuery)
</script>
</body>
</html>
