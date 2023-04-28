<!DOCTYPE html>
<html lang="ko">
<head>
    @include('main.ko.inc.meta',[
    "title" => "신세계 건설 : 결과조회"
    ])  
</head>

<body>
    <div class="wrap">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
        <div class="visual csr section">
        <div class="text-box">
            <h2 class="sg-text-01">결과조회</h2>
            <p class="sg-text-05">더 나은 하루를 위해 당신의 이야기를 들려주세요</p>
        </div>
        </div>
        <div class="sub-content c-cr08 section header-black">
        <div class="inner">
            <h3 class="sg-text-03">조회 결과</h3>
            <div class="cr-inquiry">
            <div class="question">
                <span class="category">일반상담</span>
                <span class="subject">상담내용(00000000)</span>
                <span class="state complate">답변완료</span>
                <div class="info">
                <span class="write">홍길동</span>
                <span class="date">상담일 00-00-00</span>
                </div>
            </div>
            <div class="inquiry-content">
                내용
            </div>
            <div class="answer">
                <span class="subject">답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다. 답변 제목입니다.</span>
                <div class="group">
                <span class="date">답변일 - <span>0000.00.00</span></span>
                <div class="file-download">
                    <span><a href="#">첨부파일명1.pdf</a></span>
                    <span><a href="#">첨부파일명2323231.pdf</a></span>
                    <span><a href="#">첨부파일명23232323.pdf</a></span>
                </div>
                </div>
            </div>
            <div class="inquiry-content">
                답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변 답변
            </div>
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
        $.depth1Index = 2
        $.depth2Index = 7

    })(window.jQuery)
    </script>
</body>
</html>
