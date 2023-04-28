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
          <div class="dropdown tabs js-dropdown" placeholder="ESG 정보공시">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false">ESG 정보공시</button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="false"><button type="button" data-value="">주주구성</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">이사회</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">외부감사인 &amp; ESG등급현황</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">지배구조헌장</button></li>
              <li role="option" aria-selected="true"><button type="button" data-value="">ESG 정보공시</button></li>
            </ul>
          </div>
          <div class="tab-list" role="tablist">
            <button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="false">주주구성</button>
            <button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="false">이사회</button>
            <button type="button" id="tab3" role="tab" aria-controls="tab-content3" aria-selected="false">외부감사인 &amp; ESG등급현황</button>
            <button type="button" id="tab4" role="tab" aria-controls="tab-content4" aria-selected="false">지배구조헌장</button>
            <button type="button" id="tab5" role="tab" aria-controls="tab-content5" aria-selected="true">ESG 정보공시</button>
          </div>

            <div id="tab-content5" class="content" role="tabpanel" aria-labelledby="tab5" tabindex="0">
              <h3 class="sg-text-04">ESG 정보공시</h3>
              <span class="regist-total">총 <span>{{ $items_count }}</span>개</span>
              <table class="board-list">
                <caption><span class="blind">ESG 정보공시 정보</span></caption>
                <colgroup>
                  <col class="width01">
                  <col class="width02">
                </colgroup>
                <tbody>

                  @if($items)
                    @foreach($items as $item)

                      <tr>
                        <td>{{ $item->id }}</td>
                        <td class="subject">
                          <a href="{{ url('governance-esg-dtl?id='.$item->id) }}">
                            {{ $item->subject }}
                            <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('Y.m.d') }}</span>
                          </a>
                        </td>
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
      // $.depth1Index = 3
      // $.depth2Index = 3

      $(document).ready(function () {
        $.switchUI.init($.viewType)

        $('#tab-content5').addClass('active');

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

    })(window.jQuery)
  </script>
</body>
</html>
