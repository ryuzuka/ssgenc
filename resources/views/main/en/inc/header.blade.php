<header class="header">
    <h1 class="logo"><a href="/"><span><span class="blind">SHINSEGAE E&amp;C</span></span></a></h1>
    <button type="button" class="menu-open"><span class="blind">Open</span></button>
    <a href="{{ url('/') }}" class="language">KO</a>
    <div class="menu-layer">
        <h1 class="logo"><a href="{{ url('/') }}"><span><span class="blind">SHINSEGAE E&amp;C</span></span></a></h1>
        <div class="in-group">
            <ul class="list-menu">
                <li>
                    <em>Company</em>
                    <a href="#" class="mobile"><em>Company</em></a>
                    <ul class="list">
                        <li><a href="ceo-message">CEO Message</a></li>
                        <li><a href="vision">Vision & Business Philosophy</a></li>
                        <li><a href="timeline">Timeline</a></li>
                        <li><a href="future-growth">Future Growth Research Center</a></li>
                        <li><a href="contact-us">Contact Us</a></li>
                    </ul>
                </li>
                <li>
                    <em>Project</em>
                    <a href="#" class="mobile"><em>Project</em></a>
                    <ul class="list">
                        <li><a href="housing-facility">Housing Facility</a></li>
                        <li><a href="construction-facility">Construction Facility</a></li>
                        <li><a href="civil-engineering-facility">Civil Engineering Facility</a></li>
                        <li><a href="leisure-business">Leisure Business</a></li>
                    </ul>
                </li>
                <li class="depth-type02">
                    <em>CSR</em>
                    <a href="#" class="mobile"><em>CSR</em></a>
                    <ul class="list">
                        <li><a href="csr-overview">Overview</a></li>
                        <li><a href="transparent-management">Transparent Management</a></li>
                        <li><a href="social-contribution">Social Contribution</a></li>
                        <li><a href="quality-management">Quality Management</a></li>
                        <li><a href="safely-health-management">Safely and Health Management</a></li>
                        <li><a href="eco-friendly-management">Eco-Friendly Management</a></li>
                        <li class="depth">
                            <a href="shared-growth">Shared Growth</a>
                            <ul>
                                <li><a href="shared-growth">Overview</a></li>
                                <li><a href="four-major-action-items">4 Major Action Items</a></li>
                                <li><a href="business-partner-portal">Business Partner System</a></li>
                            </ul>
                        </li>
                        <li><a href="customer-service-center">Customer Service Center</a></li>
                        <li><a href="ombudsman">Reporting</a></li>
                    </ul>
                </li>
                <li class="depth-type03">
                    <em>Information</em>
                    <a href="#" class="mobile"><em>Information</em></a>
                    <ul class="list">
                        <li><a href="awards">Awards</a></li>
                        <li><a href="ci-bi">CI & BI</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="etc">
            <span class="area">
                <a href="footer-contact-us">Contact us</a>
            </span>
            <span class="area">
                <a href="business-partner-portal">Business<br class="pc-only"> Partner System</a>
            </span>
            <p class="copyright">SHINSEGAE E&C<br>All Rights Reserved © 2021</p>
        </div>
        <a href="{{ url('/') }}" class="language">KO</a>
        <button type="button" class="menu-close"><span class="blind">Close</span></button>
    </div>

    <script>
        $(function()
        {
            $('.language').on('click',function(e)
            {
                e.preventDefault();
                $.get("{{ url('chglang-ko') }}", {}, function(res){
                    $(location).attr('href', "{{ url('/') }}");
                });
            });
        })
    </script>

</header>
