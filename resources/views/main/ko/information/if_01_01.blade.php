<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 뉴스"
  ])
</head>

@php

  $pc_image = null; 
  $mo_image = null;
  $att_path = null;

  if ( isset($files) )
  {
    foreach($files as $file)
    {
      switch($file['file_view_id'])
      {
        case '#pc_image' : $pc_image = $file['file_path']; break;
        case '#mo_image' : $mo_image = $file['file_path']; break;
        case '#file_attach':
              $att_path = $file['file_path'];
              break;
      }
    }
  }

@endphp

<body>
  <div class="wrap header-black">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="sub-content i-if01 section header-black">
        <div class="inner">
          <div class="view">
            <div class="view-subject">
              <span class="category">{{ $item->news_gubun_nm }}</span>
              <em class="sg-text-03">{!! $item->subject !!}</em>
              <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</span>
              @if($att_path != '')
                <a href="{{ $att_path }}" class="download"><span>자료 다운로드</span></a>
              @endif
            </div>
            <div class="view-content">
              <div class="img-wrap">

                <picture>
                  <source media="(max-width: 1024px)" srcset="{{ $mo_image }}">
                  <img src="{{ $pc_image }}" alt="">
                </picture>

              </div>
              {!! $item->content !!}
            </div>
          </div>
          <dl class="page">
            <dt>이전글</dt>

            <dd>

              @if ( !isset($prev_item) )
                <a href="#">이전글이 없습니다.</a>
              @else
                <a href="{{ url('news-dtl?id='.$prev_item->id) }}">{{ $prev_item->subject }}</a>
              @endif

            </dd>

            <dt>다음글</dt>

            <dd>

              @if ( !isset($next_item) )
                <a href="#">다음글이 없습니다.</a>
              @else
                <a href="{{ url('news-dtl?id='.$next_item->id) }}">{{ $next_item->subject }}</a>
              @endif

            </dd>

          </dl>
          <div class="btn-wrap">
            <a href="news" type="button" class="btn btn-primary"><span>목록</span></a>
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
