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
  <div class="contents">
    <div class="sub-content i-if04 section header-black">
      <div class="inner">
        <h2 class="sg-text-06">재무정보</h2>
        <div class="flex-box vertical width-type">
          <div class="inner-cell">
            <h3 class="sg-text-04">손익계산서</h3>
          </div>
          <div class="inner-cell">
            <p class="sg-text-09">본 정보는 오류가 발생하거나 지연될 수 있으며, 제공된 정보에 의한 투자결과에 대한 법적인 책임을 지지 않습니다.</p>
          </div>
        </div>
        <div class="unit-box">
          <span class="txt">(단위 : 백만원)</span>
          <div class="select-box">
            <select id="" class="year" name="select">
                <option value="2022" selected>2022년</option>
                <option value="2021">2021년</option>
                <option value="2020">2020년</option>
                <option value="2019">2019년</option>
                <option value="2018">2018년</option>
                <option value="2017">2017년</option>
            </select>
          </div>
        </div>
        <div class="scroll-box 2022">
          <table class="tbl-list">
            <caption><span class="blind">2022년 손익계산서 정보</span></caption>
            <colgroup>
              <col style="width:16%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:16%;">
            </colgroup>
            <thead>
            <tr>
              <th scope="col">구분</th>
              <th scope="col">1Q 2022</th>
              <th scope="col">2Q 2022</th>
              <th scope="col">3Q 2022</th>
              <th scope="col">4Q 2022</th>
              <th scope="col">FY 2022</th>
            </tr>
            </thead>
            <tbody>
            <tr class="emp-fw">
              <th scope="row">매출액</th>
              <td>253,498</td>
              <td>395,954</td>
              <td>345,483</td>
              <td>437,450</td>
              <td>1,432,385</td>
            </tr>
            <tr>
              <th scope="row">매출 총 이익</th>
              <td>19,005</td>
              <td>27,738</td>
              <td>24,861</td>
              <td>-167</td>
              <td>71,437</td>
            </tr>
            <tr>
              <th scope="row">영업이익</th>
              <td>1,486</td>
              <td>5,630</td>
              <td>6,550</td>
              <td>-25,708</td>
              <td>-12,042</td>
            </tr>
            <tr>
              <th scope="row">세전이익</th>
              <td>2,770</td>
              <td>7,266</td>
              <td>4,600</td>
              <td>-32,350</td>
              <td>-17,714</td>
            </tr>
            <tr>
              <th scope="row">당기순이익</th>
              <td>2,330</td>
              <td>5,896</td>
              <td>3,680</td>
              <td>-26,125</td>
              <td>-14,219</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="scroll-box 2021" style="display: none">
          <table class="tbl-list">
            <caption><span class="blind">2021년 손익계산서 정보</span></caption>
            <colgroup>
              <col style="width:16%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:16%;">
            </colgroup>
            <thead>
            <tr>
              <th scope="col">구분</th>
              <th scope="col">1Q 2021</th>
              <th scope="col">2Q 2021</th>
              <th scope="col">3Q 2021</th>
              <th scope="col">2Q 2021</th>
              <th scope="col">FY 2021</th>
            </tr>
            </thead>
            <tbody>
            <tr class="emp-fw">
              <th scope="row">매출액</th>
              <td>260,327</td>
              <td>355,294</td>
              <td>286,696</td>
              <td>354,431</td>
              <td>1,256,750</td>
            </tr>
            <tr>
              <th scope="row">매출 총 이익</th>
              <td>28,777</td>
              <td>37,881</td>
              <td>26,456</td>
              <td>22,140</td>
              <td>115,255</td>
            </tr>
            <tr>
              <th scope="row">영업이익</th>
              <td>9,428</td>
              <td>15,443</td>
              <td>10,976</td>
              <td>2,591</td>
              <td>38,439</td>
            </tr>
            <tr>
              <th scope="row">세전이익</th>
              <td>7,666</td>
              <td>15,997</td>
              <td>7,617</td>
              <td>1,572</td>
              <td>32,853</td>
            </tr>
            <tr>
              <th scope="row">당기순이익</th>
              <td>6,071</td>
              <td>12,716</td>
              <td>5,982</td>
              <td>1,385</td>
              <td>26,155</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="scroll-box 2020" style="display: none">
          <table class="tbl-list">
            <caption><span class="blind">2020년 손익계산서 정보</span></caption>
            <colgroup>
              <col style="width:16%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:16%;">
            </colgroup>
            <thead>
            <tr>
              <th scope="col">구분</th>
              <th scope="col">1Q 2020</th>
              <th scope="col">2Q 2020</th>
              <th scope="col">3Q 2020</th>
              <th scope="col">4Q 2020</th>
              <th scope="col">FY 2020</th>
            </tr>
            </thead>
            <tbody>
            <tr class="emp-fw">
              <th scope="row">매출액</th>
              <td>227,517</td>
              <td>264,740</td>
              <td>206,426</td>
              <td>258,071</td>
              <td>956,756</td>
            </tr>
            <tr>
              <th scope="row">매출 총 이익</th>
              <td>20,228</td>
              <td>22,695</td>
              <td>22,355</td>
              <td>22,402</td>
              <td>87,682</td>
            </tr>
            <tr>
              <th scope="row">영업이익</th>
              <td>4,843</td>
              <td>3,548</td>
              <td>7,581</td>
              <td>4,667</td>
              <td>20,641</td>
            </tr>
            <tr>
              <th scope="row">세전이익</th>
              <td>1,728</td>
              <td>3,329</td>
              <td>4,515</td>
              <td>5,202</td>
              <td>14,776</td>
            </tr>
            <tr>
              <th scope="row">당기순이익</th>
              <td>1,676</td>
              <td>2,646</td>
              <td>1,288</td>
              <td>6,618</td>
              <td>12,230</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="scroll-box 2019" style="display: none">
          <table class="tbl-list">
            <caption><span class="blind">2019년 손익계산서 정보</span></caption>
            <colgroup>
              <col style="width:16%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:16%;">
            </colgroup>
            <thead>
            <tr>
              <th scope="col">구분</th>
              <th scope="col">1Q 2019</th>
              <th scope="col">2Q 2019</th>
              <th scope="col">3Q 2019</th>
              <th scope="col">4Q 2019</th>
              <th scope="col">FY 2019</th>
            </tr>
            </thead>
            <tbody>
            <tr class="emp-fw">
              <th scope="row">매출액</th>
              <td>217,768</td>
              <td>265,214</td>
              <td>265,345</td>
              <td>267,824</td>
              <td>1,016,153</td>
            </tr>
            <tr>
              <th scope="row">매출 총 이익</th>
              <td>20,362</td>
              <td>22,265</td>
              <td>28,167</td>
              <td>23,001</td>
              <td>93,797</td>
            </tr>
            <tr>
              <th scope="row">영업이익</th>
              <td>5,093</td>
              <td>-1,968</td>
              <td>14,482</td>
              <td>6,631</td>
              <td>24,238</td>
            </tr>
            <tr>
              <th scope="row">세전이익</th>
              <td>4,771</td>
              <td>-2,332</td>
              <td>14,547</td>
              <td>5,065</td>
              <td>22,052</td>
            </tr>
            <tr>
              <th scope="row">당기순이익</th>
              <td>3,781</td>
              <td>-1,618</td>
              <td>11,232</td>
              <td>4,118</td>
              <td>17,514</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="scroll-box 2018" style="display: none">
          <table class="tbl-list">
            <caption><span class="blind">2018년 손익계산서 정보</span></caption>
            <colgroup>
              <col style="width:16%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:16%;">
            </colgroup>
            <thead>
            <tr>
              <th scope="col">구분</th>
              <th scope="col">1Q 2018</th>
              <th scope="col">2Q 2018</th>
              <th scope="col">3Q 2018</th>
              <th scope="col">4Q 2018</th>
              <th scope="col">FY 2018</th>
            </tr>
            </thead>
            <tbody>
            <tr class="emp-fw">
              <th scope="row">매출액</th>
              <td>195,001</td>
              <td>281,552</td>
              <td>287,067</td>
              <td>320,646</td>
              <td>1,084,268</td>
            </tr>
            <tr>
              <th scope="row">매출 총 이익</th>
              <td>15,300</td>
              <td>18,143</td>
              <td>22,325</td>
              <td>24,955</td>
              <td>80,725</td>
            </tr>
            <tr>
              <th scope="row">영업이익</th>
              <td>1,367</td>
              <td>4,509</td>
              <td>6,764</td>
              <td>9,208</td>
              <td>21,849</td>
            </tr>
            <tr>
              <th scope="row">세전이익</th>
              <td>1,842</td>
              <td>6,497</td>
              <td>5,775</td>
              <td>14,830</td>
              <td>28,945</td>
            </tr>
            <tr>
              <th scope="row">당기순이익</th>
              <td>1,551</td>
              <td>5,351</td>
              <td>4,643</td>
              <td>31,531</td>
              <td>43,077</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="scroll-box 2017" style="display: none">
          <table class="tbl-list">
            <caption><span class="blind">2017년 손익계산서 정보</span></caption>
            <colgroup>
              <col style="width:16%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:17%;">
              <col style="width:16%;">
            </colgroup>
            <thead>
            <tr>
              <th scope="col">구분</th>
              <th scope="col">1Q 2017</th>
              <th scope="col">2Q 2017</th>
              <th scope="col">3Q 2017</th>
              <th scope="col">4Q 2017</th>
              <th scope="col">FY 2017</th>
            </tr>
            </thead>
            <tbody>
            <tr class="emp-fw">
              <th scope="row">매출액</th>
              <td>293,130</td>
              <td>270,022</td>
              <td>293,161</td>
              <td>208,110</td>
              <td>1,064,425</td>
            </tr>
            <tr>
              <th scope="row">매출 총 이익</th>
              <td>21,927</td>
              <td>19,124</td>
              <td>24,481</td>
              <td>15,464</td>
              <td>80,998</td>
            </tr>
            <tr>
              <th scope="row">영업이익</th>
              <td>9,400</td>
              <td>1,584</td>
              <td>11,532</td>
              <td>2,208</td>
              <td>24,726</td>
            </tr>
            <tr>
              <th scope="row">세전이익</th>
              <td>7,090</td>
              <td>12,356</td>
              <td>12,461</td>
              <td>1,560</td>
              <td>33,468</td>
            </tr>
            <tr>
              <th scope="row">당기순이익</th>
              <td>5,566</td>
              <td>11,997</td>
              <td>10,055</td>
              <td>1,403</td>
              <td>29,022</td>
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

      $(document).ready(function () {
        $.switchUI.init($.viewType)

        $('select.year').on('change', e => {
          $('.scroll-box').hide()
          $('.scroll-box.' + e.target.value).show()

          // $('html, body').animate({scrollTop: $('.scroll-box.' + e.target.value).offset().top - 40}, 500)
        })
      })
    })(window.jQuery)
  </script>
</body>
</html>
