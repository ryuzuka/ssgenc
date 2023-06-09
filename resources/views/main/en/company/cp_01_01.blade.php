<!DOCTYPE html>
<html lang="en">
<head>
  @include('main.en.inc.meta',[
    "title" => "SHINSEGAE E&C : Greetings"
    ])
</head>

<body class="en">
  <div class="wrap">
    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="visual company section">
        <div class="text-box">
          <h2 class="sg-text-01">Greetings</h2>
          <p class="sg-text-05">We will become the HIGH VALUE CREATOR to create the best value with the customer first spirit.</p>
        </div>
      </div>
      <div class="sub-content c-cp01 section header-black">
        <div class="inner">
          <span class="sg-text-05">To create the best value with the customer first spirit,</span>
          <strong class="sg-text-02">We Will Be <span>High Value Creator</span></strong>
          <p class="sg-text-09">Since its foundation in 1991, Shinsegae Engineering & Construction has successfully carried out development and leisure projects centering on constructing distribution and commercial facilities, thereby achieving business performances in a continuously stable manner. In particular, Shinsegae E&C fostered a transparent construction culture through socially responsible management and ethical management that is faithful to fundamentals.<br><br>
            Shinsegae E&C executed various projects in diverse fields through relentless pursuit for innovation and transformation: Shinsegae Centum City, the world's largest department store; Trinity Club, a private golf club designed together with the world-class experts; Starfield Hanam, Korea's largest single-building shopping mall; Dongdaegu Bus Transfer Center, Korea’s first private sector project to combine transportation and commercial facilities; and VILLIV, a residential space that is genuine to serve various lifestyle.<br><br>
            In the future, Shinsegae E&C will become the Life Connected Builder & Development providing services 'across the entire construction sector such as construction, development and operation.' To that end, we will continuously widen our business horizon to include housing, civil engineering, environment, energy, logistics plant, remodeling, and facility management(FM) and discover various profitable products, thereby creating new values and construction services.<br><br>
            We will exert our best to continuously pursue innovation based on fundamentals and principles. We ask for your continued interest and support.<br>
            Thank you.
          </p>
          <div class="sign en">
            <em>CEO</em>
            <span>Doo-young Jeong</span>
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
      $.depth1Index = 0
      $.depth2Index = 0

    })(window.jQuery)
  </script>
</body>
</html>
