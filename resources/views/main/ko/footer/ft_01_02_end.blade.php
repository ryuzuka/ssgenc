<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 문의하기"
  ])
</head>

<body>
<div class="wrap">

  @if (isset($mail_form) && $mail_form == false)

    @include('main.ko.inc.header')

  @endif

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content f-ft section header-black">
      <div class="inner">
        <div class="sub-header">
          <h2 class="sg-text-06"> @if ($type=='01') 문의하기 @else 제보하기 @endif </h2>

            @if ($type=='01')
              <p class="sg-text-01">궁금한 사항에<br>빠르게 답변 드리겠습니다.</p>
            @else
              <p class="sg-text-01">제보하신 내용에 대해<br>빠르게 답변 드리겠습니다.</p>
            @endif

        </div>
        <div class="complete">

          @if ($type=='01')
            <p class="sg-text-04"><span class="ft-light">1:1 문의가 접수되었습니다.</span><br>문의번호는 <span class="ft-color">{{ $receipt_id }}</span> 입니다.</p>
            <p class="sg-text-07">의견 감사드립니다. 보다 신속하고 정확하게 해결해드리겠습니다.<br>
              상담결과는 [고객상담 > 상담결과 조회] 메뉴에서 확인하실 수 있습니다.</p>
          @else
            <p class="sg-text-04"><span class="ft-light">1:1 제보가 접수되었습니다.</span><br>제보번호는 <span class="ft-color">{{ $receipt_id }}</span> 입니다.</p>
            <p class="sg-text-07">의견 감사드립니다. 보다 신속하고 정확하게 해결해드리겠습니다.<br>
              제보결과는 [제보 > 제보 조회] 메뉴에서 확인하실 수 있습니다.</p>
          @endif

          <div class="btn-wrap">

            <a href="{{ $url_result }}" class="btn btn-primary">
              <span>
                @if ($type=='01') 상담결과 조회 @else 제보결과 조회 @endif
              </span>
            </a>

            <a href="{{ $url_main }}" class="btn btn-primary"><span>메인으로 가기</span></a>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--: End #contents -->

  @if (isset($mail_form) && $mail_form == false)

    @include('main.ko.inc.footer')
    
  @endif

</div>

<!-- common, plugins, app -->
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="/js/plugins.js"></script>
<script type="text/javascript" src="/js/index.js"></script>

<!-- components -->
<script>
  ($ => {
    $.depth1Index = -1
    $.depth2Index = -1

    history.pushState(null, null, "{{ url('/') }}");
      window.onpopstate = function(event) {
      history.go(1);
    };

  })(window.jQuery)
</script>
</body>
</html>
