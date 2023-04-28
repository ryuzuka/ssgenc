<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 뉴스"
  ])
</head>

<body>
  <div class="wrap">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="sub-content i-if01 section header-black">
        <div class="inner">
          <div class="sub-header">
            <em class="sg-text-06">뉴스</em>
            <p class="sg-text-01">신세계건설의 뉴스&amp;공지를 <br class="pc-only">확인할 수 있습니다.</p>
            <a href="/file/information/190730 Shinsegae Brochure.pdf" class="btn btn-download" download><span>E-브로셔 다운로드</span></a>
          </div>
          <span class="regist-total">총 <span>{{ (isset($items_count))? $items_count : 0 }}</span>개</span>
          <table class="board-list notice">
            <caption><span class="blind">뉴스, 공지 정보</span></caption>
            <colgroup>
              <col class="width03">
              <col class="width04">
              <col class="width05">
            </colgroup>
            <tbody>

              @if (isset($items))

                  @php

                    //오름차순 공식
                    // $i = ($items->currentPage()*$items->perPage()-$items->perPage()+1);

                    //내림차순 공식 => 나머지까지 더해서 처리해야 한다.
                    $i = $items->perPage() * ($items->lastPage()-$items->currentPage());
                    $r = $items->total() % $items->perPage();
                    $i += $r;

                  @endphp

                @foreach($items as $item)

                  <tr>
                    <td>{{ $i-- }}</td>
                    <td class="category">
                      <span>{{ $item->news_gubun }}</span>
                    </td>
                    <td class="subject">
                      <a href="{{ url('news-dtl?id='.$item->id) }}">
                        <span class="sub">{{ $item->subject }}</span>
                        {{-- <span class="desc">{!! $item->content !!}</span> --}}
                        <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</span>
                      </a>
                    </td>
                  </tr>

                @endforeach

              @endif

            </tbody>
          </table>

          @include('includes.paginate', ['paginator' => $items])

        </div>
        <div class="group-box">
          <div class="inner">
            <h3 class="sg-text-04">영상</h3>
            <ul class="list01 video-list">
              <li data-pop="video-pop5">
                <a href="#">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/information/img-if1-06-m.jpg">
                    <img src="/images/information/img-if1-06.jpg" alt="">
                  </picture>
                  <div class="desc">
                    <span>폐콘크리트, 버리지 않고 ♻RE:Make♻하는 획기적인 방법!</span>
                  </div>
                </a>
              </li>
              <li data-pop="video-pop4">
                <a href="#">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/information/img-if1-05-m.jpg">
                    <img src="/images/information/img-if1-05.jpg" alt="">
                  </picture>
                  <div class="desc">
                    <span>인프라 甲! "마포에서 처음 만나는 빌리브</span>
                  </div>
                </a>
              </li>
              <li data-pop="video-pop3">
                <a href="#">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/information/img-if1-01-m.jpg">
                    <img src="/images/information/img-if1-01.jpg" alt="">
                  </picture>
                  <div class="desc">
                    <span>건설홍보 매거진 구독자가10만명?</span>
                  </div>
                </a>
              </li>
              <li data-pop="video-pop2" style="display: none">
                <a href="#">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/information/img-if1-02-m.jpg">
                    <img src="/images/information/img-if1-02.jpg" alt="">
                  </picture>
                  <div class="desc">
                    <span>남산뷰가 펼쳐지는 퀀터플 역세권 역세권 역세권 역세권 역세권 역세권</span>
                  </div>
                </a>
              </li>
              <li data-pop="video-pop1" style="display: none">
                <a href="#">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/information/img-if1-03-m.jpg">
                    <img src="/images/information/img-if1-03.jpg" alt="">
                  </picture>
                  <div class="desc">
                    <span>15번째 걸작! 빌리브 패러그라프 해 패러그라프 해 패러그라프 해</span>
                  </div>
                </a>
              </li>
              <li data-pop="video-pop0" style="display: none">
                <a href="#">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/information/img-if1-04-m.jpg">
                    <img src="/images/information/img-if1-04.jpg" alt="">
                  </picture>
                  <div class="desc">
                    <span>[SCS 스페셜] 신세계 건설, '집'을 이야기하다!</span>
                  </div>
                </a>
              </li>
            </ul>
            <div class="btn-wrap">
              <button type="button" class="btn btn-secondary more"><span>영상 더보기</span></button>
            </div>
          </div>
        </div>
      </div>

      <div id="video-pop5" class="layer" role="dialog" aria-modal="true">
        <div class="layer-wrap full">
          <div class="layer-content youtube">
            <iframe class="youtube-player" width="100%" height="100%" src="https://www.youtube.com/embed/fYp8MtB2m_4" title="YouTube video player"></iframe>
            <button class="close mobile"><span class="blind">팝업 닫기</span></button>
          </div>
          <button class="close"><span class="blind">팝업 닫기</span></button>
        </div>
      </div>

      <div id="video-pop4" class="layer" role="dialog" aria-modal="true">
        <div class="layer-wrap full">
          <div class="layer-content youtube">
            <iframe class="youtube-player" width="100%" height="100%" src="https://www.youtube.com/embed/WMny6flqoaw" title="YouTube video player"></iframe>
            <button class="close mobile"><span class="blind">팝업 닫기</span></button>
          </div>
          <button class="close"><span class="blind">팝업 닫기</span></button>
        </div>
      </div>

      <div id="video-pop3" class="layer" role="dialog" aria-modal="true">
        <div class="layer-wrap full">
          <div class="layer-content youtube">
            <iframe class="youtube-player" width="100%" height="100%" src="https://www.youtube.com/embed/OPfSuqs6pII" title="YouTube video player"></iframe>
            <button class="close mobile"><span class="blind">팝업 닫기</span></button>
          </div>
          <button class="close"><span class="blind">팝업 닫기</span></button>
        </div>
      </div>

      <div id="video-pop2" class="layer" role="dialog" aria-modal="true">
        <div class="layer-wrap full">
          <div class="layer-content youtube">
            <iframe class="youtube-player" width="100%" height="100%" src="https://www.youtube.com/embed/UknFaeFvjNw" title="YouTube video player"></iframe>
            <button class="close mobile"><span class="blind">팝업 닫기</span></button>
          </div>
          <button class="close"><span class="blind">팝업 닫기</span></button>
        </div>
      </div>

      <div id="video-pop1" class="layer" role="dialog" aria-modal="true">
        <div class="layer-wrap full">
          <div class="layer-content youtube">
            <iframe class="youtube-player" width="100%" height="100%" src="https://www.youtube.com/embed/zq0RIXy2vvg" title="YouTube video player"></iframe>
            <button class="close mobile"><span class="blind">팝업 닫기</span></button>
          </div>
          <button class="close"><span class="blind">팝업 닫기</span></button>
        </div>
      </div>

      <div id="video-pop0" class="layer" role="dialog" aria-modal="true">
        <div class="layer-wrap full">
          <div class="layer-content youtube">
            <iframe class="youtube-player" width="100%" height="100%" src="https://www.youtube.com/embed/LG8TKw9BbQw" title="YouTube video player"></iframe>
            <button class="close mobile"><span class="blind">팝업 닫기</span></button>
          </div>
          <button class="close"><span class="blind">팝업 닫기</span></button>
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
      $.depth2Index = 0

      $(document).ready(function () {
        let $page = $('table tbody')
        let listLength = $page.find('tr').length

        // paging
        $('.paging.js-paging').paging({
          offset: 0,            // 현재 페이지 (default: 0)
          limit: 5,             // 한 화면에 보여지는 리스트(게시글) 갯수
          total: listLength     // 전체 리스트 갯수
        }).on('change', e => {
          $page.hide()
          $page.eq(e.offset).show()
          console.log('paging, offset: ' + e.offset + ', total: ' + e.total)
        })

        // video pop
        let $video = $('.video-list > li')
        let videoList = []
        let videoListIndex = 0

        $video.find('a').on('click', function (e) {
          let videoPop = $(this).closest('li').data('pop')
          openVideo(videoPop)
          e.preventDefault()
        })
        function openVideo (videoPop) {
          $('#' + videoPop).modal({closedFocus: '.modalBtn.confirm'}, e => {
            if (e.type === 'before-close') {
              // youtube stop
              let $youtube = e.$modal.find('.youtube-player')
              let src = $youtube.attr('src')
              $youtube.attr('src', src)
            }
          })
        }

        $video.each(function (index) {
          videoList[index] = $(this)
        })

        // 영상 더보기
        $('.btn.more').on('click', function (e) {
          videoListIndex++

          for (let i = 0; i < 3; ++i) {
            $video.eq(videoListIndex * 3 + i).show()
            if (videoListIndex * 3 + i >= $video.length - 1) {
              $(this).hide()
            }
          }
        })
      })
    })(window.jQuery)
  </script>
</body>
</html>
