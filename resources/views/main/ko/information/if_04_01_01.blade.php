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
        <div class="tab governance js-tab">
          <div class="dropdown tabs js-dropdown" placeholder="주주구성">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false">주주구성</button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="false"><button type="button" data-value="">주주구성</button></li>
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
                <tr>
                  <td class="emp">2</td>
                  <td>KB자산운용</td>
                  <td>304,363</td>
                  <td>7.61%</td>
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
                    <li><span>제1호 의안 '재무제표 승인' 가결</span>(1,997,080주 찬성)</li>
                    <li><span>제2호 의안 '사내이사 민일만 선임의 건' 가결</span>(2,037,720주 찬성)</li>
                    <li><span>제3호 의안 '감사위원이 되는 사외이사 이건기 선임의 건' 가결</span>(449,753주 찬성)</li>
                    <li><span>제4호 의안 '이사보수 한도 책정의 건' 가결</span>(1,952,895주 찬성)</li>
                  </ul>
                </div>
              </div>
            </div>
            <div id="tab-content2" class="content" role="tabpanel" aria-labelledby="tab2" tabindex="0">
              <div class="flex-box line justify">
                <div class="inner-cell">
                  <h3 class="sg-text-04">이사회 구성</h3>
                </div>
                <div class="inner-cell type">
                  <p class="sg-text-09">신세계건설 이사회는 사내이사3명, 사외이사3명으로 총 6명의 이사로 구성되어 있습니다.</p>
                  <div class="btn-wrap">
                    <a href="/file/information/00_board_of_directors.pdf" class="btn btn-download" download><span>이사회 운영규정 다운로드</span></a>
                  </div>
                </div>
              </div>
              <div class="img-wrap">
                <picture>
                  <source media="(max-width: 1024px)" srcset="/images/information/img-if4-02-m.png">
                  <img src="/images/information/img-if4-02.png" alt="이사회 = 사내이사 &amp; 사회이사">
                </picture>
              </div>
              <div class="group-in-tab">
                <ul class="list02">
                  <li>
                    <em class="sg-text-07">정두영 사내이사</em>
                    <ul>
                      <li>이사선임 : 2021.03 / 임기 3년(2021.03~)</li>
                      <li>現 신세계건설(주) 대표이사</li>
                      <li>前 신세계건설(주) 영업본부장 부사장</li>
                      <li>前 신세계건설(주) 공사총괄 상무</li>
                      <li>前 신세계건설(주) 영업2담당 상무</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">최진구 사외이사</em>
                    <ul>
                      <li>이사선임 : 2020.03 / 임기 2년(2022.03~)</li>
                      <li>前 대전지방국세청 청장</li>
                      <li>前 국세청개인납세국 국장</li>
                      <li>前 국세청소득지원국 국장</li>
                      <li>前 부산지방국세청 징세법무국 국장</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">민일만 사내이사</em>
                    <ul>
                      <li>이사선임 : 2023.03 / 임기 3년(2023.03~)</li>
                      <li>現 신세계건설(주) HSE본부장 전무</li>
                      <li>前 신세계건설(주) 공사본부장 전무</li>
                      <li>前 신세계건설(주) QSE담당 상무</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">이건기 사외이사</em>
                    <ul>
                      <li>이사선임 : 2023.03 / 임기 2년(2023.03~)</li>
                      <li>前 해외건설협회 회장</li>
                      <li>前 서울특별시 행정2부시장</li>
                      <li>前 서울특별시청 주택정책실장</li>
                      <li>前 서울특별시청 주택본부 주택기획관</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">김정선 사내이사</em>
                    <ul>
                      <li>이사선임 : 2018.03 / 임기 3년(2021.03~)</li>
                      <li>現 신세계건설(주) 지원담당 상무</li>
                      <li>前 (주)조선호텔앤리조트 경영관리팀장</li>
                      <li>前 (주)신세계이마트부문 회계팀장</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">김희관 사외이사</em>
                    <ul>
                      <li>이사선임 : 2022.03 / 임기 2년(2022.03~)</li>
                      <li>現 법무법인 태평양 변호사</li>
                      <li>前 법무연수원 원장</li>
                      <li>前 광주고등검찰청 검사장</li>
                      <li>前 대전고등검찰청 검사장</li>
                    </ul>
                  </li>
                </ul>
              </div>
              <h3 class="sg-text-04">이사회 권한</h3>
              <ul class="list03">
                <li>
                  <em class="sg-text-07">주주총회에 관한 사항</em>
                  <ul>
                    <li>주주총회 소집</li>
                    <li>주주총회 부의 안건</li>
                  </ul>
                </li>
                <li>
                  <em class="sg-text-07">경영일반에 관한 사항</em>
                  <ul>
                    <li>회사경영의 기본방침 결정 및 변경</li>
                    <li>신규사업의 진출</li>
                    <li>지점, 출장소, 사무실 및 현지법인의 설치, 이전 또는 폐지</li>
                    <li>흡수 합병 또는 신설합병의 보고</li>
                    <li>간이합병, 간이분할합병, 소규모 합병 및 소규모 분할 합병의 결정</li>
                    <li>주식의 소각</li>
                  </ul>
                </li>
                <li>
                  <em class="sg-text-07">재무에 관한 사항</em>
                  <ul>
                    <li>주식의 발행에 관한 사항</li>
                    <li>사채의 모집</li>
                    <li>준비금의 자본금 전입</li>
                    <li>전환사채의 발행</li>
                    <li>신주인수권부 사채의 발행</li>
                    <li>중요한 자산의 처분 및 양도, 대규모 재산의 차입</li>
                  </ul>
                </li>
                <li>
                  <em class="sg-text-07">이사, 이사회, 위원회 등에 관한 사항</em>
                  <ul>
                    <li>대표이사의 선정 및 공동대표의 결정</li>
                    <li>이사의 직위 위축 및 해촉</li>
                    <li>이사회 내 위원회의 설치, 운영 및 폐지</li>
                    <li>이사회 내 위원회 위원의 선임 및 해임</li>
                    <li>이사회 내 위원회의 결의사항에 대한 재결의</li>
                  </ul>
                </li>
                <li>
                  <em class="sg-text-07">내부회계관리규정˙재개정 결의 및<br>중요정책 승인</em>
                  <ul>
                    <li>내부회계관리제도와 관련된 조직구조, 보고체계 및 성과평가 연계방식 검토</li>
                    <li>내부회계관리제도의 설계 및 운영에 대한 경영진의 중요한 조치사항 검토</li>
                    <li>내부회계관리제도의 중요한 변화사항에 대한 경영진의 조치사항 검토</li>
                    <li>내부회계관리제도의 평가결과 및 개선조치 확인</li>
                  </ul>
                </li>
                <li>
                  <em class="sg-text-07">기타</em>
                  <ul>
                    <li>중요한 소송의 제기와 화해에 관한사항</li>
                    <li>기타 법령 또는 정관에 관한 사항 및 대표이사가 필요하다고 인정한 사항</li>
                  </ul>
                </li>
              </ul>
              <div class="flex-box vertical">
                <div class="inner-cell">
                  <h3 class="sg-text-04">이사회 내 위원회</h3>
                </div>
                <div class="inner-cell">
                  <p class="sg-text-09">신세계건설은 투명한 경영을 위해 이사회 내에 위원회를 설치, 운영하고 있습니다.</p>
                </div>
              </div>
              <div class="img-wrap">
                <picture>
                  <source media="(max-width: 1024px)" srcset="/images/information/img-if4-03-m.png">
                  <img src="/images/information/img-if4-03.png" alt="이사회, 감사위원회:감사수행, 영업보고, 이사직무보고, 사외이사 후보 추천 위원회:사회이사 후보 추천, 내부거래위원회: 계열사간 상품•용역거래 투명성 제고, ESG 위원회:윤리경영 실천강화•기업의 사회적 책임 수행">
                </picture>
              </div>
              <div class="flex-box line justify">
                <div class="inner-cell">
                  <h3 class="sg-text-04">위원회 구성 - 감사 위원회</h3>
                </div>
                <div class="inner-cell">
                  <div class="btn-wrap">
                    <a href="/file/information/10_committee_inspection.pdf" class="btn btn-download" download><span>감사위원회 운영규정</span></a>
                  </div>
                </div>
              </div>
              <div class="group-in-tab">
                <ul class="list02">
                  <li>
                    <em class="sg-text-07">이건기 감사위원</em>
                    <ul>
                      <li>이사선임 : 2023.03 / 임기 2년(2023.03~)</li>
                      <li>前 해외건설협회 회장</li>
                      <li>前 서울특별시 행정2부시장</li>
                      <li>前 서울특별시청 주택정책실장</li>
                      <li>前 서울특별시청 주택본부 주택기획관</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">김희관 감사위원</em>
                    <ul>
                      <li>이사선임 : 2022.03 / 임기 2년(2022.03~)</li>
                      <li>現 법무법인 태평양 변호사</li>
                      <li>前 법무연수원 원장</li>
                      <li>前 광주고등검찰청 검사장</li>
                      <li>前 대전고등검찰청 검사장</li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="flex-box line justify">
                <div class="inner-cell">
                  <h3 class="sg-text-04">위원회 구성 - 사외이사후보 추천위원회</h3>
                </div>
                <div class="inner-cell">
                  <div class="btn-wrap">
                    <a href="/file/information/10_committee_recommend.pdf" class="btn btn-download" download><span>사외이사후보<br>추천위원회 운영규정</span></a>
                  </div>
                </div>
              </div>
              <div class="group-in-tab">
                <ul class="list02">
                  <li>
                    <em class="sg-text-07">김정선 사내이사</em>
                    <ul>
                      <li>이사선임 : 2018.03 / 임기3년(2021.03~)</li>
                      <li>現 신세계건설(주) 지원담당 상무</li>
                      <li>前 (주)조선호텔앤리조트 경영관리팀장</li>
                      <li>前 (주)신세계이마트부문 회계팀장</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">최진구 사외이사(추천위원장)</em>
                    <ul>
                      <li>이사선임 : 2020.03 / 임기 2년(2022.03~)</li>
                      <li>前 대전지방국세청 청장</li>
                      <li>前 국세청 개인납세국 국장</li>
                      <li>前 국세청 소득지원국 국장</li>
                      <li>前 부산지방국세청 징세법무국 국장</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">이건기 사외이사</em>
                    <ul>
                      <li>이사선임 : 2023.03 / 임기 2년(2023.03~)</li>
                      <li>前 해외건설협회 회장</li>
                      <li>前 서울특별시 행정2부시장</li>
                      <li>前 서울특별시청 주택정책실장</li>
                      <li>前 서울특별시청 주택본부 주택기획관</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">김희관 사외이사</em>
                    <ul>
                      <li>이사선임 : 2022.03 / 임기 2년(2022.03~)</li>
                      <li>現 법무법인 태평양 변호사</li>
                      <li>前 법무연수원 원장</li>
                      <li>前 광주고등검찰청 검사장</li>
                      <li>前 대전고등검찰청 검사장</li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="flex-box line justify">
                <div class="inner-cell">
                  <h3 class="sg-text-04">위원회 구성 - 내부거래위원회</h3>
                </div>
                <div class="inner-cell">
                  <div class="btn-wrap">
                    <a href="/file/information/10_committee_inner.pdf" type="button" class="btn btn-download" download><span>내부거래위원회 운영규정</span></a>
                  </div>
                </div>
              </div>
              <div class="group-in-tab">
                <ul class="list02">
                  <li>
                    <em class="sg-text-07">이건기 사외이사</em>
                    <ul>
                      <li>이사선임 : 2023.03 / 임기 2년(2023.03~)</li>
                      <li>前 해외건설협회 회장</li>
                      <li>前 해외건설협회 회장</li>
                      <li>前 서울특별시청 주택정책실장</li>
                      <li>前 서울특별시청 주택본부 주택기획관</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">김희관 사외이사</em>
                    <ul>
                      <li>이사선임 : 2022.03 / 임기 2년(2022.03~)</li>
                      <li>現 법무법인 태평양 변호사</li>
                      <li>前 법무연수원 원장</li>
                      <li>前 광주고등검찰청 검사장</li>
                      <li>前 대전고등검찰청 검사장</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">김정선 사내이사</em>
                    <ul>
                      <li>이사선임 : 2018.03 / 임기3년(2021.03~)</li>
                      <li>現 신세계건설(주) 지원담당 상무</li>
                      <li>前 (주)조선호텔앤리조트 경영관리팀장</li>
                      <li>前 (주)신세계이마트부문 회계팀장</li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="flex-box line justify">
                <div class="inner-cell">
                  <h3 class="sg-text-04">위원회 구성 - ESG위원회</h3>
                </div>
                <div class="inner-cell">
                  <div class="btn-wrap">
                    <a href="/file/information/10_committee_esg.pdf" class="btn btn-download" download><span>ESG위원회 운영규정</span></a>
                  </div>
                </div>
              </div>
              <div class="group-in-tab">
                <ul class="list02">
                  <li>
                    <em class="sg-text-07">김희관 사외이사</em>
                    <ul>
                      <li>이사선임 : 2022.03 / 임기 2년(2022.03~)</li>
                      <li>現 법무법인 태평양 변호사</li>
                      <li>前 법무연수원 원장</li>
                      <li>前 광주고등검찰청 검사장</li>
                      <li>前 대전고등검찰청 검사장</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">최진구 사외이사</em>
                    <ul>
                      <li>이사선임 : 2020.03 / 임기 2년(2022.03~)</li>
                      <li>前 대전지방국세청 청장</li>
                      <li>前 국세청 개인납세국 국장</li>
                      <li>前 국세청 소득지원국 국장</li>
                      <li>前 부산지방국세청 징세법무국 국장</li>
                    </ul>
                  </li>
                  <li>
                    <em class="sg-text-07">김정선 사내이사</em>
                    <ul>
                      <li>이사선임 : 2018.03 / 임기3년(2021.03~)</li>
                      <li>現 신세계건설(주) 지원담당 상무</li>
                      <li>前 (주)조선호텔앤리조트 경영관리팀장</li>
                      <li>前 (주)신세계이마트부문 회계팀장</li>
                    </ul>
                  </li>
                </ul>
              </div>
              <h3 class="sg-text-04">이사회 진행사항</h3>
              <div class="select-box">
                <select class="year progress">
                  <option value="2022" selected>2022년</option>
                  <option value="2021">2021년</option>
                </select>
              </div>
              <dl class="accordion js-accordion progress 2022">
                <dt class="accordion-head"><button type="button" aria-controls="acco-content2-1" aria-expanded="false">1회</button></dt>
                <dd id="acco-content2-1" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">2021년 하반기 임원 성과급 지급의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.01.18</td>
                        <td colspan="3">2021년 하반기 임원 성과급 지급의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content2-2" aria-expanded="false">2회</button></dt>
                <dd id="acco-content2-2" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">제31기 재무제표 및 영업보고서 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.01.27</td>
                        <td colspan="3">제31기 재무제표 및 영업보고서 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>불참</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.01.27</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>불참</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">2022년 안전∙보건 경영계획 보고의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.01.27</td>
                        <td colspan="3">2022년 안전∙보건 경영계획 보고의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>불참</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">2021년 내부회계관리제도 운영실태 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.01.27</td>
                        <td colspan="3">2021년 내부회계관리제도 운영실태 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content2-3" aria-expanded="false">3회</button></dt>
                <dd id="acco-content2-3" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">제31기 재무제표 및 영업보고서 정정 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.02.17</td>
                        <td colspan="3">제31기 재무제표 및 영업보고서 정정 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content2-4" aria-expanded="false">4회</button></dt>
                <dd id="acco-content2-4" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">제31기 정기주주총회 소집의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.02.21</td>
                        <td colspan="3">제31기 정기주주총회 소집의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.02.21</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">제11회 무기명식 무보증사채 발행의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.02.21</td>
                        <td colspan="3">제11회 무기명식 무보증사채 발행의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">2022년 1월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.02.21</td>
                        <td colspan="3">2022년 1월 경영실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">2021년 내부회계관리제도 운영실태 평가 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.02.21</td>
                        <td colspan="3">2021년 내부회계관리제도 운영실태 평가 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content2-5" aria-expanded="false">5회</button></dt>
                <dd id="acco-content2-5" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">천안 백석동 공동주택 사업 및 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.03</td>
                        <td colspan="3">천안 백석동 공동주택 사업 및 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content2-6" aria-expanded="false">6회</button></dt>
                <dd id="acco-content2-6" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">남양주 마석 주상복합 사업 및 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.22</td>
                        <td colspan="3">남양주 마석 주상복합 사업 및 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content2-7" aria-expanded="false">7회</button></dt>
                <dd id="acco-content2-7" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.24</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>김희관</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">2022년 2분기 계열회사와의 상품/용역 거래금액 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.24</td>
                        <td colspan="3">2022년 2분기 계열회사와의 상품/용역 거래금액 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>김희관</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사보수 책정의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.24</td>
                        <td colspan="3">이사보수 책정의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>김희관</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">보상위원회 설치 및 운영규정 제정의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.24</td>
                        <td colspan="3">보상위원회 설치 및 운영규정 제정의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>김희관</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">보상위원회 위원 선임의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.24</td>
                        <td colspan="3">보상위원회 위원 선임의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>김희관</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">내부거래위원회 위원 일부 선임의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.24</td>
                        <td colspan="3">내부거래위원회 위원 일부 선임의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>김희관</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">사외이사후보추천위원회 위원 일부 선임의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.24</td>
                        <td colspan="3">사외이사후보추천위원회 위원 일부 선임의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>김희관</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">ESG위원회 위원 일부 선임의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.24</td>
                        <td colspan="3">ESG위원회 위원 일부 선임의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>김희관</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">2022년 2월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2022.03.24</td>
                        <td colspan="3">2022년 2월 경영실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>김희관</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
              </dl>
              <dl class="accordion js-accordion progress 2021">

                <dt class="accordion-head"><button type="button" aria-controls="acco-content1" aria-expanded="false">1회</button></dt>
                <dd id="acco-content1" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 빌리브클라쎄 오피스텔 중도금 대출 업무 협약체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.01.12</td>
                        <td colspan="3">빌리브클라쎄 오피스텔 중도금 대출 업무 협약체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>

                <dt class="accordion-head"><button type="button" aria-controls="acco-content2" aria-expanded="false">2회</button></dt>
                <dd id="acco-content2" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2020년 하반기 임원 성과급 지급의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.01.18</td>
                        <td colspan="3">2020년 하반기 임원 성과급 지급의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content3" aria-expanded="false">3회</button></dt>
                <dd id="acco-content3" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 제 30기 재무제표 및 영업보고서 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.01.29</td>
                        <td colspan="3">제 30기 재무제표 및 영업보고서 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.01.29</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 이사회 운영규정 개정의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.01.29</td>
                        <td colspan="3">이사회 운영규정 개정의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 감사위원회 운영규정 개정의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.01.29</td>
                        <td colspan="3">감사위원회 운영규정 개정의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2020년 내부 회계관리제도 운영실태 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.01.29</td>
                        <td colspan="3">2020년 내부 회계관리제도 운영실태 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content4" aria-expanded="false">4회</button></dt>
                <dd id="acco-content4" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 화성JW물류센터 사업 및 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.02.05</td>
                        <td colspan="3">화성JW물류센터 사업 및 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 빌리브프리미어 중도금 대출 업무협약 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.02.05</td>
                        <td colspan="3">빌리브프리미어 중도금 대출 업무협약 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content5" aria-expanded="false">5회</button></dt>
                <dd id="acco-content5" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 빌리브아카이브남산 중도금 대출 업무협약 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.02.09</td>
                        <td colspan="3">빌리브아카이브남산 중도금 대출 업무협약 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content6" aria-expanded="false">6회</button></dt>
                <dd id="acco-content6" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 제 30기 정기주주총회 소집의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.02.22</td>
                        <td colspan="3">제 30기 정기주주총회 소집의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.02.22</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 제 10회 무기명식 무보증사채 발행의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.02.22</td>
                        <td colspan="3">제 10회 무기명식 무보증사채 발행의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 1월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.02.22</td>
                        <td colspan="3">2021년 1월 경영실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2020년 내부회계관리제도 운영실태 평가 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.02.22</td>
                        <td colspan="3">2020년 내부회계관리제도 운영실태 평가 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content7" aria-expanded="false">7회</button></dt>
                <dd id="acco-content7" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 빌리브패러그라프 해운대 리파이낸싱 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.02.26</td>
                        <td colspan="3">빌리브패러그라프 해운대 리파이낸싱 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content8" aria-expanded="false">8회</button></dt>
                <dd id="acco-content8" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 ㈜신세계화성 출자의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.03.17</td>
                        <td colspan="3">㈜신세계화성 출자의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content9" aria-expanded="false">9회</button></dt>
                <dd id="acco-content9" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.03.25</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 이사보수 책정의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.03.25</td>
                        <td colspan="3">이사보수 책정의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 2월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.03.25</td>
                        <td colspan="3">2021년 2월 경영실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content10" aria-expanded="false">10회</button></dt>
                <dd id="acco-content10" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 1분기 계열회사와의 상품,용역 거래금액 변경 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.03.31</td>
                        <td colspan="3">2021년 1분기 계열회사와의 상품,용역 거래금액 변경 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 2분기 계열회사와의 상품,용역 거래금액 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.03.31</td>
                        <td colspan="3">2021년 2분기 계열회사와의 상품,용역 거래금액 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content11" aria-expanded="false">11회</button></dt>
                <dd id="acco-content11" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 광주농성동주상복합(빌리브트레비체)리파이낸싱 대출 업무협약 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.04.14</td>
                        <td colspan="3">광주농성동주상복합(빌리브트레비체)리파이낸싱 대출 업무협약 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content12" aria-expanded="false">12회</button></dt>
                <dd id="acco-content12" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.04.19</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 3월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.04.19</td>
                        <td colspan="3">2021년 3월 경영실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content13" aria-expanded="false">13회</button></dt>
                <dd id="acco-content13" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 아난티 강남호텔 신축공사 리파이낸싱 대출약정 체결 및 책임준공확약 등 제공의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.04.21</td>
                        <td colspan="3">아난티 강남호텔 신축공사 리파이낸싱 대출약정 체결 및 책임준공확약 등 제공의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content14" aria-expanded="false">14회</button></dt>
                <dd id="acco-content14" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 대구 본동 주상복합 개발사업 리파이낸싱 대출 업무협약 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.04.28</td>
                        <td colspan="3">대구 본동 주상복합 개발사업 리파이낸싱 대출 업무협약 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 이천 안흥동 272-6 주상복합 사업 및 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.04.28</td>
                        <td colspan="3">이천 안흥동 272-6 주상복합 사업 및 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 이천 안흥동 270 주상복합 사업 및 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.04.28</td>
                        <td colspan="3">이천 안흥동 270 주상복합 사업 및 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content15" aria-expanded="false">15회</button></dt>
                <dd id="acco-content15" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.05.17</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 내부거래위원회 설치 및 운영규정 제정의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.05.17</td>
                        <td colspan="3">내부거래위원회 설치 및 운영규정 제정의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 내부거래위원회 위원 선임의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.05.17</td>
                        <td colspan="3">내부거래위원회 위원 선임의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 ESG위원회 설치 및 운영규정 제정의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.05.17</td>
                        <td colspan="3">ESG위원회 설치 및 운영규정 제정의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 4월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.05.17</td>
                        <td colspan="3">2021년 4월 경영실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content16" aria-expanded="false">16회</button></dt>
                <dd id="acco-content16" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 구)포항역 부지 개발사업 PFV 출자의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.06.04</td>
                        <td colspan="3">구)포항역 부지 개발사업 PFV 출자의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content17" aria-expanded="false">17회</button></dt>
                <dd id="acco-content17" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 구리갈매지식산업센터 중도금대출(우리은행) 업무협약 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.06.07</td>
                        <td colspan="3">구리갈매지식산업센터 중도금대출(우리은행) 업무협약 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 구리갈매지식산업센터 중도금대출(하나은행) 업무협약 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.06.07</td>
                        <td colspan="3">구리갈매지식산업센터 중도금대출(하나은행) 업무협약 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content18" aria-expanded="false">18회</button></dt>
                <dd id="acco-content18" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.06.21</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 제29기 재무제표 재감사 및 기재정정 내용의 보고 및 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.06.21</td>
                        <td colspan="3">제29기 재무제표 재감사 및 기재정정 내용의 보고 및 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 제30기 재무제표 재감사 및 기재정정 내용의 보고 및 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.06.21</td>
                        <td colspan="3">제30기 재무제표 재감사 및 기재정정 내용의 보고 및 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 공정거래 자율준수 프로그램(CP) 운영규정 제정의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.06.21</td>
                        <td colspan="3">공정거래 자율준수 프로그램(CP) 운영규정 제정의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 자율준수관리자 선임의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.06.21</td>
                        <td colspan="3">자율준수관리자 선임의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 5월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.06.21</td>
                        <td colspan="3">2021년 5월 경영실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content19" aria-expanded="false">19회</button></dt>
                <dd id="acco-content19" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 3분기 계열회사와의 상품/용역 거래금액 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.06.30</td>
                        <td colspan="3">2021년 3분기 계열회사와의 상품/용역 거래금액 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content20" aria-expanded="false">20회</button></dt>
                <dd id="acco-content20" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 부산 명지지구 오피스텔 2,5BL 사업 및 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.07.06</td>
                        <td colspan="3">부산 명지지구 오피스텔 2,5BL 사업 및 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content21" aria-expanded="false">21회</button></dt>
                <dd id="acco-content21" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.07.19</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 상반기 임원 성과급 지급의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.07.19</td>
                        <td colspan="3">2021년 상반기 임원 성과급 지급의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 6월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.07.19</td>
                        <td colspan="3">2021년 6월 경영실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 ESG경영 2021년 상반기 실적 및 하반기 계획 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.07.19</td>
                        <td colspan="3">ESG경영 2021년 상반기 실적 및 하반기 계획 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content22" aria-expanded="false">22회</button></dt>
                <dd id="acco-content22" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 연신내 복합개발 신축공사 사업 및 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.08.11</td>
                        <td colspan="3">연신내 복합개발 신축공사 사업 및 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content23" aria-expanded="false">23회</button></dt>
                <dd id="acco-content23" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 부산 명지지구 오피스텔 1,6BL 사업 및 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.08.25</td>
                        <td colspan="3">부산 명지지구 오피스텔 1,6BL 사업 및 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content24" aria-expanded="false">24회</button></dt>
                <dd id="acco-content24" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 구)포항역 개발사업 브릿지론(BL) 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.09.14</td>
                        <td colspan="3">구)포항역 개발사업 브릿지론(BL) 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content25" aria-expanded="false">25회</button></dt>
                <dd id="acco-content25" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 마포4-15 도시정비형재개발사업 신축공사 사업 및 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.09.24</td>
                        <td colspan="3">마포4-15 도시정비형재개발사업 신축공사 사업 및 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content26" aria-expanded="false">26회</button></dt>
                <dd id="acco-content26" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 주요주주 등과의 거래 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.09.27</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 4분기 계열회사와의 상품/용역 거래금액 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.09.27</td>
                        <td colspan="3">2021년 4분기 계열회사와의 상품/용역 거래금액 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 8월 경역실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.09.27</td>
                        <td colspan="3">2021년 8월 경역실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content27" aria-expanded="false">27회</button></dt>
                <dd id="acco-content27" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 3분기 계열회사와의 상품/용역 거래금액 변경 승인의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.09.30</td>
                        <td colspan="3">2021년 3분기 계열회사와의 상품/용역 거래금액 변경 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content28" aria-expanded="false">28회</button></dt>
                <dd id="acco-content28" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 구리갈매 지식산업센터 중도금대출 업무협약 변경체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.10.01</td>
                        <td colspan="3">구리갈매 지식산업센터 중도금대출 업무협약 변경체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content29" aria-expanded="false">29회</button></dt>
                <dd id="acco-content29" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 부산용호동복합시설(빌리브센트로) 리파이낸싱 대출 업무협약 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.10.07</td>
                        <td colspan="3">부산용호동복합시설(빌리브센트로) 리파이낸싱 대출 업무협약 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content30" aria-expanded="false">30회</button></dt>
                <dd id="acco-content30" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 울산 신정동 22-4 주상복합 사업 및 대출약정 체결의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.10.20</td>
                        <td colspan="3">울산 신정동 22-4 주상복합 사업 및 대출약정 체결의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content31" aria-expanded="false">31회</button></dt>
                <dd id="acco-content31" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 기업지배구조헌장 제정의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.10.25</td>
                        <td colspan="3">기업지배구조헌장 제정의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 9월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.10.25</td>
                        <td colspan="3">2021년 9월 경영실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content32" aria-expanded="false">32회</button></dt>
                <dd id="acco-content32" class="accordion-content">
                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 9월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.11.15</td>
                        <td colspan="3">주요주주 등과의 거래 승인의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 제31회 정기주주총회(회계연도 2021년) 권리행사 주주기준일 확정의 건 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.11.15</td>
                        <td colspan="3">제31회 정기주주총회(회계연도 2021년) 권리행사 주주기준일 확정의 건</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">가결</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>찬성</td>
                        <td>찬성</td>
                        <td>찬성</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="scroll-box">
                    <table class="tbl">
                      <caption><span class="blind">이사회 진행사항 2021년 10월 경영실적 보고 정보</span></caption>
                      <colgroup>
                        <col style="width:19%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                        <col style="width:27%;">
                      </colgroup>
                      <thead>
                      <tr>
                        <th scope="col">개최일자</th>
                        <th scope="col" colspan="3">의안내용</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>2021.11.15</td>
                        <td colspan="3">2021년 10월 경영실적 보고</td>
                      </tr>
                      <tr>
                        <th scope="col">가결여부</th>
                        <th scope="col" colspan="3">사외이사 동의 성명</th>
                      </tr>
                      <tr>
                        <th scope="row" rowspan="2" class="type">보고</th>
                        <td class="name"><span>최진구</span>(출석률100%)</td>
                        <td class="name"><span>조주현</span>(출석률100%)</td>
                        <td class="name"><span>정인창</span>(출석률100%)</td>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </dd>

                {{--
                --------------------------------------

                @if (isset($items_meeting))

                  @foreach($items_meeting as $item)

                    <dt class="accordion-head"><button type="button" aria-controls="acco-content1" aria-expanded="false"
                      >{{ $item->round }}회</button></dt>
                    <dd id="acco-content1" class="accordion-content">
                      <div class="scroll-box">
                        <table class="tbl">
                          <caption><span class="blind">{{ $item->subject }}</span></caption>
                          <colgroup>
                            <col style="width:19%;">
                            @if(isset($item->dir_a_nm)) <col style="width:21%;"> @endif
                            @if(isset($item->dir_b_nm)) <col style="width:21%;"> @endif
                            @if(isset($item->dir_c_nm)) <col style="width:21%;"> @endif
                            @if(isset($item->dir_d_nm)) <col style="width:21%;"> @endif
                          </colgroup>
                          <thead>
                          <tr>
                            <th scope="col">개최일자</th>
                            <th scope="col" colspan="3">의안내용</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>{{ $item->hold_at }}</td>
                            <td colspan="3">{{ $item->subject }}</td>
                          </tr>
                          <tr>
                            <th scope="col">가결여부</th>
                            <th scope="col" colspan="4">사외이사 동의 성명</th>
                          </tr>
                          <tr>
                            <th scope="row" rowspan="2" class="type">{{ $item->vote_st }}</th>
                            @if(isset($item->dir_a_nm)) <td class="name"><span>{{ $item->dir_a_nm }}</span>(출석률100%)</td> @endif
                            @if(isset($item->dir_b_nm)) <td class="name"><span>{{ $item->dir_b_nm }}</span>(출석률100%)</td> @endif
                            @if(isset($item->dir_c_nm)) <td class="name"><span>{{ $item->dir_c_nm }}</span>(출석률100%)</td> @endif
                            @if(isset($item->dir_d_nm)) <td class="name"><span>{{ $item->dir_d_nm }}</span>(출석률100%)</td> @endif
                          </tr>
                          <tr>
                            @if(isset($item->dir_a_yn)) <td>{{ $item->dir_a_yn }}</td> @endif
                            @if(isset($item->dir_b_yn)) <td>{{ $item->dir_b_yn }}</td> @endif
                            @if(isset($item->dir_c_yn)) <td>{{ $item->dir_c_yn }}</td> @endif
                            @if(isset($item->dir_d_yn)) <td>{{ $item->dir_d_yn }}</td> @endif
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </dd>

                  @endforeach

                @endif

                --------------------------------------
                --}}

              </dl>

              <h3 class="sg-text-04">위원회 운영내역</h3>
              <div class="select-box">
                <select class="year history">
                  <option value="2022" selected>2022년</option>
                  <option value="2021">2021년</option>
                </select>
              </div>
              <div class="tab-box history 2022">
                <h4 class="sg-text-06">사외이사 후보추천위원회</h4>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">사외이사 후보 추천의 건 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:21%;">
                      <col style="width:21%;">
                      <col style="width:21%;">
                      <col style="width:21%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="4">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.02.21</td>
                      <td colspan="4">사외이사 후보 추천의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="4">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">사외이사후보추천위원회 위원장 선임의 건 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:21%;">
                      <col style="width:21%;">
                      <col style="width:21%;">
                      <col style="width:21%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="4">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.03.24</td>
                      <td colspan="4">사외이사후보추천위원회 위원장 선임의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="4">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>김희관</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <h4 class="sg-text-06">감사위원회</h4>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">2021년 내부회계관리제도 운영실태 보고 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.01.27</td>
                      <td colspan="3">2021년 내부회계관리제도 운영실태 보고</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">보고</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                    </tr>
                    <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">제31기 사업연도 회계 및 업무감사 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.02.21</td>
                      <td colspan="3">제31기 사업연도 회계 및 업무감사</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">2021년 감사결과 보고 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.02.21</td>
                      <td colspan="3">2021년 감사결과 보고</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">보고</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                    </tr>
                    <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">내부회계관리제도 운영실태 평가 보고 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.02.21</td>
                      <td colspan="3">내부회계관리제도 운영실태 평가 보고</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">보고</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                    </tr>
                    <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">감사위원회 위원장 선임의 건 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.03.24</td>
                      <td colspan="3">감사위원회 위원장 선임의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>김희관</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <h4 class="sg-text-06">내부거래위원회</h4>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">신세계 기업집단 계열회사 간 상품 또는 용역 내부거래 심의 건 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.01.27</td>
                      <td colspan="3">신세계 기업집단 계열회사 간 상품 또는 용역 내부거래 심의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <h4 class="sg-text-06">ESG위원회</h4>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">2022년 ESG경영 전략 승인의 건 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.01.27</td>
                      <td colspan="3">2022년 ESG경영 전략 승인의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>정인창</span></td>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>불참</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">2022년 대외기부(사회공헌활동) 계획 승인의 건 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.01.27</td>
                      <td colspan="3">2022년 대외기부(사회공헌활동) 계획 승인의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>정인창</span></td>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>불참</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">ESG위원회 위원장 선임의 건 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.03.24</td>
                      <td colspan="3">ESG위원회 위원장 선임의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>김희관</span></td>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <h4 class="sg-text-06">보상위원회</h4>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">보상위원회 위원장 선임의 건 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2022.03.24</td>
                      <td colspan="3">보상위원회 위원장 선임의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-box history 2021">
                <h4 class="sg-text-06">사업이사 후보추천위원회</h4>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">사업이사 후보추친위원회 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:21%;">
                      <col style="width:21%;">
                      <col style="width:21%;">
                      <col style="width:21%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="4">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2021.02.22</td>
                      <td colspan="4">사외이사 후보 추천의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="4">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <h4 class="sg-text-06">감사위원회</h4>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">감사위원회 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2021.01.29</td>
                      <td colspan="3">2020년 내부 회계관리제도 운영실태 보고</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">보고</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                    </tr>
                    <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">감사위원회 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2021.02.22</td>
                      <td colspan="3">제 30기 사업연도 회계 및 업무감사</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">감사위원회 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2021.02.22</td>
                      <td colspan="3">2020년 감사결과 보고</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">보고</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                    </tr>
                    <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">감사위원회 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2021.01.22</td>
                      <td colspan="3">2020년 내부 회계관리제도 운영실태 평가 보고</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">보고</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                    </tr>
                    <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">감사위원회 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2021.5.17</td>
                      <td colspan="3">지정감사인 선임 관련문서화 사항 변경 승인의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <h4 class="sg-text-06">내부거래위원회</h4>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">내부거래위원회 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2021.05.17</td>
                      <td colspan="3">내부거래위원회 위원장 선임의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">내부거래위원회 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2021.05.17</td>
                      <td colspan="3">신세계 기업집단 계열회사 간 상품<br>또는 용역 내부거래 심의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>조주현</span></td>
                      <td class="name"><span>정인창</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <h4 class="sg-text-06">ESG위원회</h4>
                <div class="scroll-box">
                  <table class="tbl">
                    <caption><span class="blind">내부거래위원회 정보</span></caption>
                    <colgroup>
                      <col style="width:19%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                      <col style="width:27%;">
                    </colgroup>
                    <thead>
                    <tr>
                      <th scope="col">개최일자</th>
                      <th scope="col" colspan="3">의안내용</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>2021.05.17</td>
                      <td colspan="3">ESG위원회 설치 및 운영규정 제정의 건</td>
                    </tr>
                    <tr>
                      <th scope="col">가결여부</th>
                      <th scope="col" colspan="3">사외이사 동의 성명</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" class="type">가결</th>
                      <td class="name"><span>정인창</span></td>
                      <td class="name"><span>최진구</span></td>
                      <td class="name"><span>김정선</span></td>
                    </tr>
                    <tr>
                      <td>찬성</td>
                      <td>찬성</td>
                      <td>찬성</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <span class="sg-text-10">“-”표시사항은 보고안건임</span>
            </div>
            <div id="tab-content3" class="content" role="tabpanel" aria-labelledby="tab3" tabindex="0">
              <h3 class="sg-text-04">외부감사인</h3>
              <ul class="list04">
                <li><em>법인명</em> : 삼정회계법인 </li>
                <li><em>선임일</em> : 제 30기 </li>
                <li><em>계약기간</em> : 제30기~제32기 (2020~2022)</li>
                <li><em>감사의견</em> : 적정 (제32기 연간) </li>
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
              <span class="sg-text-10">※ 평가기관 : 한국기업지배구조원(KCGS)</span>
            </div>
            <div id="tab-content4" class="content" role="tabpanel" aria-labelledby="tab4" tabindex="0">
              <div class="flex-box justify">
                <div class="inner-cell">
                  <h3 class="sg-text-04">전문</h3>
                </div>
                <div class="inner-cell">
                  <div class="btn-wrap">
                    <a href="/file/information/governance_charter.pdf" class="btn btn-download" download><span>지배구조헌장 다운로드</span></a>
                  </div>
                </div>
              </div>
              <p class="sg-text-09">신세계건설㈜(이하 “회사”)는 기업경영 패러다임을 사회적 책임경영으로 선언하고 이를 실천하고 있으며, 법과 양심에 따른 정직하고 투명한 경영, 임직원과 회사가 힘을 합치고 참여하는 자발적인 사회공헌, 협력회사와의 동반성장, 환경과 미래를 생각하는 친환경 경영을 적극 실천하고, 기업의 성장과 고용유지를 통한 국가 경제발전에 기여한다는 근본철학을 가지고 사회적 책임수행을 위해 노력하고 있습니다.
                회사는 주주가 믿고 투자할 수 있는 합리적이고 투명한 경영 활동을 통해 기업가치를 극대화하고, 투명한 기업문화 정착을 위해 다양한 노력을 기울이고 있습니다.<br>
                또한 회사는 경영의 투명성과 효율성 제고를 통해 바람직한 기업지배구조를 만들고자 이사회 중심으로 기업을 운영하고 있습니다. 이사회는 회사의 경영의사결정 기능과 경영감독 기능을 효과적으로 수행하여 기업의 부실화를 예방하며, 이를 통해 회사는 주주, 소비자, 협력회사, 지역사회 등의 이해관계자를 보호하고자 노력하고 있습니다.
                회사는 이러한 기본 경영 이념을 토대로 “신세계건설㈜ 기업지배구조헌장”을 다음과 같이 선언하여 앞으로 ESG 중심 경영을 더욱 강화하여 나아가고자 합니다.</p>
              <h4 class="sg-text-05">제1장 주 주</h4>
              <h5 class="sg-text-06">제 1조 (주주의 권리)</h5>
              <ul class="sg-text-09">
                <li>1. 주주는 회사의 소유자로서 기본 권리를 보호받아야 하며, 회사 이익분배 참여권,주주총회의 참석권 및 의결권, 정기적이고 시의 적절하게 정보를 제공받을 권리를 가진다.</li>
                <li>2. 회사의 존립 및 주주권에 중대한 변화를 가져오는 주요 사항들은 주주총회에서 주주의 권리를 최대한 보장하는 원칙하에 결정된다.</li>
                <li>3. 주주는 주주총회 참석 전에 주주총회의 일시, 장소 및 의안 등 법으로 정한 정보에 관하여 충분한 기간 전에 제공받으며, 주주의 자유 의사에 따라 권리를 행사할 수 있다.</li>
              </ul>
              <h5 class="sg-text-06">제 2조 (주주의 공평한 대우)</h5>
              <ul class="sg-text-09">
                <li>1. 주주는 의결권 있는 주식 1주마다 1의결권을 가지는 것을 원칙으로 하며, 회사는 상법 및 관련 법령이 정하는 바에 따라서 소수 주주권의 보호에 적극 노력한다.</li>
                <li>2. 특정주주에 대한 의결권 제한은 법률이 정하는 바에 따라 엄격하게 이루어져야 한다.</li>
                <li>3. 회사는 주주에게 필요한 정보를 관련법령에 따라 적시에 모든 주주에 공평하게 충분히 이해하기 쉽게 제공한다.</li>
                <li>4. 회사는 다른 주주의 부당한 내부거래 및 자기거래로부터 주주를 보호해야하며 적절한 내부 통제장치를 마련해야 한다.</li>
              </ul>
              <h5 class="sg-text-06">제 3조 (주주의 책임)</h5>
              <ul class="sg-text-09">
                <li>1. 주주는 회사의 발전과 이익을 위해서 적극적으로 의결권을 행사하도록 노력하여야 한다.</li>
                <li>2. 회사의 경영에 영향력을 끼치는 지배주주는 회사와 모든 주주의 이익을 위해 행동해야 하며, 이에 반하는 행동으로 회사와 다른 주주에게 손해를 끼쳐서는 안 된다.</li>
              </ul>
              <h4 class="sg-text-05">제2장 이 사 회</h4>
              <h5 class="sg-text-06">제 1조 (이사회의 기능)</h5>
              <ul class="sg-text-09">
                <li>1. 이사회는 회사경영에 관한 포괄적인 권한을 가지며 회사와 주주의 이익을 위하여 회사의 경영목표와 방침을 정하고 경영진의 활동을 감독한다.</li>
                <li>2. 이사회는 법령 또는 정관에서 정한 사항, 주주총회로부터 위임 받은 사항, 회사 경영의 기본 방침 및 업무 집행에 관한 중요사항을 심의·결정한다.</li>
              </ul>
              <h5 class="sg-text-06">제 2조 (이사회의 구성)</h5>
              <ul class="sg-text-09">
                <li>1. 이사회는 이사전원으로 구성하며, 법령 또는 정관에 의하여 선임된 사외이사를 포함한다.</li>
                <li>2. 이사회는 경영진과 지배주주로부터 독립성을 유지할 수 있도록 사외이사를 이사 총수의 4분의 1이상으로 한다.</li>
                <li>3. 이사는 기업의 경영에 필요한 각 분야의 높은 전문성을 가진 자로 선임하여이사회에 실질적으로 기여할 수 있도록 한다.</li>
                <li>4. 이사회 의장은 이사회운영 규정에 따라 정하며 이사회의 역할이 효과적으로 수행될 수 있도록 책임을 다한다.</li>
              </ul>
              <h5 class="sg-text-06">제 3조 (이사회의 운영)</h5>
              <ul class="sg-text-09">
                <li>1. 이사회는 정기적으로 개최하며, 필요에 따라 임시이사회를 개최한다. 기본적인 이사회 운영에 관한 사항은 이사회 운영 규정에 따른다.</li>
                <li>2. 이사회 결의는 이사 과반수의 출석과 출석이사 과반수로 한다. 단, 아래 사항에 한해서는 의결권 행사 요건을 강화한다.
                  <ul>
                    <li>1) 상법 제397조의 2(회사 기회유용금지) 및 제398조(자기거래금지)에 해당하는 사안과 기타 법령 및 정관에서 의결 요건을 강화한 사안에 대해서는 해당 법령 및 정관에 따른다.</li>
                    <li>2) 의안에 관하여 특별한 이해관계가 있는 이사는 의결을 행사하지 못한다.</li>
                  </ul>
                </li>
                <li>3. 이사회는 법령·정관·이사회 규정에서 정하는 사항을 제외하고는 대표이사 혹은 이사회 내 위원회에 권한을 위임할 수 있다.</li>
              </ul>
              <h5 class="sg-text-06">제 4조 (이사회 내 위원회)</h5>
              <ul class="sg-text-09">
                <li>1. 이사회는 업무 수행의 전문성을 높이며 신속한 의사결정을 위하여 정관이 정한 바에 따라 이사회 내에 각종의 위원회를 설치 할 수 있다.</li>
                <li>2. 이사회로부터 위임된 사항에 대한 위원회의 결의는 이사회 결의와 동일한 효력을 가지며, 모든 위원회의 조직, 운영, 권한에 대한 사항은 각 위원회의 명문화된 규정에 따른다.</li>
              </ul>
              <h5 class="sg-text-06">제 5조 (이사의 의무와 책무)</h5>
              <ul class="sg-text-09">
                <li>1. 이사는 선량한 관리자로서 주의의무를 다하고, 적극적으로 이사회에 참여함으로써 주주의 가치 및 회사의 기업가치 등을 높일 수 있도록 기여한다.</li>
                <li>2. 이사는 직무 수행 중 취득한 회사의 정보를 외부에 누설하거나, 개인 또는 제3자의 이익을 위해서 이용하지 않는다.</li>
                <li>3. 이사가 고의 또는 과실로 법령 또는 정관에 위반한 행위를 하거나 그 임무를게을리한 경우에는 그 이사는 회사에 대하여 연대하여 손해를 배상할 책임이 있다.</li>
                <li>4. 회사는 이사의 객관적인 경영 판단을 존중하고, 유능한 인사를 유치하기 위하여 회사의 비용으로 이사를 위한 손해배상책임보험에 가입한다.</li>
                <li>5. 이사가 의결 안건 검토를 위하여 상당한 정보를 수집하고 이를 충분히 검토하여 합리적인 판단을 내렸다면 회사는 이사의 경영판단을 존중하여야 한다.</li>
              </ul>
              <h5 class="sg-text-06">제 6조 (사외 이사의 역할)</h5>
              <ul class="sg-text-09">
                <li>1. 사외이사는 이사회 활동을 통해 회사의 주요 의사 결정에 독립적으로 참여하고, 이사회의 구성원으로서 경영진을 감독, 지원한다.</li>
                <li>2. 사외이사는 직무수행에 필요한 정보의 제공을 요청할 수 있으며, 회사는 이사가 요청하는 정보를 충분히 제공한다. 또한, 사외이사는 그 직무수행을 위하여 필요한 경우 적절한 절차에 의해 임직원 및 외부 전문가의 자문을 받을 수 있으며, 회사는 이에 소요되는 비용을 지원한다.</li>
                <li>3. 사외이사는 회의 안건에 대해 충분한 사전검토와 준비를 하여 회의에 참석해야 한다.</li>
                <li>4. 회사는 사외이사가 회사의 경영실태를 적기에 정확히 파악할 수 있도록 경영정보를 정기적으로 보고하며 사외 이사의 업무수행에 필요한 지식을 습득할 수 있도록 교육프로그램을 마련하여 운영한다.</li>
              </ul>
              <h4 class="sg-text-05">제3장 감사기구</h4>
              <h5 class="sg-text-06">제 1조 (감사위원회)</h5>
              <ul class="sg-text-09">
                <li>1. 감사위원회는 독립성을 유지하기 위해 3분의 2이상을 사외이사로 구성하며, 전문성을 강화하기 위해 위원 중 1인은 회계 또는 재무 전문가로 한다.</li>
                <li>2. 감사위원회는 이사와 경영진의 업무 집행에 대한 적법성 검사, 회사의 재무활동의 건전성과 타당성 검사, 재무보고의 정확성 검토 및 내부회계 관리제도의 평가, 외부감사인의 감사활동에 대한 평가 등을 수행한다.</li>
                <li>3. 감사위원회의 효율적인 업무 수행을 위하여 감사업무에 필요한 정보에 자유롭게 접근할 수 있으며, 필요한 경우 회사의 비용으로 외부 기관 및 전문가 등에게 자문을 요청 할 수 있다.</li>
              </ul>
              <h5 class="sg-text-06">제 2조 (외부감사인)</h5>
              <ul class="sg-text-09">
                <li>1. 외부감사인은 회사의 경영진 및 지배주주 등으로부터 독립적인 입장에서 공정하게 감사 업무를 수행하여야 한다.</li>
                <li>2. 외부감사인은 감사위원회에서 선임·변경·해임하며, 외부감사 활동 중에 확인한 중요사항을 감사위원회에 보고한다.</li>
                <li>3. 외부감사인은 주주총회에 참석하여 감사보고서에 관한 주주의 질문이 있는 경우 성실히 답변하여야 한다.</li>
              </ul>
              <h4 class="sg-text-05">제4장 이해관계자</h4>
              <ul class="sg-text-09">
                <li>1. 회사는 고객과 직원, 협력사, 지역사회 등 모든 이해관계자의 관심 사항에 성실하게 대응하며 기업의 사회적 책임을 충실히 이행한다.</li>
                <li>2. 회사는 법령이나 계약에 의한 이해관계자의 권리를 충실히 보호하며, 근로기준법 등 노동관계법령을 성실히 준수함으로써 근로조건의 유지, 개선에 노력한다.</li>
                <li>3. 회사는 법령이 허용하는 범위 내에서 이해관계자의 권리 보호에 필요한 정보를 제공한다.</li>
              </ul>
              <h4 class="sg-text-05">제5장 공 시</h4>
              <ul class="sg-text-09">
                <li>1. 회사는 정기적으로 사업보고서, 반기보고서 및 분기보고서 등을 작성하여 공시하며, 주주 및 이해관계자에게 중대한 영향을 미칠 수 있는 사항은 가능한 신속하고 정확하게 공시한다.</li>
                <li>2. 회사는 공시정보 이용자들이 누구나 공평하게 정보를 이용할 수 있도록 정보 공개 범위나 시기에 있어서 공정하게 공시한다.</li>
              </ul>
            </div>

            <div id="tab-content5" class="content" role="tabpanel" aria-labelledby="tab5" tabindex="0">
              <h3 class="sg-text-04">ESG 정보공시</h3>
              <span class="regist-total">총 <span>1</span>개</span>
              <table class="board-list">
                <caption><span class="blind">ESG 정보공시 정보</span></caption>
                <colgroup>
                  <col class="width01">
                  <col class="width02">
                </colgroup>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td class="subject">
                      <a href="/html/information/if_04_01_01_05_dt.html">
                        신세계 ESG 관련 온라인 교육 실적
                        <span class="date">2021.01.01</span>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="paging js-paging">
                <button type="button" class="paging-first" disabled><span class="blind">처음</span></button>
                <button type="button" class="paging-prev" disabled><span class="blind">이전</span></button>
                <div class="paging-list">
                  <a href="#" aria-current="page">1</a>
                  <a href="#">2</a>
                  <a href="#">3</a>
                  <a href="#">4</a>
                  <a href="#">5</a>
                  <a href="#">6</a>
                  <a href="#">7</a>
                  <a href="#">8</a>
                  <a href="#">9</a>
                  <a href="#">10</a>
                </div>
                <button type="button" class="paging-next"><span class="blind">다음</span></button>
                <button type="button" class="paging-last"><span class="blind">마지막</span></button>
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
      $.depth1Index = 3
      $.depth2Index = 3

      $(document).ready(function () {
        $.switchUI.init($.viewType)

        let $page = $('#tab-content5 table tbody')
        let listLength = $page.find('tr').length

        // paging - ESG 정보공시
        $('#tab-content5').find('.regist-total span').text(listLength)
        $('.paging.js-paging').paging({
          offset: 0,            // 현재 페이지 (default: 0)
          limit: 5,             // 한 화면에 보여지는 리스트(게시글) 갯수
          total: listLength     // 전체 리스트 갯수
        }).on('change', e => {
          $page.hide()
          $page.eq(e.offset).show()
          // console.log('paging1, offset: ' + e.offset + ', total: ' + e.total)
        })

        // 이사회 진행사항, 위원회 운영내역
        $('select.year').each(function () {
          $(this).on('change', function (e) {
            let year = e.target.value
            let $select = $(this)
            let type = $select.hasClass('progress') ? 'progress' : 'history'
            let $contents = $select.parent().siblings('.' + type)

            $contents.each(function (index) {
              if ($(this).hasClass(year)) {
                $(this).show()
              } else {
                $(this).hide()
              }
            })
          }).trigger('change')
        })

      })
    })(window.jQuery)
  </script>
</body>
</html>
