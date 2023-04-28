<!DOCTYPE html>
<html lang="en">
<head>
  @include('main.en.inc.meta',[
    "title" => "신세계 건설"
  ])
</head>

<body class="en">
  <div class="wrap">

    @include('main.en.inc.header')

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
                @if (!empty($item->url_en)) <a href="{{ $item->url_en }}"> @endif

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
            <img src="{{ $item->pc_image }}" alt="Our heart is always open">
                  </picture>

          <div class="text-box">
            <h2>{!! isset($item->key_msg_en)? $item->key_msg_en : '' !!}</h2>
            <p class="text">{!! isset($item->key_msg_desc_en)? $item->key_msg_desc_en : '' !!}</p>
              </div>

                @if (isset($item->url)) </a> @endif
              </div>

            @endforeach

          </div>
          
          <div class="swiper-pagination"></div>

        </div>
      </div>

      <div class="csr-index section header-black">
        <h2>Making a daily<br>life “better”</h2>
        <div class="swiper-container">
          <div class="swiper-wrapper">

            @if (isset($contrib))

              @foreach($contrib as $it)

                <div class="swiper-slide">
                  <a href="{{ url('social-contribution-dtl?id='.$it->id) }}">
                    <picture>
                      <source media="(max-width:1024px)" srcset="{{ $it->thumb_mo_image }}">
                      <img src="{{ $it->thumb_image }}" alt="{{ $it->subject_en }}">
                    </picture>
                    <em class="title">{{ $it->subject_en }}</em>
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
                  <em class="name txt" style="opacity:0;">VILLIV Hanam</em>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/main/img-project01-m.jpg">
                    <img src="/images/main/img-project01.jpg" alt=" A new idea of home">
                  </picture>
                  <span class="message txt" style="opacity:0;"> A new idea of home</span>
                </a>
              </div>
              <div id="tab-content2" class="swiper-slide content" role="tabpanel" aria-labelledby="tab2" tabindex="0">
                <a href="construction-facility">
                  <em class="name txt" style="opacity:0;">Starfield Anseong</em>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/main/img-project02-m.jpg">
                    <img src="/images/main/img-project02.jpg" alt="A space that harmonizes with life">
                  </picture>
                  <span class="message txt" style="opacity:0;">A space that harmonizes with life</span>
                </a>
              </div>
              <div id="tab-content3" class="swiper-slide content" role="tabpanel" aria-labelledby="tab3" tabindex="0">
                <a href="civil-engineering-facility">
                  <em class="name txt" style="opacity:0;">Access road for Osan Complex 2</em>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/main/img-project03-m.jpg">
                    <img src="/images/main/img-project03.jpg" alt="Connecting nature and space">
                  </picture>
                  <span class="message txt" style="opacity:0;">Connecting nature and space</span>
                </a>
              </div>
              <div id="tab-content4" class="swiper-slide content" role="tabpanel" aria-labelledby="tab4" tabindex="0">
                <a href="leisure-business">
                  <em class="name txt" style="opacity:0;">Trinity Club</em>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/main/img-project04-m.jpg">
                    <img src="/images/main/img-project04.jpg" alt="Abundance & Happiness of Mind">
                  </picture>
                  <span class="message txt" style="opacity:0;">Abundance & Happiness of Mind</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="project-result section header-black">
        <ul>
          <li>
            <em class="title">Housing facilities</em>
            <span class="number"><span>{{ isset($information)? $information->housing : '0' }}</span> cases</span>
          </li>
          <li class="construct">
            <em class="title">Architectural facilities</em>
            <span class="number"><span>{{ isset($information)? $information->construct : '0' }}</span> cases</span>
          </li>
          <li class="civil-engineering">
            <em class="title">Civil engineering facilities</em>
            <span class="number"><span>{{ isset($information)? $information->civil : '0' }}</span> cases</span>
          </li>
          <li class="leisure">
            <em class="title">Leisure business</em>
            <span class="number"><span>{{ isset($information)? $information->leisure : '0' }}</span> places</span>
          </li>
        </ul>
      </div>

      <div class="lifestyle-section section">
        <a href="https://villiv.co.kr/main" target="_blank" title="새창 열림">
          <picture>
            <source media="(max-width: 1024px)" srcset="/images/main/img-lifestyle-m.jpg">
            <img src="/images/main/img-lifestyle.jpg" alt="Life Connected Builder and Developer VILLIV a lifestyle housing brand created by Shinsegae">
          </picture>
          <div class="inner">
            <h2>
              <span>#Life connected Home</span>
              VILLIV, <br class="pc-only">a lifestyle housing brand created by Shinsegae
            </h2>
            <p class="text">Going beyond just an apartment to realize a Lifestylement. <br class="pc-only">
              VILLIV reflects Shinsegae E&C’s philosophy of “a good home and a good life.” </p>
          </div>
        </a>
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


