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
          <div class="dropdown tabs js-dropdown" placeholder="주주총회공시">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false"></button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="false"><button type="button" data-value="">DART 공시</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">결산공시</button></li>
              <li role="option" aria-selected="true"><button type="button" data-value="">주주총회공시</button></li>
            </ul>
          </div>
          <div class="tab-list" role="tablist">
            <button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="false">DART 공시</button>
            <button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="false">결산공시</button>
            <button type="button" id="tab3" role="tab" aria-controls="tab-content3" aria-selected="true">주주총회공시</button>
          </div>
          <div class="tab-content">
            <div id="tab-content3" class="content" role="tabpanel" aria-labelledby="tab3" tabindex="0">
              <div class="regist-total">
                총 <span>{{ $items_count }}</span>개
              </div>
              <table class="tbl-list">
                <caption><span class="blind">사업보고서 정보</span></caption>
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
{{--
                  <tr>
                    <td>9</td>
                    <td>제30기 주주총회공시</td>
                    <td><a href="/file/information/30th_general_metting_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2021-02-22</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>제29기 주주총회공시</td>
                    <td><a href="/file/information/29th_general_metting_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2020-02-24</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>제28기 주주총회공시</td>
                    <td><a href="/file/information/28th_general_metting_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2019-02-25</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>제27기 주주총회공시</td>
                    <td><a href="/file/information/27th_general_metting_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2018-02-26</td>
                  </tr>
                </tbody>
                <tbody style="display: none">
                  <tr>
                    <td>5</td>
                    <td>제26기 주주총회공시</td>
                    <td><a href="/file/information/26th_general_metting_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2017-02-20</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>제25기 주주총회공시</td>
                    <td><a href="/file/information/25th_general_metting_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2016-02-24</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>제24기 주주총회공시</td>
                    <td><a href="/file/information/24th_general_metting_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2015-02-26</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>제23기 주주총회공시</td>
                    <td><a href="/file/information/23th_general_metting_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2014-02-26</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>제22기 주주총회공시</td>
                    <td><a href="/file/information/22th_general_metting_notice.pdf" class="report" download><span class="blind">결산공시 다운로드</span></a></td>
                    <td>2013-02-25</td>
                  </tr>
                  --}}

                  @if (isset($items))

                    @foreach($items as $item)

                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->subject }}</td>
                      @if($item->file_path=='')
                        <td></td>
                      @else
                        <td><a href="{{ $item->file_path }}" class="report" download><span class="blind">주주총회공시 다운로드</span></a></td>
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



      <div class="group-box group-con">
        <div class="inner">
          <div class="flex-box width-type vertical">
            <div class="inner-cell">
              <h3 class="sg-text-04">주주 제안권</h3>
            </div>
            <div class="inner-cell">
              <p class="sg-text-09">주주제안권이란 소수주주가 회사에 대하여 일정한 사항을 주주총회 의제와 의안으로 채택할것을 제안 할 수 있는 권리를 말합니다.</p>
            </div>
          </div>
          <ul class="list06">
            <li>
              <em>제안권자</em>
              <ul>
                <li>상법은 주주제안권의 행사 요건을 의결권 없는 주식을 제외한 발행주식총수의 0.5%를 6개월 동안 계속하여 보유한 주주도 주주제안권을 행사할 수 있도록 하고 있습니다.</li>
              </ul>
            </li>
            <li>
              <em>행사방법</em>
              <ul>
                <li>주주제안권을 행사하고자 하는 주주는 일정한 사항을 총회의 목적사항으로 할 것을 주총일의 6주전까지 이사(대표이사)에게 서면으로 제안하여야 하며, 회의목적으로 할 사항을 추가하여 당해 주주가 제출한 의안의 요령을 총회 소집통지 또는 공고에 기재할 것을 청구할 수 있습니다.</li>
              </ul>
            </li>
            <li>
              <em>주주제안권의 효과</em>
              <ul>
                <li>주주제안권을 접수 받은 이사는 이사회에 이를 보고하고 이사회는 주주제안의 내용이 법 또는 정관에 위반되는 경우를 제외하고는 이를 총회의 목적사항으로 하여야 하며, 그 주주의 청구가 있는 경우에는 총회에서 당해 의안을 설명할 기회를 주어야 합니다.</li>
              </ul>
            </li>
            <li>
              <em>의결권 행사방법</em>
              <ul>
                <li>주주총회에서의 의결권 행사는 1.직접참석에 의한 의결권 행사 2.위임장을 통한 의결권 대리행사 등의 방법으로 가능하며, 서면투표 및 2인 이상의 이사 선임에 있어 집중투표제도는 채택하고 있지 않습니다.</li>
              </ul>
            </li>
          </ul>
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

        $('#tab-content3').addClass('active');

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
