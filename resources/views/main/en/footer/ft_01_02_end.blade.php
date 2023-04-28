<!DOCTYPE html>
<html lang="en">
<head>

  @include('main.en.inc.meta',[
    "title" => "SHINSEGAE E&C : Contact us"
    ])

</head>

<body class="en">
<div class="wrap">

  @if (isset($mail_form) && $mail_form == false)

    @include('main.en.inc.header')

  @endif

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content f-ft section header-black">
      <div class="inner">
        <div class="sub-header">
          <h2 class="sg-text-06">@if ($type=='01') ustomer's Inquiry @else Reporting @endif</h2>
          <p class="sg-text-01">Your inquiry will be addressed shortly.</p>
        </div>
        <div class="complete">
          <p class="sg-text-04">

            @if ($type=='01')
              <span class="ft-light">1:1 inquiry is submitted.</span><br>Your inquiry number is
            @else
              <span class="ft-light">1:1 report is submitted.</span><br>Your report number is
            @endif
          
          <span class="ft-color">{{ $receipt_id }}</span></p>
          <p class="sg-text-07">Thank you for submitting your comments. We will address them shortly in an accurate manner.<br>
            Our reply to your inquiry can be found in the following menu 
            @if ($type=='01')
              [Customer Service Center > Search inquery]
            @else
              [Reporting > Search report ]
            @endif
          </p>
          <div class="btn-wrap">
            <a href="{{ $url_result }}" class="btn btn-primary"><span>
              @if ($type=='01') Search inquiry @else Search report @endif
            </span></a>
            <a href="{{ $url_main }}" class="btn btn-primary"><span>Back to Main Menu</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--: End #contents -->

  @if (isset($mail_form) && $mail_form == false)

    @include('main.en.inc.footer')
    
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
