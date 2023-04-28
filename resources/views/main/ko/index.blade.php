<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
    "title" => "신세계 건설"
    ])
</head>

<body>

  @if (isset($notices))

    <div class="notice-box">
      <div class="swiper-container">
        <div class="swiper-wrapper">

          @foreach($notices as $it)

            <div class="swiper-slide">
              <a href="{{ $it->url }}">
                {{ $it->subject_ko }}
              </a>
            </div>

          @endforeach

        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="today-box">
        <div class="chk-box">
          <input id="checkToday" type="checkbox">
          <label for="checkToday">오늘은 그만보기</label>
        </div>
        <button type="button" class="close"><span class="blind">공지사항 닫기</span></button>
      </div>
    </div>

  @endif

  <div class="wrap">

    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="main-visual section">
        <div class="swiper-container">
          <div class="swiper-wrapper">

            @php

              $visual_index = 0;

            @endphp

            @foreach($keymsg as $item)

              <div class="swiper-slide">
                @if (!empty($item->url)) <a href="{{ $item->url }}"> @endif

                  @php
                    if ($item->first_view == true)
                    {
                      switch($item->msg_acc)
                      {
                        default:
                        case '01' : $visual_index = 0; break;
                        case '02' : $visual_index = 1; break;
                        case '03' : $visual_index = 2; break;
                      }
                    }

                  @endphp

                  <picture>
                    {{-- 모바일용 메인이미지 --}}
                    <source media="(max-width:1024px)" srcset="{{ $item->mo_image }}">

                    {{-- PC용 메인이미지 --}}
                    <img src="{{ $item->pc_image }}" alt="항상 열린마음 신세계 건설">
                  </picture>

                  <div class="text-box">
                    <h2>{!! isset($item->key_msg_ko)? $item->key_msg_ko : '' !!}</h2>
                    <p class="text">{!! isset($item->key_msg_desc_ko)? $item->key_msg_desc_ko : '' !!}</p>
                  </div>

                @if (isset($item->url)) </a> @endif
              </div>

            @endforeach
            
          </div>

          <div class="swiper-pagination"></div>

        </div>
      </div>

      <div class="csr-index section header-black">
        <h2>‘더 나은’ 일상을<br>만들어가고 있어요</h2>
        <div class="swiper-container">
          <div class="swiper-wrapper">

            @if (isset($contrib))

              @foreach($contrib as $it)

                <div class="swiper-slide">
                  <a href="{{ url('social-contribution-dtl?id='.$it->id) }}">
                    <picture>
                      <source media="(max-width:1024px)" srcset="{{ $it->thumb_mo_image }}">
                      <img src="{{ $it->thumb_image }}" alt="{{ $it->subject_ko }}">
                    </picture>
                    <em class="title">{{ $it->subject_ko }}</em>
                    <span class="text">{{ $it->contrib_nm }}</span>
                  </a>
                </div>

              @endforeach

            @endif

          </div>
        </div>
      </div>

      <div class="project-index section header-black">
        <div class="tab-project">
          <div class="tab-list" role="tablist">
            <span><button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="true">Housing</button></span>
            <span><button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="false">Architecture</button></span>
            <span><button type="button" id="tab3" role="tab" aria-controls="tab-content3" aria-selected="false">Infrastructure</button></span>
            <span><button type="button" id="tab5" role="tab" aria-controls="tab-content4" aria-selected="false">Leisure</button></span>
          </div>
          <div class="tab-content swiper-container">
            <div class="swiper-wrapper">
              <div id="tab-content1" class="swiper-slide content" role="tabpanel" aria-labelledby="tab1" tabindex="0">
                <a href="housing-facility">
                  <em class="name txt" style="opacity:0;">빌리브 하남</em>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/main/img-project01-m.jpg">
                    <img src="/images/main/img-project01.jpg" alt="집에 대한 새로운 생각">
                  </picture>
                  <span class="message txt" style="opacity:0;">집에 대한 새로운 생각</span>
                </a>
              </div>
              <div id="tab-content2" class="swiper-slide content" role="tabpanel" aria-labelledby="tab2" tabindex="0">
                <a href="construction-facility">
                  <em class="name txt" style="opacity:0;">스타필드 안성</em>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/main/img-project02-m.jpg">
                    <img src="/images/main/img-project02.jpg" alt="삶과 어우러지는 공간">
                  </picture>
                  <span class="message txt" style="opacity:0;">삶과 어우러지는 공간</span>
                </a>
              </div>
              <div id="tab-content3" class="swiper-slide content" role="tabpanel" aria-labelledby="tab3" tabindex="0">
                <a href="civil-engineering-facility">
                  <em class="name txt" style="opacity:0;">오산2단지 진입도로</em>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/main/img-project03-m.jpg">
                    <img src="/images/main/img-project03.jpg" alt="자연과 공간의 연결">
                  </picture>
                  <span class="message txt" style="opacity:0;">자연과 공간의 연결</span>
                </a>
              </div>
              <div id="tab-content4" class="swiper-slide content" role="tabpanel" aria-labelledby="tab4" tabindex="0">
                <a href="leisure-business">
                  <em class="name txt" style="opacity:0;">트리니티클럽</em>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/main/img-project04-m.jpg">
                    <img src="/images/main/img-project04.jpg" alt="풍요로움 &amp; 마음의 행복">
                  </picture>
                  <span class="message txt" style="opacity:0;">풍요로움 &amp; 마음의 행복</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="project-result section header-black">
        <ul>
          <li>
            <em class="title">주거시설</em>
            <span class="number"><span>{{ isset($information)? $information->housing : '0' }}</span>건</span>
          </li>
          <li class="construct">
            <em class="title">건축시설</em>
            <span class="number"><span>{{ isset($information)? $information->construct : '0' }}</span>건</span>
          </li>
          <li class="civil-engineering">
            <em class="title">토목시설</em>
            <span class="number"><span>{{ isset($information)? $information->civil : '0' }}</span>건</span>
          </li>
          <li class="leisure">
            <em class="title">레저사업</em>
            <span class="number"><span>{{ isset($information)? $information->leisure : '0' }}</span>개소</span>
          </li>
        </ul>
      </div>

      <div class="lifestyle-section section">
        <a href="https://villiv.co.kr/main" target="_blank" title="새창 열림">
          <picture>
            <source media="(max-width: 1024px)" srcset="/images/main/img-lifestyle-m.jpg">
            <img src="/images/main/img-lifestyle.jpg" alt="다양한 삶에 대한 믿음으로부터 탄생한 신세계 빌리브 VILLIV">
          </picture>
          <div class="inner">
            <h2>
              <span>#Life connected Home</span>
              신세계가 만든<br>라이프스타일 주거 <br class="mobile-only">브랜드 <br class="pc-only">빌리브 VILLIV
            </h2>
            <p class="text">아파트먼트 Apartment를 넘어 라이프스타일먼트 Lifestylement의 실현.<br class="pc-only">
              빌리브는 '좋은 집과 좋은 삶'에 대한 신세계건설의 철학이 담겨 있습니다.</p>
          </div>
        </a>
      </div>
    </div>

    @if (isset($popup))

      <div id="index-popup" class="layer index-popup" role="dialog" aria-modal="true">
        <div class="layer-wrap modal">
          <div class="layer-content">
            <div class="popup-box">
              <a href="{{ $popup->url }}">
                <picture>

                  @php

                    $pc_popupimage = null;
                    $mo_popupimage = null;

                    foreach($popupimg as $img)
                    {
                      switch($img['file_view_id'])
                      {
                        case '#pc_popupimage' : $pc_popupimage = $img['file_path']; break;
                        case '#mo_popupimage' : $mo_popupimage = $img['file_path']; break;
                      }
                    }

                    @endphp

                  <source media="(max-width: 1024px)" srcset="{{ $mo_popupimage }}">
                  <img src="{{ $pc_popupimage }}" alt="">
                </picture>
              </a>
              <div class="text-box">
                <h1 class="layer-title">{!! $popup->subject !!}</h1>
                <p class="layer-text">{!! $popup->descript !!}</p>
              </div>
            </div>

            @if (!empty($popup->url))
              <div class="detail-view">
                <a target="_blank" href="{{ $popup->url }}">@if(!empty($popup->link_text)) {{ $popup->link_text }} @else 자세히보기 @endif</a>
              </div>
            @endif

            <div class="today-close">
              <div class="chk-box">
                <input id="todayEnd" type="checkbox">
                <label for="todayEnd">오늘은 그만보기</label>
              </div>
            </div>
          </div>
          <button class="close"><span class="blind">팝업 닫기</span></button>
        </div>
      </div>

    @endif
    <!--: End #contents -->

    @include('main.ko.inc.footer')

  </div>

  <!-- common, plugins, app -->
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/plugins.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <!-- components -->
  <script type="text/javascript" src="/js/components/Main.js"></script>

  <script>

    let msg_acc = "{{ $visual_index }}";
    ($ => {
      $.depth1Index = -1
      $.depth2Index = -1

      $(document).ready(function () {
        window.SSG.Main.init(msg_acc)
      })
    })(window.jQuery)
  </script>
</body>
</html>
