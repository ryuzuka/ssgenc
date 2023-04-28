<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : Corporate Social Responsibility"
  ])
</head>

<body class="en">
  <div class="wrap">
    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents section">
      <div class="details-section cr">
        <picture>
          <source media="(max-width: 1024px)" srcset="{{ (isset($item->detail_mo_image_1))?$item->detail_mo_image_1:'' }}">
          <img src="{{ (isset($item->detail_image_1))?$item->detail_image_1:'' }}" alt="">
        </picture>
        <div class="inner section header-black">
          <div class="detail-info">
            <h2 class="sg-text-02">{{ $item->subject_en }}</h2>
            <p class="sg-text-09">{!! $item->content_en !!}</p>
            <div class="img-wrap">
              <picture>
                <source media="(max-width: 1024px)" srcset="{{ (isset($item->detail_mo_image_2))?$item->detail_mo_image_2:'' }}">
                <img src="{{ (isset($item->detail_image_2))?$item->detail_image_2:'' }}" alt="">
              </picture>
            </div>
          </div>
          <div class="detail-view">
            <h3 class="title">Learn more <br class="pc-only">CSR activities</h3>
            <div class="swiper-container">
              <div class="swiper-wrapper">

                @if (isset($items))

                  @foreach($items as $it)

                    <div class="swiper-slide">
                      <a href="{{ url('social-contribution-dtl?id='.$it->id) }}">
                        <picture>
                          <source media="(max-width: 1024px)" srcset="{{ $it->thumb_mo_image }}">
                          <img src="{{ $it->thumb_image }}" alt="{{ $it->subject_en }}">
                        </picture>
                        <em class="name">{{ $it->subject_en }}</em>
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
    @include('main.en.inc.footer')
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
