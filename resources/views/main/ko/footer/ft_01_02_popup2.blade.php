<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 팝업"
  ])  
</head>

<body>
  <div id="pop-confirm" class="layer" role="dialog" aria-modal="true" style="display:block;">
    <div class="layer-wrap">
      <div class="layer-content">
        등록하시겠습니까?
      </div>
      <div class="button-wrap">
        <button class="btn btn-tertiary-sm">취소</button>
        <button class="btn btn-primary-sm">등록</button>
      </div>
    </div>
  </div>

  <!-- common, plugins, app -->
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/plugins.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <!-- components -->
</body>
</html>
