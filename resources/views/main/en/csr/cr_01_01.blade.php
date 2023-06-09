<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.en.inc.meta',[
    "title" => "SHINSEGAE E&C : CSR Overview"
    ])
</head>

<body class="en">
  <div class="wrap">

    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="sub-content c-cr01 section header-black">
        <div class="inner">
          <div class="sub-header">
            <em class="sg-text-06">CSR Overview</em>
            <p class="sg-text-03">We wish to continuously expand our <span>corporate social responsibility management</span> to fulfill our <span>responsibilities and missions</span> as a leading construction company.</p>
          </div>
          <div class="img-wrap">
            <picture>
              <source media="(max-width: 1024px)" srcset="/images/en/csr/img-cr1-03-m.png">
              <img src="/images/en/csr/img-cr1-03.png" alt="">
            </picture>
          </div>
          <div class="flex-box">
            <div class="inner-cell">
              <h3 class="sg-text-04">Declaration of <br class="pc-only">CSR Management</h3>
            </div>
            <div class="inner-cell">
              <p class="sg-text-09">Shinsegae E&C declared CSR management as our business management paradigm in 2013. We are striving to fulfill our social responsibilities based on the fundamental philosophies of managing the business honestly and transparently; having our employees and our company to voluntarily engage in social contribution; and contributing to Korea’s economic development through growing our company and maintaining jobs.</p>
              <ul class="list01">
                <li>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/csr/img-cr1-01-m.jpg">
                    <img src="/images/csr/img-cr1-01.jpg" alt="">
                  </picture>
                </li>
                <li>
                  <picture>
                    <source media="(max-width: 1024px)" srcset="/images/csr/img-cr1-02-m.jpg">
                    <img src="/images/csr/img-cr1-02.jpg" alt="">
                  </picture>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="group-box">
          <div class="inner">
            <div class="sub-header">
              <em class="sg-text-06">Quality/Safety and Health/ Environment Policy Goals</em>
              <p class="sg-text-03">All employees shall take on a <span>challenging and evolving attitude</span> to fulfill corporate social responsibilities and achieve continued development of our company by establishing the safety and health/quality/environment management systems (KOSHA-MS, ISO 9001/14001); <span>managing goal achievement progress in a strict manner; innovating the business processes; and achieving ZERO disaster.</span></p>
            </div>
            <ul class="list02">
              <li >
                <em class="in-title">Safety·Health</em>
                <span class="sg-text-07">Mutual cooperation safety&health<br>(management Continuously achieve ZERO in terms of serious disasters)</span>
                <ul>
                  <li>Implementation of company-wide safety and health manage-ment<br>(executives, partners, employees)</li>
                  <li>Safety-first on-site operation and stability Mind Level-Up</li>
                  <li>Preemptive removal of safety risks by strengthening safety inspection activities</li>
                  <li>Securing quality/structural safety</li>
                  <li>Continuous introduction of SMART safety techniques</li>
                </ul>
              </li>
              <li>
                <em class="in-title">Quality</em>
                <span class="sg-text-07">Continue Quality Innovation</span>
                <ul>
                  <li>PJT Reinforcement of quality control activities by stage<br>
                    (Risk Assessment - Implementation - Check - Supplement)</li>
                  <li>Establishment of VILLIV quality standards, systematic quality management activities</li>
                  <li>Efficiency of on-site quality inspection work</li>
                  <li>Establishment of active participation in quality management of construction personnel</li>
                </ul>
              </li>
              <li>
                <em class="in-title">Environment</em>
                <span class="sg-text-07">Establishment of the Environment Management System</span>
                <ul>
                  <li>Establishment of systematic environmental work process</li>
                  <li>Reinforcement of ESG environment management activities in connection with ISO14001</li>
                  <li>Systematization of on-site environmental monitoring</li>
                </ul>
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
      $.depth2Index = 0

    })(window.jQuery)
  </script>
</body>
</html>
