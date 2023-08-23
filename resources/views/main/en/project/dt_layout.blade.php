<!DOCTYPE html>
<html lang="en">
<head>
  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : Project Detail"
  ])
</head>

@php

  // dd($items);

$detail_image_1 = null;
$detail_image_2 = null;
$detail_image_3 = null;
$detail_image_4 = null;

$detail_mo_image_1 = null;
$detail_mo_image_2 = null;
$detail_mo_image_3 = null;
$detail_mo_image_4 = null;

$count = 0;

@endphp

<body class="en">
<div class="wrap">
  @include('main.en.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="details-section">
      <div class="detail-swiper section">
        <div class="swiper-container">
          <div class="swiper-wrapper">

              @if(isset($item_files))

                @foreach($item_files as $it)

                  @php

                    switch($it['file_view_id'])
                    {
                      case '#detail_image_1'    : $detail_image_1     = $it['file_path']; break;
                      case '#detail_image_2'    : $detail_image_2     = $it['file_path']; break;
                      case '#detail_image_3'    : $detail_image_3     = $it['file_path']; break;
                      case '#detail_image_4'    : $detail_image_4     = $it['file_path']; break;
                      case '#detail_mo_image_1' : $detail_mo_image_1  = $it['file_path']; break;
                      case '#detail_mo_image_2' : $detail_mo_image_2  = $it['file_path']; break;
                      case '#detail_mo_image_3' : $detail_mo_image_3  = $it['file_path']; break;
                      case '#detail_mo_image_4' : $detail_mo_image_4  = $it['file_path']; break;
                    }

                  @endphp

                @endforeach

              @endif

              @if (isset($detail_image_1) && isset($detail_mo_image_1))
                <div class="swiper-slide">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="{{ $detail_mo_image_1 }}">
                    <img src="{{ $detail_image_1 }}" alt="">
                  </picture>
                </div>
              @endif

              @if (isset($detail_image_2) && isset($detail_mo_image_2))
                <div class="swiper-slide">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="{{ $detail_mo_image_2 }}">
                    <img src="{{ $detail_image_2 }}" alt="">
                  </picture>
                </div>
                @endif

              @if (isset($detail_image_3) && isset($detail_mo_image_3))
                <div class="swiper-slide">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="{{ $detail_mo_image_3 }}">
                    <img src="{{ $detail_image_3 }}" alt="">
                  </picture>
                </div>
              @endif

              @if (isset($detail_image_4) && isset($detail_mo_image_4))
                <div class="swiper-slide">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="{{ $detail_mo_image_4 }}">
                    <img src="{{ $detail_image_4 }}" alt="">
                  </picture>
                </div>
              @endif

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
      <div class="inner section header-black">
        <div class="detail-info">
          <div class="inner-box">
            <h2 class="title">{{ isset($item->name_en)?$item->name_en:'' }}</h2>
            <p class="desc">{!! $item->desc_en !!}</p>
          </div>
          <div class="inner-box">
            <span>{{ isset($item->address_ko)?$item->address_en:'' }}</span>
            <span class="area">{!! isset($item->volumn_en)?$item->volumn_en:'' !!}</span>
            <span class="date">

              @if ($item->from == $item->to)
                {{ date('Y-m', strtotime($item->from)) }}
              @else
                {{ date('Y-m', strtotime($item->from)) }} ~
                @if($item->project_yn == 'Y') {{ 'under construction' }} @else {{ date('Y-m', strtotime($item->to)) }} @endif
              @endif

            </span>
          </div>
        </div>

        <div class="detail-view">
          <h3 class="title">See more <br class="pc-only">{{ $category }}</h3>
          <div class="swiper-container">
            <div class="swiper-wrapper">

              @if ( isset($items) )

                @foreach($items as $it)

                  <div class="swiper-slide">
                    <a href="{{ url('main-project-detail?id='.$it->id) }}">

                      <picture>

                        @if(isset($items_files))

                          @foreach($items_files as $it_files)

                            @if ($it->attach_id == $it_files[0]['file_id'])

                              @php

                                $thumb_image = null;
                                $thumb_mo_image = null;

                                foreach($it_files as $file)
                                {
                                  switch($file['file_view_id'])
                                  {
                                    case '#thumb_image'    : $thumb_image     = $file['file_path']; break;
                                    case '#thumb_mo_image' : $thumb_mo_image  = $file['file_path']; break;
                                  }
                                }

                              @endphp

                              <source media="(max-width: 1024px)" srcset="{{ $thumb_mo_image }}">

                              <img src="{{ $thumb_image }}" alt="{{ $it->name_en }}">

                              @endif

                            @endforeach

                        @endif

                      </picture>

                      <em class="name">{{ $it->name_en }}</em>
                      <span class="txt">

                        @if ($it->from == $it->to)
                          {{ date('Y-m', strtotime($it->from)) }}
                        @else
                          {{ date('Y-m', strtotime($it->from)) }} ~
                          @if($it->project_yn == 'Y') {{ 'under construction' }} @else {{ date('Y-m', strtotime($it->to)) }} @endif
                        @endif

                      </span>

                    </a>
                  </div>

                @endforeach

              @endif

            </div>
            <div class="swiper-btn-box">
              <div class="swiper-button-prev"><span class="blind">prev</span></div>
              <div class="swiper-button-next"><span class="blind">next</span></div>
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
<script type="text/javascript" src="/js/components/project/ProjectDetail.js"></script>
<script>
  ($ => {
    $.depth1Index = 1
    $.depth2Index = 0

    $(document).ready(function () {
      window.SSG.ProjectDetail.init()
    })
  })(window.jQuery)
</script>
</body>
</html>
