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

  @php
    
    $items = json_decode($items);

  @endphp

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content i-if05 section header-black">
      <div class="inner">
        <h2 class="sg-text-06">채용공고</h2>
        <div class="scroll-box">
          <table class="tbl-list">
            <caption><span class="blind">채용공고 정보</span></caption>
            <colgroup>
              <col class="width01">
              <col class="width02">
              <col class="width03">
            </colgroup>
          </table>
        </div>
        <div class="paging js-paging">
          <button type="button" class="paging-first" disabled><span class="blind">처음</span></button>
          <button type="button" class="paging-prev" disabled><span class="blind">이전</span></button>
          <div class="paging-list">
          </div>
          <button type="button" class="paging-next"><span class="blind">다음</span></button>
          <button type="button" class="paging-last"><span class="blind">마지막</span></button>
        </div>
      </div>
    </div>
    <!--: End #contents -->

    <form name="form" target="recruit" action="https://job.shinsegae.com/recruit_info/notice/notice01_view.jsp">
      <input type="hidden" name="notino" />
      <!-- <input type="hidden" name="recrtpnm" /> -->
    </form>

    @include('main.ko.inc.footer')
  </div>
</div>

  <!-- common, plugins, app -->
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/plugins.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <script type="text/javascript" src="/js/components/recruit.js"></script>

  <!-- components -->
  <script>
    ($ => {
      $.depth1Index = 3
      $.depth2Index = 4

      $(document).ready(function () {
        window.SSG.Recruit.init();
      });
    })(window.jQuery);
  </script>

</body>
</html>
