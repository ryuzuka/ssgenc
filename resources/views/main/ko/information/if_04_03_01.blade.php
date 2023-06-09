<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 주식관련사항"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content i-if04 section header-black">
      <div class="inner">
        <h2 class="sg-text-06">주식관련사항</h2>
        <h3 class="sg-text-04">주식에 관한 사항</h3>
        <div class="unit-box">
          <span class="txt">(단위 : 주, %)</span>
        </div>
        <div class="scroll-box">
          <table class="tbl-list align-right">
            <caption><span class="blind">주식관련사항 정보</span></caption>
            <colgroup>
              <col style="width:13%;">
              <col style="width:29%;">
              <col style="width:29%;">
              <col style="width:29%;">
            </colgroup>
            <thead>
            <tr>
              <th scope="col">종류</th>
              <th scope="col">발행주식총수</th>
              <th scope="col">액면총액</th>
              <th scope="col">비고</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th scope="row">합계</th>
              <td>4,000,000</td>
              <td>20,000,000,000</td>
              <td>-</td>
            </tr>
            </tfoot>
            <tbody>
            <tr>
              <th scope="row">보통주식</th>
              <td>4,000,000</td>
              <td>20,000,000,000</td>
              <td>주당 5,000</td>
            </tr>
            <tr>
              <th scope="row">우선주식</th>
              <td>0</td>
              <td>0</td>
              <td>-</td>
            </tr>
            </tbody>
          </table>
        </div>
        <h3 class="sg-text-04">주식분포상황(2022년 3월 24일 기준)</h3>
        <div class="unit-box">
          <span class="txt">(단위 : 주, %)</span>
        </div>
        <div class="scroll-box">
          <table class="tbl-list align-right">
            <caption><span class="blind">주식분포상황 정보</span></caption>
            <colgroup>
              <col style="width:13%;">
              <col style="width:29%;">
              <col style="width:29%;">
              <col style="width:29%;">
            </colgroup>
            <thead>
            <tr>
              <th scope="col">구분</th>
              <th scope="col">성명</th>
              <th scope="col">소유주식수</th>
              <th scope="col">비율</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row">1대주주</th>
              <td>(주)이마트</td>
              <td>1,707,907</td>
              <td>42.70</td>
            </tr>
            <tr>
              <th scope="row">2대주주</th>
              <td>KB자산운용</td>
              <td>83,886</td>
              <td>2.10</td>
            </tr>
            <tr>
              <th scope="row">외국인</th>
              <td>-</td>
              <td>249,669</td>
              <td>6.24</td>
            </tr>
            <tr>
              <th scope="row">기타</th>
              <td>개인주주,법인 등</td>
              <td>1,958,538</td>
              <td>48.96</td>
            </tr>
            </tbody>
          </table>
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
