<!DOCTYPE html>
<html lang="en">
<head>

  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : Contact Us"
  ])

  <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=emyf5s7xhk&submodules=geocoder"></script>
</head>

<body class="en">
  <div class="wrap">

    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="visual company section">
        <div class="text-box">
          <h2 class="sg-text-01">Contact Us</h2>
        </div>
      </div>
      <div class="sub-content c-cp06 section header-black">
        <div class="inner">
          <ul class="list01">
            <li>
              <em>ADDRESS</em>
              <span class="text">21fl. Danam Tower, Sowol-ro 10,<br>
                Jung-gu, Seoul</span>
            </li>
            <li>
              <em>TEL</em>
              <span class="text">02-3406-6620</span>
            </li>
            <li>
              <em>FAX</em>
              <span class="text">02-3406-6700</span>
            </li>
          </ul>
          <div class="maps">
            <div id="map" style="width:100%;"></div>
          </div>
          <div class="flex-box">
            <div class="inner-cell">
              <h3 class="sg-text-04">BUS</h3>
            </div>
            <div class="inner-cell">
              <dl class="accordion js-accordion">
                <dt class="accordion-head"><button type="button" aria-controls="acco-content1" aria-expanded="false">Heading to Sungnyemun, Namsan Mountain (02-125)</button></dt>
                <dd id="acco-content1" class="accordion-content">
                  <div class="bus-box">
                    <span class="route"></span>
                    <div class="numbers">
                      <span>402</span>
                      <span>405</span>
                    </div>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content2" aria-expanded="false">Accessories Shopping Center in Namdaemun Market (02-124)</button></dt>
                <dd id="acco-content2" class="accordion-content">
                  <div class="bus-box">
                    <span class="route"></span>
                    <div class="numbers">
                      <span>402</span>
                      <span>405</span>
                    </div>
                  </div>
                  <div class="bus-box">
                    <span class="route type01"></span>
                    <div class="numbers">
                      <span>402</span>
                      <span>405</span>
                    </div>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content3" aria-expanded="false">Sungnyemun (02-121)</button></dt>
                <dd id="acco-content3" class="accordion-content">
                  <div class="bus-box">
                    <span class="route type02"></span>
                    <div class="numbers">
                      <span>1150</span>
                      <span>5000A</span>
                      <span>5000B</span>
                      <span>5005</span>
                      <span>5007</span>
                      <span>5500-2</span>
                      <span>9000</span>
                      <span>9000-1</span>
                      <span>9003</span>
                      <span>9007</span>
                      <span>9007-1</span>
                      <span>9200</span>
                      <span>9300</span>
                      <span>9301</span>
                    </div>
                  </div>
                  <div class="bus-box">
                    <span class="route type02"></span>
                    <div class="numbers">
                      <span>8100</span>
                    </div>
                  </div>
                  <div class="bus-box">
                    <span class="route type02"></span>
                    <div class="numbers">
                      <span>9401</span>
                      <span>M4101</span>
                      <span>M4102</span>
                      <span>M7145</span>
                    </div>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content4" aria-expanded="false">Sungnyemun (02-122)</button></dt>
                <dd id="acco-content4" class="accordion-content">
                  <div class="bus-box">
                    <span class="route"></span>
                    <div class="numbers">
                      <span>103</span>
                      <span>105</span>
                      <span>173</span>
                      <span>201</span>
                      <span>202</span>
                      <span>261</span>
                      <span>262</span>
                      <span>400</span>
                      <span>401</span>
                      <span>406</span>
                      <span>701</span>
                      <span>704</span>
                      <div class="n-bus">
                        <span>N15</span>
                        <span>N16</span>
                        <span>N30</span>
                      </div>
                    </div>
                  </div>
                  <div class="bus-box">
                    <span class="route type03"></span>
                    <div class="numbers">
                      <span>7017</span>
                      <span>7021</span>
                      <span>7022</span>
                    </div>
                  </div>
                  <div class="bus-box">
                    <span class="route type01"></span>
                    <div class="numbers">
                      <span>01B</span>
                    </div>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content5" aria-expanded="false">Sungnyemun, Hankook Ilbo (02-118)</button></dt>
                <dd id="acco-content5" class="accordion-content">
                  <div class="bus-box">
                    <span class="route"></span>
                    <div class="numbers">
                      <span>104</span>
                      <span>400</span>
                      <span>700</span>
                      <span>707</span>
                    </div>
                  </div>
                  <div class="bus-box">
                    <span class="route type01"></span>
                    <div class="numbers">
                      <span>790</span>
                      <span>799</span>
                    </div>
                  </div>
                  <div class="bus-box">
                    <span class="route type03"></span>
                    <div class="numbers">
                      <span>7021</span>
                    </div>
                  </div>
                </dd>
                <dt class="accordion-head"><button type="button" aria-controls="acco-content6" aria-expanded="false">Sungnyemun, Hankook Ilbo (02-123)</button></dt>
                <dd id="acco-content6" class="accordion-content">
                  <div class="bus-box">
                    <span class="route"></span>
                    <div class="numbers">
                      <span>402</span>
                      <span>405</span>
                      <span>708</span>
                    </div>
                  </div>
                  <div class="bus-box">
                    <span class="route type04"></span>
                    <div class="numbers">
                      <span>799</span>
                    </div>
                  </div>
                  <div class="bus-box">
                    <span class="route type03"></span>
                    <div class="numbers">
                      <span>7011</span>
                    </div>
                  </div>
                </dd>
              </dl>
            </div>
          </div>
          <div class="flex-box">
            <div class="inner-cell">
              <h3 class="sg-text-04">Subway</h3>
            </div>
            <div class="inner-cell">
              <div class="subway">
                <div class="subway-box">
                  <em>Hoehyeon Station Subway</em>
                  <div class="info">
                    <div class="line">
                      <span class="route type02">line4</span>
                    </div>
                    <span class="text">4 min walk from No.5 exit</span>
                  </div>
                </div>
                <div class="subway-box">
                  <em>Seoul Station Subway</em>
                  <div class="info">
                    <div class="line">
                      <span class="route type02">line4</span>
                    </div>
                    <span class="text">14 min walk from No.4 exit</span>
                  </div>
                  <div class="info">
                    <div class="line">
                      <span class="route type03">center</span>
                      <span class="route">line1</span>
                      <span class="route type04">airport</span>
                    </div>
                    <span class="text">11 min walk from No.1 exit</span>
                  </div>
                </div>
                <div class="subway-box">
                  <em>City Hall Station Subway</em>
                  <div class="info">
                    <div class="line">
                      <span class="route">line1</span>
                      <span class="route type01">line2</span>
                    </div>
                    <span class="text">12 min walk from No. 8 exit</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="btn-wrap">
            <a href="http://app.map.naver.com/launchApp/?version=11&menu=route&elat=37.5585380&elng=126.9754231&etitle=신세계 건설" target="_blank" class="btn btn-primary">
              <span>Find a map</span>
            </a>
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
      $.depth2Index = 4

      /**
      NAVER CLOUD PLATFORM
      Client ID: qj85ppr5zw
      Client Secret: td7exD0cp6klcUbOpsmynZmHVmTu9JpRyAPQ7tQG
      **/

      let geocoding = { // 신세계건설
        lat: '37.5585380', // 위도(Latitude)
        lng: '126.9754231' // 경도(Longitude)
      }

      let map = new naver.maps.Map('map', {
        center: new naver.maps.LatLng(geocoding.lat, geocoding.lng),
        zoom: 17
      })

      new naver.maps.Marker({
        position: new naver.maps.LatLng(geocoding.lat, geocoding.lng),
        map: map,
        icon: {
          content: '<div class="marker"><img src="/images/common/maps-pin.png" alt=""></div>'
        }
      })
    })(window.jQuery)
  </script>
</body>
</html>
