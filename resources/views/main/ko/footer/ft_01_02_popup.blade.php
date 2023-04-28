<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 팝업"
  ])  
</head>

<body>
  <div id="pop-alert" class="layer" role="dialog" aria-modal="true" style="display:block;">
    <div class="layer-wrap">
      <div class="layer-content">
        필수항목을 입력해주세요.
      </div>
      <div class="button-wrap">
        <button class="btn btn-primary-sm">확인</button>
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
