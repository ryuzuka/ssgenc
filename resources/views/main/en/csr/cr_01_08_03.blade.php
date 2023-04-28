<!DOCTYPE html>
<html lang="ko">

<head>
  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : Customer Service Center"
  ])
</head>

<body class="en">
  <div class="wrap">
    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="visual csr section">
        <div class="text-box">
          <h2 class="sg-text-01">@if($type=='01') Customer Service Center @else Ombudsman @endif</h2>
          <p class="sg-text-05">Tell us your story for a better day</p>
        </div>
      </div>
      <div class="sub-content c-cr08 section header-black">
        <div class="inner">
          <h3 class="sg-text-03">Search your @if($type=='01') inquiry @else report @endif</h3>
          <div class="cr-inquiry">

            <dl class="accordion js-accordion">

              @if (isset($items))

                @foreach($items as $item)

                  <dt class="accordion-head">
                    <button type="button" aria-controls="acco-content1" aria-expanded="false">
                      <span class="category">{{ $item->gubun }}</span>
                      <span class="subject">{{ $item->subject }}</span>

                      @if (isset($item->reply))
                        <span class="state complate">Reply completed</span>
                      @endif

                      <div class="info">
                        <span class="write">{{ $item->cust_nm }}</span>
                        <span class="date">Date of inquiry <span>{{ $item->created_at }}</span></span>
                      </div>
                    </button>
                  </dt>
                  <dd class="accordion-content">
                    <div class="question-content">{!! $item->content !!}</div>

                    @if( isset($item) && $item->type == '01' && $item->gubun == 'Order consultation' )

                      <div class="tbl">
                        <dl class="address">
                          <dt><span>Worksite</span></dt>
                          <dd><span>{{ $item->address }}</span></dd>
                        </dl>
                        <dl>
                          <dt><span>District information</span></dt>
                          <dd><span>{{ $item->gu }}</span></dd>
                          <dt><span>용도</span></dt>
                          <dd><span>{{ $item->usage }}</span></dd>
                        </dl>
                        <dl class="column">
                          <dt><span>Gross floor area</span></dt>
                          <dd><span>{{ $item->gfa }} ㎡</span></dd>
                          <dt><span>Number of floors from the ground</span></dt>
                          <dd><span>{{ $item->floors_no }} F</span></dd>
                          <dt><span>Number of households</span></dt>
                          <dd><span>{{ $item->household }} 세대</span></dd>
                        </dl>
                        <dl class="column">
                          <dt><span>Gross floor area</span></dt>
                          <dd><span>{{ $item->land_area }} ㎡</span></dd>
                          <dt><span>Number of floors from the basement</span></dt>
                          <dd><span>B {{ $item->basement_no }}</span></dd>
                          <dt><span>Contract amount</span></dt>
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
                          <span class="date">Date of reply - <span>{{ $item->reply->created_at }}</span></span>
                        </div>
                        <div class="answer">
                          {!! $item->reply->content !!}
                        </div>

                        <br>
                        <div class="group">

                          @if (isset($item->reply->files))
            
                            <div class="file-download">
            
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
