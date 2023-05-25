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
          <div class="dropdown tabs js-dropdown" placeholder="이사회">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="ture">이사회</button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="false"><button type="button" data-value="">주주구성</button></li>
              <li role="option" aria-selected="true"><button type="button" data-value="">이사회</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">외부감사인 &amp; ESG등급현황</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">지배구조헌장</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">ESG 정보공시</button></li>
            </ul>
          </div>
          <div class="tab-list" role="tablist">
            <button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="false">주주구성</button>
            <button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="true" class="active">이사회</button>
            <button type="button" id="tab3" role="tab" aria-controls="tab-content3" aria-selected="false">외부감사인 &amp; ESG등급현황</button>
            <button type="button" id="tab4" role="tab" aria-controls="tab-content4" aria-selected="false">지배구조헌장</button>
            <button type="button" id="tab5" role="tab" aria-controls="tab-content5" aria-selected="false">ESG 정보공시</button>
          </div>
          <div class="tab-content">
            <div id="tab-content2" class="content active" role="tabpanel" aria-labelledby="tab2" tabindex="0">
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
                  <img src="/images/information/img-if4-03.png" alt="이사회, 감사위원회:감사수행, 영업보고, 이사직무보고, 사외이사 후보 추천 위원회:사회이사 후보 추천, 내부거래위원회: 계열사간 상품•용역거래 투명성 제고, ESG 위원회:윤리경영 실천강화•기업의 사회적 책임 수행, 보상위원회:임원 보상 관련 대내외 정단성 확보">
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
                    <em class="sg-text-07">최진구 감사위원장</em>
                    <ul>
                      <li>이사선임 : 2020.03 / 임기 2년(2022.03~)</li>
                      <li>前 대전지방국세청 청장</li>
                      <li>前 국세청개인납세국 국장</li>
                      <li>前 국세청소득지원국 국장</li>
                      <li>前 부산지방국세청 징세법무국 국장</li>
                    </ul>
                  </li>
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
                  <h3 class="sg-text-04">위원회 구성 - 보상위원회</h3>
                </div>
                <div class="inner-cell">
                  <div class="btn-wrap">
                    <a href="/file/information/10_committee_compensation.docx" class="btn btn-download" download><span>보상위원회 운영규정</span></a>
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
                      <li>前 서울특별시 행정2부시장</li>
                      <li>前 서울특별시청 주택정책실장</li>
                      <li>前 서울특별시청 주택본부 주택기획관</li>
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

              {{-- 이사회(meeting) --}}
              <h3 class="sg-text-04">이사회 진행사항</h3>
              <div class="select-box">
                <select class="year meeting">

                  @if (isset($items_year))

                    @foreach ($items_year as $it)
                      <option value="{{ $it->year }}" @if($it->selected) selected @endif>{{ $it->year }}년</option>
                    @endforeach

                  @endif

                </select>
              </div>

              <dl id="meeting" class="accordion js-accordion meeting">
              </dl>

              {{-- 위원회(committee) --}}
              <h3 class="sg-text-04">위원회 운영내역</h3>
              <div class="select-box">
                <select class="year committee">

                  @if (isset($items_year))

                    @foreach ($items_year as $it)
                      <option value="{{ $it->year }}" @if($it->selected) selected @endif>{{ $it->year }}년</option>
                    @endforeach

                  @endif

                </select>
              </div>
              <div id="committee" class="tab-box committee">
              </div>

              <span class="sg-text-10">“-”표시사항은 보고안건임</span>
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

      $(document).ready(function () {
        $.switchUI.init($.viewType)

        $('#tab-content2').addClass('active');

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

      // 이사회 진행사항, 위원회 운영내역
      $('select.year').each(function () {
        $(this).on('change', function (e) {
          let year = e.target.value
          let $select = $(this)
          let type = $select.hasClass('meeting') ? 'meeting' : 'committee'
          let url = (type === 'meeting')? "{{ url('/api/meeting/getContent') }}" : "{{ url('/api/committee/getContent') }}";
          let params = {
            year: year
          }
          com_utils.post(url, params, response);

        }).trigger('change')
      })

      //--------------------------------------------
      function response(res)
      {
          if ( !com_utils.isEmpty(res) )
          {
              if (res.code == '0000')
              {
                let $id = $("#"+res.data.type);
                $id.empty();
                $id.html(res.data.html);
                $id.accordion('clear').accordion()
              }
          }
        }

    })(window.jQuery)
  </script>
</body>
</html>
