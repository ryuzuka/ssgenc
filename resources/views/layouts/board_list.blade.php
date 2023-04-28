
@include('includes.header', ['title' => $title, 'lang' => $lang])

<div class="wrap">
    <div class="wrapper">

    @include('includes.body_header')

        <div class="container">

            @include('includes.body_topmenu_auth', ['tab_no' => $tab_no])

            <div class="contents-wrap">

            @include('includes.body_leftmenu_auth', ['tab_no' => $tab_no, 'menu_no' => $menu_no])

                <!-- Contents -->
                <div class="contents">
                    <h2>{{ $subject }}</h2>
                    <table class="tbl">
                        <colgroup>
                            <col style="width:20%;">
                            <col style="width:80%;">
                        </colgroup>
                        <tbody>
                            
                            {{-- 검색 section --}}
                            @yield('search_area')
                        
                        </tbody>
                    </table>

                    <div class="btn-wrap">
                        <div class="right">
                            <button id="search" type="button" class="btn-primary">검색</button>
                        </div>
                    </div>

                    {{-- 레코드 총개수 / 검색된 개수 --}}
                    @yield('list_count_area')

                    <table class="tbl-list">

                        @yield('column_style')

                    <thead>

                        @yield('column_title')
                            
                    </thead>
                    <tbody id="list_item">

                        @yield('column_data')

                    </tbody>
                    </table>
                    
                    {{-- 페이지네이션 --}}
                    {{--  @include('includes.paginate', ['paginator' => $lists])  --}}

                    @yield('pagenation_area')

                    {{-- 기능 버튼 영역 --}}
                    @yield('button_area')

                </div>
                <!-- // Contents -->

            </div>
        </div>
    </div>
</div>

<script>

    function setDefaultDate()
    {
        //default => 1개월전

        var from = "{{ app('request')->input('from') }}";
        if ( com_utils.isEmpty(from) )
        {
            var fromDate = new Date();
            fromDate.setMonth(fromDate.getMonth()-1);
            fromDate.setDate(fromDate.getDate());
            $("#from").val(com_utils.convertDateFormat(fromDate, '-', 'ymd'));
        }
        else
        {
            $("#from").val(from);
        }

        var to = "{{ app('request')->input('to') }}";
        if ( com_utils.isEmpty(to) )
        {
            var toDate = new Date();

            toDate.setDate(toDate.getDate());
            $("#to").val(com_utils.convertDateFormat(toDate, '-', 'ymd'));
        }
        else
        {
            $("#to").val(to);
        }
    }

    function Delete(url, id)
    {
        var params = {
            id: id
        }

        com_utils.post(url, params, function(res){
            if (res.code == '0000')
            {
                Vue.alert(res.message)
                .then((val)=>{
                    if (val == true)
                    {
                        window.location.reload();
                    }
                });
            }
            else
            {
                var code = res.code;
                var message = res.message;
                if (res.data != null)
                {
                    //맨 첫 컬럼 내용만 보여 줌.
                    Vue.alert('['+code+'] '+res.data[0]);
                }
                else
                {
                    Vue.alert('['+code+'] '+message);
                }
            }
        });
    }
    
    $(function(){
    
        setDefaultDate();

        $('#checkAll').on('click', function(){
            var checked = $('#checkAll').is(':checked');
            if(checked)
            {
                $('input:checkbox').prop('checked', true);
            }
            else
            {
                $('input:checkbox').prop('checked', false);
            }
        });

        $('input:checkbox').on('click', function(){
            check_count = 0;

            var checked = $('input:checkbox').is(':checked');
            if (checked)
            {
                $('input:checkbox').each(function(i) {
                    if (this.checked)
                    {
                        check_count++;
                    }
                });

                $( "#delete" ).removeClass("btn-secondary");
                $( "#delete" ).addClass("btn-primary");

                if (check_count==1)
                {
                    $( "#modify" ).removeClass("btn-secondary");
                    $( "#modify" ).addClass("btn-primary");
                }
                else
                {
                    $( "#modify" ).removeClass("btn-primary");
                    $( "#modify" ).addClass("btn-secondary");
                }

                $( "#add" ).removeClass("btn-primary");
                $( "#add" ).addClass("btn-secondary");
            }
            else
            {
                $( "#delete" ).removeClass("btn-primary");
                $( "#delete" ).addClass("btn-secondary");

                $( "#modify" ).removeClass("btn-primary");
                $( "#modify" ).addClass("btn-secondary");

                $( "#add" ).removeClass("btn-secondary");
                $( "#add" ).addClass("btn-primary");
            }
        });
    });

</script>

@stack('srcipt_source')

@include('includes.footer')
