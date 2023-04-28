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
            <h3 class="sg-text-04">재무상태표</h3>
          </div>
          <div class="inner-cell">
            <p class="sg-text-09">본 정보는 오류가 발생하거나 지연될 수 있으며, 제공된 정보에 의한 투자결과에 대한 법적인 책임을 지지 않습니다.</p>
          </div>
        </div>
        <div class="unit-box">
          <span class="txt">(단위 : 백만원)</span>
          <div class="select-box">
            <select name="select" class="year">
              <option value="2022" selected>2022년</option>
              <option value="2021">2021년</option>
              <option value="2020">2020년</option>
              <option value="2019">2019년</option>
              <option value="2018">2018년</option>
              <option value="2017">2017년</option>
            </select>
          </div>
        </div><div class="scroll-box 2022">
          <table class="tbl-list">
            <caption><span class="blind">2022년 재무상태 정보</span></caption>
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
              <th scope="col">FY 2021</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row">유동자산(계)</th>
              <td>318,138</td>
              <td>446,121</td>
              <td>339,628</td>
              <td>482,601</td>
              <td>384,523</td>
            </tr>
            <tr>
              <th scope="row">비유동자산(계)</th>
              <td>462,925</td>
              <td>458,861</td>
              <td>455,181</td>
              <td>553,010</td>
              <td>444,475</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">자산총계</th>
              <td>781,063</td>
              <td>904,982</td>
              <td>794,809</td>
              <td>1,035,611</td>
              <td>828,998</td>
            </tr>
            <tr>
              <th scope="row">유동부채(계)</th>
              <td>496,104</td>
              <td>625,400</td>
              <td>522,175</td>
              <td>680,581</td>
              <td>543,033</td>
            </tr>
            <tr>
              <th scope="row">비유동부채(계)</th>
              <td>60,292</td>
              <td>59,523</td>
              <td>49,299</td>
              <td>71,311</td>
              <td>59,828</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">부채총계</th>
              <td>556,396</td>
              <td>684,923</td>
              <td>571,474</td>
              <td>751,892</td>
              <td>602,861</td>
            </tr>
            <tr>
              <th scope="row">자본금</th>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
            </tr>
            <tr>
              <th scope="row">이익잉여금</th>
              <td>165,644</td>
              <td>171,000</td>
              <td>174,275</td>
              <td>150,351</td>
              <td>167,114</td>
            </tr>
            <tr>
              <th scope="row">기타자본항목</th>
              <td>38,023</td>
              <td>29,059</td>
              <td>29,059</td>
              <td>113,368</td>
              <td>39,023</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">자본총계</th>
              <td>224,667</td>
              <td>220,059</td>
              <td>223,334</td>
              <td>283,719</td>
              <td>226,137</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="scroll-box 2021" style="display: none">
          <table class="tbl-list">
            <caption><span class="blind">2021년 재무상태 정보</span></caption>
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
              <th scope="col">4Q 2021</th>
              <th scope="col">FY 2020</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row">유동자산(계)</th>
              <td>413,328</td>
              <td>483,463</td>
              <td>373,073</td>
              <td>384,523</td>
              <td>343,791</td>
            </tr>
            <tr>
              <th scope="row">비유동자산(계)</th>
              <td>424,234</td>
              <td>430,488</td>
              <td>429,888</td>
              <td>444,475</td>
              <td>421,822</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">자산총계</th>
              <td>837,563</td>
              <td>913,951</td>
              <td>802,961</td>
              <td>828,998</td>
              <td>765,614</td>
            </tr>
            <tr>
              <th scope="row">유동부채(계)</th>
              <td>569,576</td>
              <td>633,754</td>
              <td>514,655</td>
              <td>543,032</td>
              <td>499,992</td>
            </tr>
            <tr>
              <th scope="row">비유동부채(계)</th>
              <td>63,124</td>
              <td>63,017</td>
              <td>65,545</td>
              <td>59,828</td>
              <td>63,230</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">부채총계</th>
              <td>632,700</td>
              <td>696,772</td>
              <td>580,200</td>
              <td>602,860</td>
              <td>563,223</td>
            </tr>
            <tr>
              <th scope="row">자본금</th>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
            </tr>
            <tr>
              <th scope="row">이익잉여금</th>
              <td>145,923</td>
              <td>158,239</td>
              <td>163,822</td>
              <td>167,113</td>
              <td>143,452</td>
            </tr>
            <tr>
              <th scope="row">기타자본항목</th>
              <td>38,938</td>
              <td>38,938</td>
              <td>38,938</td>
              <td>39,023</td>
              <td>38,938</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">자본총계</th>
              <td>204,862</td>
              <td>217,178</td>
              <td>222,760</td>
              <td>226,137</td>
              <td>202,390</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="scroll-box 2020" style="display: none">
          <table class="tbl-list">
            <caption><span class="blind">2020년 재무상태 정보</span></caption>
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
              <th scope="col">FY 2019</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row">유동자산(계)</th>
              <td>354,695</td>
              <td>380,688</td>
              <td>379,118</td>
              <td>343,791</td>
              <td>379,175</td>
            </tr>
            <tr>
              <th scope="row">비유동자산(계)</th>
              <td>404,427</td>
              <td>408,284</td>
              <td>417,378</td>
              <td>421,822</td>
              <td>398,566</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">자산총계</th>
              <td>759,123</td>
              <td>788,973</td>
              <td>796,496</td>
              <td>765,614</td>
              <td>777,742</td>
            </tr>
            <tr>
              <th scope="row">유동부채(계)</th>
              <td>514,180</td>
              <td>541,477</td>
              <td>530,296</td>
              <td>499,992</td>
              <td>533,755</td>
            </tr>
            <tr>
              <th scope="row">비유동부채(계)</th>
              <td>49,285</td>
              <td>49,591</td>
              <td>67,406</td>
              <td>63,230</td>
              <td>46,405</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">부채총계</th>
              <td>563,466</td>
              <td>591,068</td>
              <td>597,703</td>
              <td>563,223</td>
              <td>580,161</td>
            </tr>
            <tr>
              <th scope="row">자본금</th>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
            </tr>
            <tr>
              <th scope="row">이익잉여금</th>
              <td>136,812</td>
              <td>139,059</td>
              <td>139,948</td>
              <td>143,452</td>
              <td>138,736</td>
            </tr>
            <tr>
              <th scope="row">기타자본항목</th>
              <td>38,844</td>
              <td>38,844</td>
              <td>38,844</td>
              <td>38,938</td>
              <td>38,844</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">자본총계</th>
              <td>195,657</td>
              <td>197,904</td>
              <td>198,793</td>
              <td>202,390</td>
              <td>197,581</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="scroll-box 2019" style="display: none">
          <table class="tbl-list">
            <caption><span class="blind">2019년 재무상태 정보</span></caption>
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
              <th scope="col">FY 2018</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row">유동자산(계)</th>
              <td>342,261</td>
              <td>377,767</td>
              <td>395,698</td>
              <td>379,175</td>
              <td>386,755</td>
            </tr>
            <tr>
              <th scope="row">비유동자산(계)</th>
              <td>405,050</td>
              <td>404,552</td>
              <td>397,875</td>
              <td>398,566</td>
              <td>370,321</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">자산총계</th>
              <td>747,311</td>
              <td>782,319</td>
              <td>793,574</td>
              <td>777,742</td>
              <td>757,077</td>
            </tr>
            <tr>
              <th scope="row">유동부채(계)</th>
              <td>502,620</td>
              <td>547,682</td>
              <td>548,291</td>
              <td>533,755</td>
              <td>481,954</td>
            </tr>
            <tr>
              <th scope="row">비유동부채(계)</th>
              <td>49,616</td>
              <td>51,891</td>
              <td>51,705</td>
              <td>46,405</td>
              <td>79,473</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">부채총계</th>
              <td>552,237</td>
              <td>599,574</td>
              <td>599,996</td>
              <td>580,161</td>
              <td>561,427</td>
            </tr>
            <tr>
              <th scope="row">자본금</th>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
            </tr>
            <tr>
              <th scope="row">이익잉여금</th>
              <td>127,875</td>
              <td>125,486</td>
              <td>136,318</td>
              <td>138,736</td>
              <td>128,450</td>
            </tr>
            <tr>
              <th scope="row">기타자본항목</th>
              <td>47,198</td>
              <td>37,259</td>
              <td>37,259</td>
              <td>38,844</td>
              <td>47,198</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">자본총계</th>
              <td>195,073</td>
              <td>182,745</td>
              <td>193,577</td>
              <td>197,581</td>
              <td>195,649</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="scroll-box 2018" style="display: none">
          <table class="tbl-list">
            <caption><span class="blind">2018년 재무상태 정보</span></caption>
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
              <th scope="col">FY 2017</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row">유동자산(계)</th>
              <td>357,108</td>
              <td>395,369</td>
              <td>415,000</td>
              <td>386,755</td>
              <td>323,558</td>
            </tr>
            <tr>
              <th scope="row">비유동자산(계)</th>
              <td>344,156</td>
              <td>358,608</td>
              <td>357,575</td>
              <td>370,321</td>
              <td>354,997</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">자산총계</th>
              <td>701,264</td>
              <td>753,977</td>
              <td>772,576</td>
              <td>757,077</td>
              <td>678,555</td>
            </tr>
            <tr>
              <th scope="row">유동부채(계)</th>
              <td>465,891</td>
              <td>514,319</td>
              <td>529,389</td>
              <td>481,954</td>
              <td>504,190</td>
            </tr>
            <tr>
              <th scope="row">비유동부채(계)</th>
              <td>77,566</td>
              <td>77,063</td>
              <td>76,503</td>
              <td>79,473</td>
              <td>14,692</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">부채총계</th>
              <td>543,458</td>
              <td>591,382</td>
              <td>605,893</td>
              <td>561,427</td>
              <td>518,882</td>
            </tr>
            <tr>
              <th scope="row">자본금</th>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
              <td>20,000</td>
            </tr>
            <tr>
              <th scope="row">이익잉여금</th>
              <td>91,190</td>
              <td>96,015</td>
              <td>100,103</td>
              <td>128,450</td>
              <td>75,960</td>
            </tr>
            <tr>
              <th scope="row">기타자본항목</th>
              <td>46,615</td>
              <td>46,578</td>
              <td>46,579</td>
              <td>47,198</td>
              <td>63,713</td>
            </tr>
            <tr class="emp-fw">
              <th scope="row">자본총계</th>
              <td>157,806</td>
              <td>162,594</td>
              <td>166,682</td>
              <td>195,649</td>
              <td>159,673</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="scroll-box 2017" style="display: none">
          <table class="tbl-list">
            <caption><span class="blind">2017년 재무상태 정보</span></caption>
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
                <th scope="col">FY 2016</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <th scope="row">유동자산(계)</th>
                  <td>363,696</td>
                  <td>333,509</td>
                  <td>274,158</td>
                  <td>323,558</td>
                  <td>370,776</td>
                </tr>
                <tr>
                    <th scope="row">비유동자산(계)</th>
                    <td>341,125</td>
                    <td>340,438</td>
                    <td>342,566</td>
                    <td>354,997</td>
                    <td>363,678</td>
                </tr>
                <tr class="emp-fw">
                    <th scope="row">자산총계</th>
                    <td>704,821</td>
                    <td>673,948</td>
                    <td>616,725</td>
                    <td>678,555</td>
                    <td>734,455</td>
                </tr>
                <tr>
                    <th scope="row">유동부채(계)</th>
                    <td>557,598</td>
                    <td>513,769</td>
                    <td>446,138</td>
                    <td>504,190</td>
                    <td>592,143</td>
                </tr>
                <tr>
                    <th scope="row">비유동부채(계)</th>
                    <td>16,356</td>
                    <td>18,176</td>
                    <td>19,084</td>
                    <td>14,692</td>
                    <td>14,348</td>
                </tr>
                <tr class="emp-fw">
                    <th scope="row">부채총계</th>
                    <td>573,954</td>
                    <td>531,945</td>
                    <td>465,223</td>
                    <td>518,882</td>
                    <td>606,491</td>
                </tr>
                <tr>
                    <th scope="row">자본금</th>
                    <td>20,000</td>
                    <td>20,000</td>
                    <td>20,000</td>
                    <td>20,000</td>
                    <td>20,000</td>
                </tr>
                <tr>
                    <th scope="row">이익잉여금</th>
                    <td>55,973</td>
                    <td>66,911</td>
                    <td>76,411</td>
                    <td>75,960</td>
                    <td>53,069</td>
                </tr>
                <tr>
                    <th scope="row">기타자본항목</th>
                    <td>54,894</td>
                    <td>55,090</td>
                    <td>55,090</td>
                    <td>63,713</td>
                    <td>54,894</td>
                </tr>
                <tr class="emp-fw">
                    <th scope="row">자본총계</th>
                    <td>130,867</td>
                    <td>142,002</td>
                    <td>151,501</td>
                    <td>159,673</td>
                    <td>127,964</td>
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
