<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : Result inquiry"
  ])  
</head>

<body class="en">
  <div class="wrap">
    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="visual csr section">
        <div class="text-box">
          <h2 class="sg-text-01">Result inquiry</h2>
          <p class="sg-text-05">Tell us your story for a better day</p>
        </div>
      </div>
      <div class="sub-content c-cr08 section header-black">
        <div class="inner">
          <h3 class="sg-text-03">Search your inquiry</h3>
          <div class="cr-inquiry">
            <div class="question">
              <span class="category">General inquiries</span>
              <span class="subject">Description of your inquiry submitted (00000000)</span>
              <span class="state complate">Reply completed</span>
              <div class="info">
                <span class="write">Hong Gil-Dong</span>
                <span class="date">Date of inquiry <span>00-00-00</span></span>
              </div>
            </div>
            <div class="inquiry-content">
              내용
            </div>
            <div class="answer">
              <span class="subject">Answer to your inquiry</span>
              <div class="group">
                <span class="date">Date of inquiry <span>0000.00.00</span></span>
                <div class="file-download">
                  <span><a href="#">첨부파일명1.pdf</a></span>
                  <span><a href="#">첨부파일명2323231.pdf</a></span>
                  <span><a href="#">첨부파일명23232323.pdf</a></span>
                </div>
              </div>
            </div>
            <div class="inquiry-content">
              답변
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
  <script>
    ($ => {
      $.depth1Index = 2
      $.depth2Index = 7

    })(window.jQuery)
  </script>
</body>
</html>
