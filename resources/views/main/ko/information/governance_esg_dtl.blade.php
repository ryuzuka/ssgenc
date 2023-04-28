<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 뉴스"
  ])
</head>

<body>
  <div class="wrap header-black">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="sub-content i-if04 section header-black">
        <div class="inner">
          <div class="view">
            <div class="view-subject">
              <em class="sg-text-03">{{ $item->subject }}</em>
              <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('Y.m.d') }}</span>
            </div>
            <div class="view-content">

              @if (isset($item->pc_image) && isset($item->mo_image))

                <div class="img-wrap">
                  <picture>
                    <source media="(max-width: 1024px)" srcset="{{ (isset($item->mo_image))?$item->mo_image:'' }}">
                    <img src="{{ (isset($item->pc_image))?$item->pc_image:'' }}" alt="{{ $item->subject }}">
                  </picture>
                </div>

              @endif

              {!! $item->content !!}

            </div>
          </div>
          <dl class="page">
            <dt>이전글</dt>

            <dd>

              @if ( !isset($prev_item) )
                <a href="#">이전글이 없습니다.</a>
              @else
                <a href="{{ url('governance-esg-dtl?id='.$prev_item->id) }}">{{ $prev_item->subject }}</a>
              @endif

            </dd>

            <dt>다음글</dt>

            <dd>

              @if ( !isset($next_item) )
                <a href="#">다음글이 없습니다.</a>
              @else
                <a href="{{ url('governance-esg-dtl?id='.$next_item->id) }}">{{ $next_item->subject }}</a>
              @endif

            </dd>

          </dl>
          <div class="btn-wrap">
            <a href="{{ url('governance-esg') }}" class="btn btn-primary"><span>목록</span></a>
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
      $.depth2Index = 0

    })(window.jQuery)
  </script>
</body>
</html>
