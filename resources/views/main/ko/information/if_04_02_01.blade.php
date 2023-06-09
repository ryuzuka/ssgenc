<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 재무정보"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents section header-black">
    <div class="sub-content i-if04 section header-black">
      <div class="inner">
        <h2 class="sg-text-06">재무정보</h2>
        <div class="flex-box vertical width-type">
          <div class="inner-cell">
            <h3 class="sg-text-04">영업현황 및 재무비율</h3>
          </div>
          <div class="inner-cell">
            <p class="sg-text-09">본 정보는 오류가 발생하거나 지연될 수 있으며, 제공된 정보에 의한 투자결과에 대한 법적인 책임을 지지 않습니다.</p>
          </div>
        </div>
        <ul class="list05">
          <li>
            <em class="sg-text-05">매출액</em>
            <picture>
              <source media="(max-width: 1024px)" srcset="/images/information/img-if4-04-m.png">
              <img src="/images/information/img-if4-04.png" alt="2017년:10,644, 2018년:10,842, 2019년:10,161, 2020년:9,567, 2021년:12,567">
            </picture>
          </li>
          <li>
            <em class="sg-text-05">영업이익</em>
            <picture>
              <source media="(max-width: 1024px)" srcset="/images/information/img-if4-05-m.png">
              <img src="/images/information/img-if4-05.png" alt="2017년:247.26, 2018년:218.49, 2019년:242.38, 2020년:206.42, 2021년:384.39">
            </picture>
          </li>
          <li>
            <em class="sg-text-05">세전이익</em>
            <picture>
              <source media="(max-width: 1024px)" srcset="/images/information/img-if4-06-m.png">
              <img src="/images/information/img-if4-06.png" alt="2017년:334.68, 2018년:289.46, 2019년:220.52, 2020년:147.76, 2021년:328.53">
            </picture>
          </li>
          <li>
            <em class="sg-text-05">순이익</em>
            <picture>
              <source media="(max-width: 1024px)" srcset="/images/information/img-if4-07-m.png">
              <img src="/images/information/img-if4-07.png" alt="2017년:290.22, 2018년:430.78, 2019년:175.15, 2020년:122.31, 2021년:261.55">
            </picture>
          </li>
        </ul>
        <h3 class="sg-text-04">재무비율</h3>
        <table class="tbl-list">
          <caption><span class="blind">재무비율 정보</span></caption>
          <colgroup>
            <col style="width:25%;">
            <col style="width:25%;">
            <col style="width:25%;">
            <col style="width:25%;">
          </colgroup>
          <thead>
          <tr>
            <th scope="col">구분</th>
            <th scope="col">FY2022</th>
            <th scope="col">FY2021</th>
            <th scope="col">FY2020</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>매출액증가율</td>
            <td>13.98</td>
            <td>31.36</td>
            <td>-5.85</td>
          </tr>
          <tr>
            <td>영업이익률</td>
            <td>-0.84</td>
            <td>3.06</td>
            <td>2.16</td>
          </tr>
          <tr>
            <td>ROE</td>
            <td>-5.58</td>
            <td>12.21</td>
            <td>6.12</td>
          </tr>
          <tr>
            <td>ROA</td>
            <td>-1.37</td>
            <td>3.16</td>
            <td>1.60</td>
          </tr>
          <tr>
            <td>부채비율</td>
            <td>265.01</td>
            <td>266.59</td>
            <td>278.28</td>
          </tr>
          <tr>
            <td>유동비율</td>
            <td>70.91</td>
            <td>70.81</td>
            <td>68.76</td>
          </tr>
          <tr>
            <td>자기자본비율</td>
            <td>27.40</td>
            <td>27.28</td>
            <td>26.44</td>
          </tr>
          <tr>
            <td>EPS</td>
            <td>-3,555</td>
            <td>6,539</td>
            <td>3,058</td>
          </tr>
          </tbody>
        </table>
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
