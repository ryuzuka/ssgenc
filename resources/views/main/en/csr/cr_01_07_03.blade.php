<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : Business Partner Portal"
  ])
</head>

<body class="en">
  <div class="wrap">
    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
          <div class="visual csr section">
            <div class="text-box">
              <h2 class="sg-text-01">Business Partner System</h2>
            </div>
          </div>
          <div class="sub-content c-cr07 section header-black">
            <div class="inner">
              <ul class="business-partner">
                <li>
                  <span class="sg-text-03">Business Electronic Procurement System (STEPS)</span>
                  <div class="btn-area">
                    <a href="https://scm.shinsegae-con.co.kr/nexaui/index.html" class="btn btn-primary" target="_blank" title="새창 열림"><span>Learn more</span></a>
                  </div>
                </li>
                <li>
                  <span class="sg-text-03">Business Partner Support System (ONES)</span>
                  <div class="btn-area">
                    <a href="https://efos.shinsegae-con.co.kr/scfoui/index.html" class="btn btn-primary" target="_blank" title="새창 열림"><span>Learn more</span></a>
                  </div>
                </li>
                <li class="qr">
                  <span class="sg-text-03">Mobile ONES for Business Partner</span>
                  <div class="qr-code">
                    <div class="qr-img">
                      <img src="/images/csr/qr.png" alt="">
                    </div>
                    <span class="sg-text-05">QR code for Mobile</span>
                  </div>
                  <div class="btn-area mobile-only">
                    <a href="https://efos.shinsegae-con.co.kr/mssm/appvndr" class="btn btn-primary"><span>Download</span></a>
                    <span class="sg-text-05">Download Mobile App</span>
                  </div>
                </li>
              </ul>
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
  <script>
    ($ => {
      $.depth1Index = 2
      $.depth2Index = 6

    })(window.jQuery)
  </script>
</body>
</html>
