<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.en.inc.meta',[
    "title" => "SHINSEGAE E&C : Pop-Up"
  ])  
</head>

<body class="en">
  <div id="pop-alert" class="layer" role="dialog" aria-modal="true" style="display:block;">
    <div class="layer-wrap">
      <div class="layer-content">
        Please fill in the required fields
      </div>
      <div class="button-wrap">
        <button class="btn btn-primary-sm">OK</button>
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
