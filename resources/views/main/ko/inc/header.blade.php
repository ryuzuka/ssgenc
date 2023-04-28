<header class="header">
    <h1 class="logo"><a href="/"><span><span class="blind">SHINSEGAE E&amp;C</span></span></a></h1>
    <button type="button" class="menu-open"><span class="blind">메뉴창 열기</span></button>
    <a href="{{ url('/') }}" class="language">EN</a>
    <div class="menu-layer">
        <h1 class="logo"><a href="{{ url('/') }}"><span><span class="blind">SHINSEGAE E&amp;C</span></span></a></h1>
        <div class="in-group">
            <ul class="list-menu">
                <li>
                    <em>회사소개<span>Company</span></em>
                    <a href="#" class="mobile"><em>회사소개<span>Company</span></em></a>
                    <ul class="list">
                        <li><a href="ceo-message">인사말</a></li>
                        <li><a href="vision">비전 &amp; 경영이념</a></li>
                        <li><a href="timeline">연혁</a></li>
                        <li><a href="future-growth">미래성장 연구소</a></li>
                        <li><a href="contact-us">오시는길</a></li>
                    </ul>
                </li>
                <li>
                    <em>사업분야<span>Project</span></em>
                    <a href="#" class="mobile"><em>사업분야<span>Project</span></em></a>
                    <ul class="list">
                        <li><a href="housing-facility">주거시설</a></li>
                        <li><a href="construction-facility">건축시설</a></li>
                        <li><a href="civil-engineering-facility">토목시설</a></li>
                        <li><a href="leisure-business">레저사업</a></li>
                    </ul>
                </li>
                <li class="depth-type02">
                    <em>지속가능경영<span>CSR</span></em>
                    <a href="#" class="mobile"><em>지속가능경영<span>CSR</span></em></a>
                    <ul class="list">
                        <li><a href="csr-overview">개요</a></li>
                        <li><a href="transparent-management">투명경영</a></li>
                        <li><a href="social-contribution">사회공헌</a></li>
                        <li><a href="quality-management">품질경영</a></li>
                        <li><a href="safely-health-management">안전보건경영</a></li>
                        <li><a href="eco-friendly-management">친환경경영</a></li>
                        <li class="depth">
                            <a href="shared-growth">동반성장</a>
                            <ul>
                                <li><a href="shared-growth">개요</a></li>
                                <li><a href="four-major-action-items">4대실천사항</a></li>
                                <li><a href="business-partner-portal">협력사 시스템</a></li>
                            </ul>
                        </li>
                        <li><a href="customer-service-center">고객상담실</a></li>
                        <li><a href="ombudsman">제보</a></li>
                    </ul>
                </li>
                <li class="depth-type03">
                    <em>정보센터<span>Information</span></em>
                    <a href="#" class="mobile"><em>정보센터<span>Information</span></em></a>
                    <ul class="list">
                        <li><a href="news">뉴스</a></li>
                        <li><a href="awards">수상</a></li>
                        <li><a href="ci-bi">CI &amp; BI</a></li>
                        <li class="depth type02">
                            <a href="governance">투자정보</a>
                            <ul>
                                <li>
                                    <a href="governance">경영정보</a>
                                    <ul>
                                        <li><a href="governance">지배구조</a></li>
                                        <li><a href="articles-inc">정관</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="sales-status">재무정보</a>
                                    <ul>
                                        <li><a href="sales-status">영업현황 및 재무비율</a></li>
                                        <li><a href="financial-status">재무상태표</a></li>
                                        <li><a href="income-status">손익계산서</a></li>
                                        <li><a href="credit-rating">신용등급</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="stock-related">투자정보</a>
                                    <ul>
                                        <li><a href="stock-related">주식관련사항</a></li>
                                        <li><a href="performance-report">실적보고서</a></li>
                                        <li><a href="stock-dividend">배당관련사항</a></li>
                                        <!-- li><a href="ir-schedule">IR일정</a></li -->
                                        <li><a href="ir-inquiry">IR문의</a></li>
                                    </ul>
                                </li>
                                <li><a href="disclosure-info">공시정보</a></li>
                            </ul>
                        </li>
                        <li class="depth">
                            <a href="recruit-process">채용</a>
                            <ul>
                                <li><a href="recruit-process">채용절차 &amp; 인재상</a></li>
                                <li><a href="personnel-system">인사제도</a></li>
                                <li><a href="job-introduction">직무소개</a></li>
                                <li><a href="job-posting">채용공고</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="etc">
          <span class="area">
              <a href="footer-contact-us">문의하기</a>
          </span>
          <span class="area">
              <a href="business-partner-portal">협력사 시스템</a>
          </span>
          <p class="copyright">SHINSEGAE E&C<br>All Rights Reserved © 2021</p>
        </div>
        <a href="{{ url('/') }}" class="language">EN</a>
        <button type="button" class="menu-close"><span class="blind">메뉴창 열기</span></button>
    </div>

    <script>
        $(function()
        {
            $('.language').on('click',function(e)
            {
                e.preventDefault();
                $.get("{{ url('chglang-en') }}", {}, function(res){
                    $(location).attr('href', "{{ url('/') }}");
                });
            });
        })
    </script>

</header>
