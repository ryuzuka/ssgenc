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
          <div class="dropdown tabs js-dropdown" placeholder="결산공시">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false"></button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="false"><button type="button" data-value="1">DART 공시</button></li>
              <li role="option" aria-selected="true"><button type="button" data-value="2">결산공시</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="3">주주총회공시</button></li>
            </ul>
          </div>
          <div class="tab-list" role="tablist">
            <button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="false">DART 공시</button>
            <button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="true">결산공시</button>
            <button type="button" id="tab3" role="tab" aria-controls="tab-content3" aria-selected="false">주주총회공시</button>
          </div>
          <div class="tab-content">
            <div id="tab-content2" class="content" role="tabpanel" aria-labelledby="tab2" tabindex="0">
              <div class="regist-total">
                총 <span>5</span>개
              </div>
              <table class="tbl-list">
                <caption><span class="blind">결산공시</span></caption>
                <colgroup>
                  <col style="width:10%;">
                  <col style="width:58%;">
                  <col style="width:16%;">
                  <col style="width:16%;">
                </colgroup>
                <thead>
                  <tr>
                    <th scope="col">번호</th>
                    <th scope="col">제목</th>
                    <th scope="col">다운로드</th>
                    <th scope="col">게시일</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- <tr>
                    <td>9</td>
                    <td>제30기 결산공고</td>
                    <td><a href="/file/information/30th_settlement_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2021-03-25</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>제29기 결산공고</td>
                    <td><a href="/file/information/29th_settlement_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2020-03-24</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>제28기 결산공고</td>
                    <td><a href="/file/information/28th_settlement_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2019-03-13</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>제27기 결산공고</td>
                    <td><a href="/file/information/27th_settlement_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2018-03-15</td>
                  </tr>
                </tbody>
                <tbody style="display: none">
                  <tr>
                    <td>5</td>
                    <td>제26기 결산공고</td>
                    <td><a href="/file/information/26th_settlement_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2017-03-10</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>제25기 결산공고</td>
                    <td><a href="/file/information/25th_settlement_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2016-03-11</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>제24기 결산공고</td>
                    <td><a href="/file/information/24th_settlement_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2015-03-13</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>제23기 결산공고</td>
                    <td><a href="/file/information/23th_settlement_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2014-03-14</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>제22기 결산공고</td>
                    <td><a href="/file/information/22th_settlement_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2013-03-15</td>
                  </tr> --}}

                  @if (isset($items))

                    @foreach($items as $item)

                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->subject }}</td>
                      @if($item->file_path=='')
                        <td></td>
                      @else
                        <td><a href="{{ $item->file_path }}" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                      @endif
                      <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y.m.d') }}</td>
                    </tr>

                    @endforeach

                  @endif

                </tbody>
              </table>

              @include('includes.paginate', ['paginator' => $items])
              
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
      $.depth1Index = 3
      $.depth2Index = 3

      $(document).ready(function () {
        $.switchUI.init($.viewType)

        $('#tab-content2').addClass('active');

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
