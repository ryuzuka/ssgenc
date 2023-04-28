<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 배당관련사항"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content i-if04 section header-black">
      <div class="inner">
        <h2 class="sg-text-06">배당관련사항</h2>
        <h3 class="sg-text-04">배당현황</h3>
        <div class="unit-box">
          <span class="txt">(단위 : 원, 주)</span>
        </div>
        <div class="scroll-box">
          <table class="tbl-list">
            <caption><span class="blind">배당현황 정보</span></caption>
            <colgroup>
              <col style="width:12%;">
              <col style="width:10%;">
              <col style="width:13%;">
              <col style="width:13%;">
              <col style="width:13%;">
              <col style="width:13%;">
              <col style="width:13%;">
              <col style="width:13%;">
            </colgroup>
            <thead>
            <tr>
              <th scope="col" colspan="2">항목</th>
              <th scope="col">2022년</th>
              <th scope="col">2021년</th>
              <th scope="col">2020년</th>
              <th scope="col">2019년</th>
              <th scope="col">2018년</th>
              <th scope="col">2017년</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row" colspan="2">영업이익(억원)</th>
              <td>-120</td>
              <td>384</td>
              <td>206</td>
              <td>242</td>
              <td>218</td>
              <td>247</td>
            </tr>
            <tr>
              <th scope="row" colspan="2">당기순이익(억원)</th>
              <td>-142</td>
              <td>261</td>
              <td>122</td>
              <td>175</td>
              <td>431</td>
              <td>290</td>
            </tr>
            <tr>
              <th scope="row" colspan="2">주당순이익(원)</th>
              <td>-3,555</td>
              <td>6,539</td>
              <td>3,058</td>
              <td>4,379</td>
              <td>10,769</td>
              <td>7,256</td>
            </tr>
            <tr>
              <th scope="row" colspan="2">배당종류</th>
              <td>현금배당</td>
              <td>현금배당</td>
              <td>현금배당</td>
              <td>현금배당</td>
              <td>현금배당</td>
              <td>현금배당</td>
            </tr>
            <tr>
              <th scope="row" colspan="2">배당총금액(억원)</th>
              <td>20</td>
              <td>34</td>
              <td>32</td>
              <td>32</td>
              <td>30</td>
              <td>30</td>
            </tr>
            <tr>
              <th scope="row" rowspan="2">현금배당성향(%)</th>
              <th scope="row">영업이익</th>
              <td>-</td>
              <td>8.8</td>
              <td>15.5</td>
              <td>13.2</td>
              <td>13.8</td>
              <td>12.1</td>
            </tr>
            <tr>
              <th scope="row">당기순이익</th>
              <td>-</td>
              <td>13</td>
              <td>26.2</td>
              <td>18.3</td>
              <td>7.0</td>
              <td>10.3</td>
            </tr>
            <tr>
              <th scope="row" colspan="2">주당현금배당금(원)</th>
              <td>500</td>
              <td>850</td>
              <td>800</td>
              <td>800</td>
              <td>750</td>
              <td>750</td>
            </tr>
            <tr>
              <th scope="row" colspan="2">배당수익률(%)</th>
              <td>2.9</td>
              <td>2.5</td>
              <td>3.1</td>
              <td>3</td>
              <td>3.2</td>
              <td>2.8</td>
            </tr>
            </tbody>
          </table>
          <p class="sg-text-10">※ 2022년 현금배당성향은 음수로 기재를 생략하였습니다.</p>
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
