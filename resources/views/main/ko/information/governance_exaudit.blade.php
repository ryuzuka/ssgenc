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
          <div class="dropdown tabs js-dropdown" placeholder="외부감사인 &amp; ESG등급현황">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false">외부감사인 &amp; ESG등급현황</button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="false"><button type="button" data-value="">주주구성</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">이사회</button></li>
              <li role="option" aria-selected="true"><button type="button" data-value="">외부감사인 &amp; ESG등급현황</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">지배구조헌장</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">ESG 정보공시</button></li>
            </ul>
          </div>
          <div class="tab-list" role="tablist">
            <button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="false">주주구성</button>
            <button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="false">이사회</button>
            <button type="button" id="tab3" role="tab" aria-controls="tab-content3" aria-selected="true">외부감사인 &amp; ESG등급현황</button>
            <button type="button" id="tab4" role="tab" aria-controls="tab-content4" aria-selected="false">지배구조헌장</button>
            <button type="button" id="tab5" role="tab" aria-controls="tab-content5" aria-selected="false">ESG 정보공시</button>
          </div>
          <div class="tab-content">
            <div id="tab-content3" class="content" role="tabpanel" aria-labelledby="tab3" tabindex="0">
              <h3 class="sg-text-04">외부감사인</h3>
              <ul class="list04">
                <li><em>법인명</em> : 한영회계법인 </li>
                <li><em>선임일</em> : 제 33기 </li>
                <li><em>계약기간</em> : 제33기~제35기 (2023~2025)</li>
                <li><em>감사의견</em> : 적정 (제32기 연간_삼정회계법인) </li>
                <li><em>지적 사항 등의 요약</em> : 해당사항 없음 </li>
              </ul>
              <h3 class="sg-text-04">ESG등급현황</h3>
              <table class="tbl-list">
                <caption><span class="blind">ESG등급현황 정보</span></caption>
                <colgroup>
                  <col style="width:15%;">
                  <col style="width:17%;">
                  <col style="width:17%;">
                  <col style="width:17%;">
                  <col style="width:17%;">
                  <col style="width:17%;">
                </colgroup>
                <thead>
                <tr>
                  <th scope="col">항목</th>
                  <th scope="col">2018</th>
                  <th scope="col">2019</th>
                  <th scope="col">2020</th>
                  <th scope="col">2021</th>
                  <th scope="col">2022</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <th scope="row">통합등급</th>
                  <td>B+</td>
                  <td>B</td>
                  <td>B</td>
                  <td>B+</td>
                  <td>B+</td>
                </tr>
                <tr>
                  <th scope="row">환경(E)</th>
                  <td>B</td>
                  <td>C</td>
                  <td>C</td>
                  <td>C</td>
                  <td>B</td>
                </tr>
                <tr>
                  <th scope="row">사회(S)</th>
                  <td>B+</td>
                  <td>B</td>
                  <td>B</td>
                  <td>A</td>
                  <td>A</td>
                </tr>
                <tr>
                  <th scope="row">지배구조(G)</th>
                  <td>B+</td>
                  <td>B+</td>
                  <td>B+</td>
                  <td>A</td>
                  <td>B+</td>
                </tr>
                </tbody>
              </table>
              <span class="sg-text-10">※ 평가기관 : 한국ESG기준원(KCGS)</span>
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

        $('#tab-content3').addClass('active');

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
