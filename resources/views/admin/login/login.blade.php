@include('includes.header', ['title' => '로그인', 'lang' => 'ko'])

    <div class="wrap">
        <div class="visual">
            <h1 class="">SHINSEAE ENGINEERING & CONSTRUCTION</h1>
        </div>
        <div class="container">

            <div id="app">
                <loginform-component></loginform-component>
            </div>

        </div>
    </div>

    <script>

        $(function(){

            //키보트 enter 실행되도록
            $(".input-box").keypress(function(e){
                if ( e.which == 13 ) {
                    $('.btn').click();
                    return false;
                }
            });
        });

    </script>    

@include('includes.footer')
