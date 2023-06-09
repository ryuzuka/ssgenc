<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 채용공고"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content i-if05 section header-black">
      <div class="inner">
        <h2 class="sg-text-06">채용공고</h2>
        <div class="tab js-tab">
          <div class="dropdown tabs js-dropdown" placeholder="전체">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false">전체</button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="false"><a href="job-posting?dept=0">전체</a></li>
              <li role="option" aria-selected="false"><a href="job-posting?dept=1">인사</a></li>
              <li role="option" aria-selected="false"><a href="job-posting?dept=2">재무</a></li>
              <li role="option" aria-selected="false"><a href="job-posting?dept=3">외주</a></li>
              <li role="option" aria-selected="false"><a href="job-posting?dept=4">마케팅</a></li>
              <li role="option" aria-selected="false"><a href="job-posting?dept=5">견적</a></li>
              <li role="option" aria-selected="false"><a href="job-posting?dept=6">시공</a></li>
              <li role="option" aria-selected="false"><a href="job-posting?dept=7">안전환경</a></li>
            </ul>
          </div>
          <div class="tab-list" role="tablist">
            <a href="job-posting?dept=0" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="true">전체</a>
            <a href="job-posting?dept=1" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="false">인사</a>
            <a href="job-posting?dept=2" id="tab3" role="tab" aria-controls="tab-content3" aria-selected="false">재무</a>
            <a href="job-posting?dept=3" id="tab4" role="tab" aria-controls="tab-content4" aria-selected="false">외주</a>
            <a href="job-posting?dept=4" id="tab5" role="tab" aria-controls="tab-content5" aria-selected="false">마케팅</a>
            <a href="job-posting?dept=5" id="tab6" role="tab" aria-controls="tab-content6" aria-selected="false">견적</a>
            <a href="job-posting?dept=6" id="tab7" role="tab" aria-controls="tab-content7" aria-selected="false">시공</a>
            <a href="job-posting?dept=7" id="tab8" role="tab" aria-controls="tab-content8" aria-selected="false">안전환경</a>
          </div>
          <div class="tab-content">
            <div id="tab-content1" class="content" role="tabpanel" aria-labelledby="tab1" tabindex="0"></div>
            <div id="tab-content2" class="content" role="tabpanel" aria-labelledby="tab2" tabindex="0"></div>
            <div id="tab-content3" class="content" role="tabpanel" aria-labelledby="tab3" tabindex="0"></div>
            <div id="tab-content4" class="content" role="tabpanel" aria-labelledby="tab4" tabindex="0"></div>
            <div id="tab-content5" class="content" role="tabpanel" aria-labelledby="tab5" tabindex="0"></div>
            <div id="tab-content6" class="content" role="tabpanel" aria-labelledby="tab6" tabindex="0"></div>
            <div id="tab-content7" class="content" role="tabpanel" aria-labelledby="tab7" tabindex="0"></div>
            <div id="tab-content8" class="content" role="tabpanel" aria-labelledby="tab8" tabindex="0"></div>
          </div>
        </div>

        <div class="view">
          <div class="view-subject">
            <span class="category">인사</span>
            <em class="sg-text-03">신세계건설 마케팅 인턴 모집</em>
            <span class="date">2021.01.01</span>
          </div>
          <div class="view-content">
            <em class="sg-text-07">접수 기간 및 방법</em>
            <ul class="list">
              <li>접수기간 : <span class="s-color">2021년 8월 2일(월) ~ 8월 13일(금) 마감일 15:00 접수</span></li>
              <li>접수방법 : 페이지 하단 ‘지원서 작성’ 클릭 → 공고명 확인 후 지원서 작성
                <span class="s-font">※ 그래픽 및 영상 포트폴리오 별도 제출</span></li>
            </ul>
            <em class="sg-text-07">전형방법</em>
            <ul class="list">
              <li>지원서 작성 → 지원자 개별 안내 → 담당자 인터뷰 → 최종입사
                <span class="s-font">※ 지원자 개별 안내는 합격자에 한하여 유선상으로 진행됩니다.</span></li>
            </ul>
          </div>
        </div>
        <dl class="page">
          <dt>이전글</dt>
          <dd>이전글이 없습니다.</dd>
          <dt>다음글</dt>
          <dd><a href="#">신세계건설(주),ESG 내부거래위원회 신설 “투명성강화"</a></dd>
        </dl>
        <div class="btn-wrap">
          <button type="button" class="btn">목록</button>
          <button type="button" class="btn">지원서 작성</button>
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

        let deptIndex = parseInt($.util.urlParam('dept')) || 0
        $('.tab.js-tab').tab('active', deptIndex)
        $('.dropdown.js-dropdown').dropdown('active', deptIndex)
      })
    })(window.jQuery)
  </script>
</body>
</html>
