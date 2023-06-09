<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 고객상담실"
  ])
</head>

<body>
<div id="pop-modal" class="layer" role="dialog" aria-modal="true" style="display:block;">
  <div class="layer-wrap modal">
    <div class="layer-content">
      <h1 class="sg-text-05">문의번호 찾기</h1>
      <p class="sg-text-09">상담접수시 입력한 성함과 이메일을 입력하세요.<br>문의번호를 이메일로 재발송해드립니다.</p>
      <div class="layer-input-box">
        <div class="area">
          <label for="inputName">이름<span>*</span></label>
          <div class="input-box">
            <input id="inputName" type="text">
          </div>
        </div>
        <div class="area">
          <label for="inputEmail">이메일<span>*</span></label>
          <div class="mo-flex">
            <div class="input-box">
              <input id="inputEmail" type="text">
            </div>
            @
            <div class="input-box">
              <input type="text">
            </div>
          </div>
          <div class="select-box">
            <select>
              <option>직접입력</option>
              <option>naver.com</option>
              <option>nate.com</option>
              <option>yahoo.co.kr</option>
              <option>hotmail.com</option>
              <option>gmail.com</option>
            </select>
          </div>
        </div>
      </div>
      <div class="btn-wrap">
        <button type="button" class="btn btn-tertiary-sm">취소</button>
        <button type="button" class="btn btn-primary-sm">확인</button>
      </div>
    </div>
    <button class="close"><span class="blind">close</span></button>
  </div>
</div>

  <!-- common, plugins, app -->
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/plugins.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <!-- components -->
</body>
</html>
