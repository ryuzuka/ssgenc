<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 지배구조"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content i-if04 section header-black">
      <div class="inner">
        <h2 class="sg-text-04">지배구조</h2>
        <div class="tab governance">
          <div class="dropdown tabs js-dropdown" placeholder="지배구조헌장">
            <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false">지배구조헌장</button>
            <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
              <li role="option" aria-selected="false"><button type="button" data-value="">주주구성</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">이사회</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">외부감사인 &amp; ESG등급현황</button></li>
              <li role="option" aria-selected="true"><button type="button" data-value="">지배구조헌장</button></li>
              <li role="option" aria-selected="false"><button type="button" data-value="">ESG 정보공시</button></li>
            </ul>
          </div>
          <div class="tab-list" role="tablist">
            <button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="false">주주구성</button>
            <button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="false">이사회</button>
            <button type="button" id="tab3" role="tab" aria-controls="tab-content3" aria-selected="false">외부감사인 &amp; ESG등급현황</button>
            <button type="button" id="tab4" role="tab" aria-controls="tab-content4" aria-selected="true">지배구조헌장</button>
            <button type="button" id="tab5" role="tab" aria-controls="tab-content5" aria-selected="false">ESG 정보공시</button>
          </div>
          <div class="tab-content">
            <div id="tab-content4" class="content" role="tabpanel" aria-labelledby="tab4" tabindex="0">
              <div class="flex-box justify">
                <div class="inner-cell">
                  <h3 class="sg-text-04">전문</h3>
                </div>
                <div class="inner-cell">
                  <div class="btn-wrap">
                    <a href="/file/information/governance_charter.pdf" class="btn btn-download" download><span>지배구조헌장 다운로드</span></a>
                  </div>
                </div>
              </div>
              <p class="sg-text-09">신세계건설㈜(이하 “회사”)는 기업경영 패러다임을 사회적 책임경영으로 선언하고 이를 실천하고 있으며, 법과 양심에 따른 정직하고 투명한 경영, 임직원과 회사가 힘을 합치고 참여하는 자발적인 사회공헌, 협력회사와의 동반성장, 환경과 미래를 생각하는 친환경 경영을 적극 실천하고, 기업의 성장과 고용유지를 통한 국가 경제발전에 기여한다는 근본철학을 가지고 사회적 책임수행을 위해 노력하고 있습니다.
                회사는 주주가 믿고 투자할 수 있는 합리적이고 투명한 경영 활동을 통해 기업가치를 극대화하고, 투명한 기업문화 정착을 위해 다양한 노력을 기울이고 있습니다.<br>
                또한 회사는 경영의 투명성과 효율성 제고를 통해 바람직한 기업지배구조를 만들고자 이사회 중심으로 기업을 운영하고 있습니다. 이사회는 회사의 경영의사결정 기능과 경영감독 기능을 효과적으로 수행하여 기업의 부실화를 예방하며, 이를 통해 회사는 주주, 소비자, 협력회사, 지역사회 등의 이해관계자를 보호하고자 노력하고 있습니다.
                회사는 이러한 기본 경영 이념을 토대로 “신세계건설㈜ 기업지배구조헌장”을 다음과 같이 선언하여 앞으로 ESG 중심 경영을 더욱 강화하여 나아가고자 합니다.</p>
              <h4 class="sg-text-05">제1장 주 주</h4>
              <h5 class="sg-text-06">제 1조 (주주의 권리)</h5>
              <ul class="sg-text-09">
                <li>1. 주주는 회사의 소유자로서 기본 권리를 보호받아야 하며, 회사 이익분배 참여권,주주총회의 참석권 및 의결권, 정기적이고 시의 적절하게 정보를 제공받을 권리를 가진다.</li>
                <li>2. 회사의 존립 및 주주권에 중대한 변화를 가져오는 주요 사항들은 주주총회에서 주주의 권리를 최대한 보장하는 원칙하에 결정된다.</li>
                <li>3. 주주는 주주총회 참석 전에 주주총회의 일시, 장소 및 의안 등 법으로 정한 정보에 관하여 충분한 기간 전에 제공받으며, 주주의 자유 의사에 따라 권리를 행사할 수 있다.</li>
              </ul>
              <h5 class="sg-text-06">제 2조 (주주의 공평한 대우)</h5>
              <ul class="sg-text-09">
                <li>1. 주주는 의결권 있는 주식 1주마다 1의결권을 가지는 것을 원칙으로 하며, 회사는 상법 및 관련 법령이 정하는 바에 따라서 소수 주주권의 보호에 적극 노력한다.</li>
                <li>2. 특정주주에 대한 의결권 제한은 법률이 정하는 바에 따라 엄격하게 이루어져야 한다.</li>
                <li>3. 회사는 주주에게 필요한 정보를 관련법령에 따라 적시에 모든 주주에 공평하게 충분히 이해하기 쉽게 제공한다.</li>
                <li>4. 회사는 다른 주주의 부당한 내부거래 및 자기거래로부터 주주를 보호해야하며 적절한 내부 통제장치를 마련해야 한다.</li>
              </ul>
              <h5 class="sg-text-06">제 3조 (주주의 책임)</h5>
              <ul class="sg-text-09">
                <li>1. 주주는 회사의 발전과 이익을 위해서 적극적으로 의결권을 행사하도록 노력하여야 한다.</li>
                <li>2. 회사의 경영에 영향력을 끼치는 지배주주는 회사와 모든 주주의 이익을 위해 행동해야 하며, 이에 반하는 행동으로 회사와 다른 주주에게 손해를 끼쳐서는 안 된다.</li>
              </ul>
              <h4 class="sg-text-05">제2장 이 사 회</h4>
              <h5 class="sg-text-06">제 1조 (이사회의 기능)</h5>
              <ul class="sg-text-09">
                <li>1. 이사회는 회사경영에 관한 포괄적인 권한을 가지며 회사와 주주의 이익을 위하여 회사의 경영목표와 방침을 정하고 경영진의 활동을 감독한다.</li>
                <li>2. 이사회는 법령 또는 정관에서 정한 사항, 주주총회로부터 위임 받은 사항, 회사 경영의 기본 방침 및 업무 집행에 관한 중요사항을 심의·결정한다.</li>
              </ul>
              <h5 class="sg-text-06">제 2조 (이사회의 구성)</h5>
              <ul class="sg-text-09">
                <li>1. 이사회는 이사전원으로 구성하며, 법령 또는 정관에 의하여 선임된 사외이사를 포함한다.</li>
                <li>2. 이사회는 경영진과 지배주주로부터 독립성을 유지할 수 있도록 사외이사를 이사 총수의 4분의 1이상으로 한다.</li>
                <li>3. 이사는 기업의 경영에 필요한 각 분야의 높은 전문성을 가진 자로 선임하여이사회에 실질적으로 기여할 수 있도록 한다.</li>
                <li>4. 이사회 의장은 이사회운영 규정에 따라 정하며 이사회의 역할이 효과적으로 수행될 수 있도록 책임을 다한다.</li>
              </ul>
              <h5 class="sg-text-06">제 3조 (이사회의 운영)</h5>
              <ul class="sg-text-09">
                <li>1. 이사회는 정기적으로 개최하며, 필요에 따라 임시이사회를 개최한다. 기본적인 이사회 운영에 관한 사항은 이사회 운영 규정에 따른다.</li>
                <li>2. 이사회 결의는 이사 과반수의 출석과 출석이사 과반수로 한다. 단, 아래 사항에 한해서는 의결권 행사 요건을 강화한다.
                  <ul>
                    <li>1) 상법 제397조의 2(회사 기회유용금지) 및 제398조(자기거래금지)에 해당하는 사안과 기타 법령 및 정관에서 의결 요건을 강화한 사안에 대해서는 해당 법령 및 정관에 따른다.</li>
                    <li>2) 의안에 관하여 특별한 이해관계가 있는 이사는 의결을 행사하지 못한다.</li>
                  </ul>
                </li>
                <li>3. 이사회는 법령·정관·이사회 규정에서 정하는 사항을 제외하고는 대표이사 혹은 이사회 내 위원회에 권한을 위임할 수 있다.</li>
              </ul>
              <h5 class="sg-text-06">제 4조 (이사회 내 위원회)</h5>
              <ul class="sg-text-09">
                <li>1. 이사회는 업무 수행의 전문성을 높이며 신속한 의사결정을 위하여 정관이 정한 바에 따라 이사회 내에 각종의 위원회를 설치 할 수 있다.</li>
                <li>2. 이사회로부터 위임된 사항에 대한 위원회의 결의는 이사회 결의와 동일한 효력을 가지며, 모든 위원회의 조직, 운영, 권한에 대한 사항은 각 위원회의 명문화된 규정에 따른다.</li>
              </ul>
              <h5 class="sg-text-06">제 5조 (이사의 의무와 책무)</h5>
              <ul class="sg-text-09">
                <li>1. 이사는 선량한 관리자로서 주의의무를 다하고, 적극적으로 이사회에 참여함으로써 주주의 가치 및 회사의 기업가치 등을 높일 수 있도록 기여한다.</li>
                <li>2. 이사는 직무 수행 중 취득한 회사의 정보를 외부에 누설하거나, 개인 또는 제3자의 이익을 위해서 이용하지 않는다.</li>
                <li>3. 이사가 고의 또는 과실로 법령 또는 정관에 위반한 행위를 하거나 그 임무를게을리한 경우에는 그 이사는 회사에 대하여 연대하여 손해를 배상할 책임이 있다.</li>
                <li>4. 회사는 이사의 객관적인 경영 판단을 존중하고, 유능한 인사를 유치하기 위하여 회사의 비용으로 이사를 위한 손해배상책임보험에 가입한다.</li>
                <li>5. 이사가 의결 안건 검토를 위하여 상당한 정보를 수집하고 이를 충분히 검토하여 합리적인 판단을 내렸다면 회사는 이사의 경영판단을 존중하여야 한다.</li>
              </ul>
              <h5 class="sg-text-06">제 6조 (사외 이사의 역할)</h5>
              <ul class="sg-text-09">
                <li>1. 사외이사는 이사회 활동을 통해 회사의 주요 의사 결정에 독립적으로 참여하고, 이사회의 구성원으로서 경영진을 감독, 지원한다.</li>
                <li>2. 사외이사는 직무수행에 필요한 정보의 제공을 요청할 수 있으며, 회사는 이사가 요청하는 정보를 충분히 제공한다. 또한, 사외이사는 그 직무수행을 위하여 필요한 경우 적절한 절차에 의해 임직원 및 외부 전문가의 자문을 받을 수 있으며, 회사는 이에 소요되는 비용을 지원한다.</li>
                <li>3. 사외이사는 회의 안건에 대해 충분한 사전검토와 준비를 하여 회의에 참석해야 한다.</li>
                <li>4. 회사는 사외이사가 회사의 경영실태를 적기에 정확히 파악할 수 있도록 경영정보를 정기적으로 보고하며 사외 이사의 업무수행에 필요한 지식을 습득할 수 있도록 교육프로그램을 마련하여 운영한다.</li>
              </ul>
              <h4 class="sg-text-05">제3장 감사기구</h4>
              <h5 class="sg-text-06">제 1조 (감사위원회)</h5>
              <ul class="sg-text-09">
                <li>1. 감사위원회는 독립성을 유지하기 위해 3분의 2이상을 사외이사로 구성하며, 전문성을 강화하기 위해 위원 중 1인은 회계 또는 재무 전문가로 한다.</li>
                <li>2. 감사위원회는 이사와 경영진의 업무 집행에 대한 적법성 검사, 회사의 재무활동의 건전성과 타당성 검사, 재무보고의 정확성 검토 및 내부회계 관리제도의 평가, 외부감사인의 감사활동에 대한 평가 등을 수행한다.</li>
                <li>3. 감사위원회의 효율적인 업무 수행을 위하여 감사업무에 필요한 정보에 자유롭게 접근할 수 있으며, 필요한 경우 회사의 비용으로 외부 기관 및 전문가 등에게 자문을 요청 할 수 있다.</li>
              </ul>
              <h5 class="sg-text-06">제 2조 (외부감사인)</h5>
              <ul class="sg-text-09">
                <li>1. 외부감사인은 회사의 경영진 및 지배주주 등으로부터 독립적인 입장에서 공정하게 감사 업무를 수행하여야 한다.</li>
                <li>2. 외부감사인은 감사위원회에서 선임·변경·해임하며, 외부감사 활동 중에 확인한 중요사항을 감사위원회에 보고한다.</li>
                <li>3. 외부감사인은 주주총회에 참석하여 감사보고서에 관한 주주의 질문이 있는 경우 성실히 답변하여야 한다.</li>
              </ul>
              <h4 class="sg-text-05">제4장 이해관계자</h4>
              <ul class="sg-text-09">
                <li>1. 회사는 고객과 직원, 협력사, 지역사회 등 모든 이해관계자의 관심 사항에 성실하게 대응하며 기업의 사회적 책임을 충실히 이행한다.</li>
                <li>2. 회사는 법령이나 계약에 의한 이해관계자의 권리를 충실히 보호하며, 근로기준법 등 노동관계법령을 성실히 준수함으로써 근로조건의 유지, 개선에 노력한다.</li>
                <li>3. 회사는 법령이 허용하는 범위 내에서 이해관계자의 권리 보호에 필요한 정보를 제공한다.</li>
              </ul>
              <h4 class="sg-text-05">제5장 공 시</h4>
              <ul class="sg-text-09">
                <li>1. 회사는 정기적으로 사업보고서, 반기보고서 및 분기보고서 등을 작성하여 공시하며, 주주 및 이해관계자에게 중대한 영향을 미칠 수 있는 사항은 가능한 신속하고 정확하게 공시한다.</li>
                <li>2. 회사는 공시정보 이용자들이 누구나 공평하게 정보를 이용할 수 있도록 정보 공개 범위나 시기에 있어서 공정하게 공시한다.</li>
              </ul>
            </div>
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
      $.depth1Index = 3
      $.depth2Index = 3

      $(document).ready(function () {
        $.switchUI.init($.viewType)

        $('#tab-content4').addClass('active');

        $('.js-dropdown .dropdown-list button').on('click', function () {
          let index = $(this).parent().index();
          switch(index)
          {
            case 0: $(location).attr('href', "{{ url('governance-shc') }}"); break;
            case 1: $(location).attr('href', "{{ url('governance-meet') }}"); break;
            case 2: $(location).attr('href', "{{ url('governance-exaudit') }}"); break;
            case 3: $(location).attr('href', "{{ url('governance-aoi') }}"); break;
            case 4: $(location).attr('href', "{{ url('governance-esg') }}"); break;
          }
        })

        $('#tab1').on('click', function(){ $(location).attr('href', "{{ url('governance-shc') }}") })
        $('#tab2').on('click', function(){ $(location).attr('href', "{{ url('governance-meet') }}") })
        $('#tab3').on('click', function(){ $(location).attr('href', "{{ url('governance-exaudit') }}") })
        $('#tab4').on('click', function(){ $(location).attr('href', "{{ url('governance-aoi') }}") })
        $('#tab5').on('click', function(){ $(location).attr('href', "{{ url('governance-esg') }}") })

      })
    })(window.jQuery)
  </script>
</body>
</html>
