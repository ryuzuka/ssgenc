<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 사회공헌"
  ])
</head>

<body>
  <div class="wrap">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents section">
      <div class="details-section cr">
        <picture>
          <source media="(max-width: 1024px)" srcset="{{ (isset($item->detail_mo_image_1))?$item->detail_mo_image_1:'' }}">
          <img src="{{ (isset($item->detail_image_1))?$item->detail_image_1:'' }}" alt="">
        </picture>
        <div class="inner section header-black">
          <div class="detail-info">
            <div class="head-box">
              <h2 class="sg-text-02">{{ $item->subject_ko }}</h2>
              <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('Y.m.d') }}</span>
            </div>
            <p class="sg-text-09">{!! $item->content_ko !!}</p>
            <div class="img-wrap">
              <picture>
                <source media="(max-width: 1024px)" srcset="{{ (isset($item->detail_mo_image_2))?$item->detail_mo_image_2:'' }}">
                <img src="{{ (isset($item->detail_image_2))?$item->detail_image_2:'' }}" alt="">
              </picture>
            </div>
          </div>
          <div class="detail-view">
            <h3 class="title">사회공헌 활동 <br class="pc-only">더보기</h3>
            <div class="swiper-container">
              <div class="swiper-wrapper">

                @if (isset($items))

                  @foreach($items as $it)

                    <div class="swiper-slide">
                      <a href="{{ url('social-contribution-dtl?id='.$it->id) }}">
                        <picture>
                          <source media="(max-width: 1024px)" srcset="{{ $it->thumb_mo_image }}">
                          <img src="{{ $it->thumb_image }}" alt="{{ $it->subject_ko }}">
                        </picture>
                        <em class="name">{{ $it->subject_ko }}</em>
                        <span class="txt">{{ $it->contrib_nm }}</span>
                      </a>
                    </div>

                  @endforeach

                @endif

              </div>
              <div class="swiper-btn-box">
                <div class="swiper-button-prev"><span class="blind">왼쪽으로 이동</span></div>
                <div class="swiper-button-next"><span class="blind">오른쪽으로 이동</span></div>
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
      $.depth1Index = 2
      $.depth2Index = 2

      $(document).ready(function () {
        let visualSwiper = new Swiper('.detail-swiper .swiper-container', {
          pagination: {
            el: '.detail-swiper .swiper-pagination',
            clickable: true
          },
          speed: 300,
          loop: true,
          on: {
            init () {},
            transitionEnd () {},
            slideChange () {},
            resize () {}
          }
        })

        let projectSwiper = new Swiper('.detail-view .swiper-container', {
          navigation: {
            nextEl: '.detail-view .swiper-button-next',
            prevEl: '.detail-view .swiper-button-prev'
          },
          speed: 300,
          loop: true,
          slidesPerView : 'auto',
          on: {
            init () {},
            transitionEnd () {},
            slideChange () {},
            resize () {}
          }
        })
      })
    })(window.jQuery)
  </script>
</body>
</html>
