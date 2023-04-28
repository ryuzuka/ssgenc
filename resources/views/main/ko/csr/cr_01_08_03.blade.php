<!DOCTYPE html>
<html lang="ko">

<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 고객상담실"
  ])
</head>

<body>
  <div class="wrap">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="visual csr section">
        <div class="text-box">
          <h2 class="sg-text-01">@if($type=='01') 고객상담실 @else 신문고 @endif</h2>
          <p class="sg-text-05">더 나은 하루를 위해 당신의 이야기를 들려주세요</p>
        </div>
      </div>
      <div class="sub-content c-cr08 section header-black">
        <div class="inner">
          <h3 class="sg-text-03">@if($type=='01') 상담결과 @else 제보결과 @endif 조회</h3>
          <div class="cr-inquiry">

            <dl class="accordion js-accordion">

              @if (isset($items))

                @foreach($items as $item)

                  <dt class="accordion-head">
                    <button type="button" aria-controls="acco-content1" aria-expanded="false">
                      <span class="category">{{ $item->gubun }}</span>
                      <span class="subject">{{ $item->subject }}</span>

                      @if (isset($item->reply))
                        <span class="state complate">답변완료</span>
                      @endif

                      <div class="info">
                        <span class="write">{{ $item->cust_nm }}</span>
                        <span class="date">상담일 <span>{{ $item->created_at }}</span></span>
                      </div>
                    </button>
                  </dt>
                  <dd class="accordion-content">
                    <div>@if($type=='01') 문의번호  @else 제보번호 @endif : [ {{ $item->id }} ]</div>

                    <br>
                    <div class="question-content">{!! $item->content !!}</div>

                    @if( isset($item) && $item->type == '01' && $item->gubun == '수주상담' )

                      <div class="tbl">
                        <dl class="address">
                          <dt><span>공사위치</span></dt>
                          <dd><span>{{ $item->address }}</span></dd>
                        </dl>
                        <dl>
                          <dt><span>지역지구</span></dt>
                          <dd><span>{{ $item->gu }}</span></dd>
                          <dt><span>용도</span></dt>
                          <dd><span>{{ $item->usage }}</span></dd>
                        </dl>
                        <dl class="column">
                          <dt><span>연단적</span></dt>
                          <dd><span>{{ $item->gfa }} ㎡</span></dd>
                          <dt><span>지상층수</span></dt>
                          <dd><span>{{ $item->floors_no }} 층</span></dd>
                          <dt><span>세대수</span></dt>
                          <dd><span>{{ $item->household }} 세대</span></dd>
                        </dl>
                        <dl class="column">
                          <dt><span>대지면적</span></dt>
                          <dd><span>{{ $item->land_area }} ㎡</span></dd>
                          <dt><span>지하층수</span></dt>
                          <dd><span>{{ $item->basement_no }} 층</span></dd>
                          <dt><span>도급액</span></dt>
                          <dd><span>{{ $item->contract_amt }}</span></dd>
                        </dl>
                      </div>

                    @endif

                    <br>
                    <div class="group">

                      @if (isset($item->files))
        
                        <div class="file-download">
        
                          @foreach($item->files as $file)
        
                            <span>
                              <a href="{{ $file['file_path'] }}" download="{{ $file['file_nm'] }}">{{ $file['file_nm'] }}</a>
                            </span>
                            <br>
        
                          @endforeach
        
                        </div>
        
                      @endif
        
                    </div>
              
                    @if (isset($item->reply))

                      <div class="answer-content">
                        <span class="subject">{{ $item->reply->subject }}</span>
                        <div class="group">
                          <span class="date">답변일 - <span>{{ $item->reply->created_at }}</span></span>
                        </div>
                        <div class="answer">
                          {!! $item->reply->content !!}
                        </div>

                        <br>
                        <div class="group">

                          @if (isset($item->reply->files))
            
                            <div class="file-download"></div>
            
                              @foreach($item->reply->files as $file)
            
                                <span>
                                  <a href="{{ $file['file_path'] }}" download="{{ $file['file_nm'] }}">{{ $file['file_nm'] }}</a>
                                </span>
                                <br>
            
                              @endforeach
            
                            </div>
            
                          @endif

                      </div>

                    @endif

                  </dd>

                @endforeach

              @endif

            </dl>
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
