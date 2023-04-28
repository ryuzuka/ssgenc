<!-- Header -->
<header id="header">
    <h1><a href="#">SHINSEGAE ENGINEERING & CONSTRUCTION</a></h1>
    <div class="util">

        @if( App::environment('development') )

            <span class="user">
            <a href="{{ url('pwdchg') }}"> development </a> (Only production or test mode enabled.)
            </span>

        @else

            <span class="user">
                <a href="{{ url('pwdchg') }}"> 
                    @if(session()->has('name')) {{ session()->get('name') }} </a> 님 
                    @else </a>
                    @endif
            </span>
            <button id="user_auth" type="button" class="btn">
                @if ( session()->has('user_id') )
                    로그아웃
                @else
                    로그인
                @endif
            </button>

        @endif

    </div>
</header>

@push('srcipt_source')

<script>
    $(function(){

        $("#user_auth").on("click", function(e){
            e.preventDefault();
            $(location).attr('href', 'logout');
        })

    });
</script>

@endpush

<!-- // Header -->
