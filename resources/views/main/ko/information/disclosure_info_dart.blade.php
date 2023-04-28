<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 공시정보"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents ">
    <div class="sub-content i-if04 section header-black">
      <div class="inner">
        <div class="sub-header">
          <h2 class="sg-text-06">공시정보</h2>
          <p class="sg-text-01">신세계건설의 공시정보를<br>확인할 수 있습니다.</p>
        </div>
        <div class="tab">
          <div class="dropdown tabs js-dropdown" placeholder="DART 공시">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false"></button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="true"><button type="button" data-value="">DART 공시</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">결산공시</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">주주총회공시</button></li>
            </ul>
          </div>
          <div class="tab-list" role="tablist">
            <button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="true">DART 공시</button>
            <button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="false">결산공시</button>
            <button type="button" id="tab3" role="tab" aria-controls="tab-content3" aria-selected="false">주주총회공시</button>
          </div>
          <div class="tab-content">
            <div id="tab-content1" class="content" role="tabpanel" aria-labelledby="tab1" tabindex="0">
              <div class="iframe-wrap">
                <iframe src="https://dart.fss.or.kr/html/search/SearchCompanyIR3_M.html?textCrpNM=034300" width="100%" height="100%" title="DART 전자공시시스템"></iframe>
              </div>
            </div>
          </div>
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
      // $.depth1Index = 3
      // $.depth2Index = 3

      $(document).ready(function () {
        $.switchUI.init($.viewType)

        $('#tab-content1').addClass('active');

        $('.js-dropdown .dropdown-list button').on('click', function () {
          let index = $(this).parent().index();
          switch(index)
          {
            case 0: $(location).attr('href', "{{ url('disclosure-info') }}"); break;
            case 1: $(location).attr('href', "{{ url('disclosure-info-sd') }}"); break;
            case 2: $(location).attr('href', "{{ url('disclosure-info-gm') }}"); break;
          }
        })

        $('#tab1').on('click', function(){ $(location).attr('href', "{{ url('disclosure-info') }}") })
        $('#tab2').on('click', function(){ $(location).attr('href', "{{ url('disclosure-info-sd') }}") })
        $('#tab3').on('click', function(){ $(location).attr('href', "{{ url('disclosure-info-gm') }}") })

      })
    })(window.jQuery)
  </script>
</body>
</html>
