<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 뉴스"
  ])
</head>

@php
  // dd($prev_item);
@endphp

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content i-if01 section header-black">
      <div class="inner">
        <div class="view">
          <div class="view-subject">
            <span class="category">{{ $item->news_gubun }}</span>
            <em class="sg-text-03">{!! $item->subject !!}</em>
            <span class="date">{{ $item->content }}</span>
          </div>
          <div class="view-content">
            <div class="btn-wrap">
              <button type="button" class="btn btn-primary"><span>기사 원문 보러가기</span></button>
            </div>
          </div>
        </div>
        <dl class="page">
          <dt>이전글</dt>
          <dd>{{ ((isset($prev_item))?$prev_item->subject:'이전글이 없습니다.') }}</dd>
          <dt>다음글</dt>
          <dd><a href="#">신세계건설(주),ESG 내부거래위원회 신설 “투명성강화"</a></dd>
        </dl>
        <div class="btn-wrap">
          <button type="button" class="btn btn-primary"><span>목록</span></button>
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
