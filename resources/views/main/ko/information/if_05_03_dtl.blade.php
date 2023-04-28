<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 직무소개"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents section">
    <div class="details-section if">
      <picture>
        {{-- <source media="(max-width: 1024px)" srcset="/images/information/img-if5-visual01-m.png">
        <img src="/images/information/img-if5-visual01.png" alt=""> --}}
        <source media="(max-width: 1024px)" srcset="{{ (isset($item->detail_mo_image))?$item->detail_mo_image:'' }}">
        <img src="{{ (isset($item->detail_image))?$item->detail_image:'' }}" alt="">

      </picture>
      <div class="inner section header-black">
        <div class="tab js-tab">
          <div class="dropdown tabs js-dropdown" placeholder="직무소개">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false">직무소개</button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="false"><button type="button" data-value="">직무소개</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">현직자 인터뷰</button></li>
            </ul>
          </div>
          <div class="tab-list" role="tablist">
            <button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="true">직무소개</button>
            <button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="false">현직자 인터뷰</button>
          </div>
          <div class="tab-content">
            <div id="tab-content1" class="content" role="tabpanel" aria-labelledby="tab1" tabindex="0">
              <div class="flex-box">
                <div class="inner-cell">
                  <h3 class="sg-text-04">{{ $item->part_nm }}/{{ $item->duty_nm }}</h3>
                </div>
                <div class="inner-cell">
                  {!! $item->duty_desc !!}
                </div>
              </div>
            </div>
            <div id="tab-content2" class="content" role="tabpanel" aria-labelledby="tab2" tabindex="0">
              <div class="flex-box">
                <div class="inner-cell">
                  <h3 class="sg-text-04">{{ $item->part_nm }}/{{ $item->duty_nm }}<br>{{ $item->name }}</h3>
                </div>
                <div class="inner-cell">
                  <div class="img-wrap">

                    <picture>

                      <source media="(max-width: 1024px)" srcset="{{ (isset($item->person_mo_image))?$item->person_mo_image:'' }}">
                      <img src="{{ (isset($item->person_image))?$item->person_image:'' }}" alt="">

                    </picture>

                  </div>

                  {!! $item->interview !!}

              </div>
            </div>
          </div>
        </div>
        <div class="detail-view">
          <h3 class="title">신세계건설의 <br class="pc-only">직무 더보기</h3>
          <div class="swiper-container">
            <div class="swiper-wrapper">

              @if( isset($items) )

                @foreach($items as $item)

                  <div class="swiper-slide">
                    <a href="{{ url('job-introduction-dtl?id='.$item->id) }}">
                      <picture>
                        <source media="(max-width: 1024px)" srcset="{{ (isset($item->thumb_mo_image))?$item->thumb_mo_image:'' }}">
                        <img src="{{ (isset($item->thumb_image))?$item->thumb_image:'' }}" alt="{{ $item->duty_nm }}/{{ $item->part_nm }}">
                      </picture>

                      <em class="name">{{ $item->duty_nm }}</em>
                      <span class="txt">{{ $item->part_nm }}</span>
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
      $.depth1Index = 3
      $.depth2Index = 4

      $(document).ready(function () {
        $.switchUI.init($.viewType)

        let swiper = new Swiper('.detail-view .swiper-container', {
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
