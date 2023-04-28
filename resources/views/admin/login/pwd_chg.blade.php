@include('includes.header', ['title' => '비밀번호 변경', 'lang' => 'ko'])

<div class="wrap">
    <div class="wrapper">

        @include('includes.body_header')

        <div class="container">

            @include('includes.body_topmenu_auth', ['tab_no' => 3])

            {{-- <div id="app">
                <pwdchgform-component></pwdchgform-component>
            </div> --}}

            <div class="contents-wrap">

                <!-- Contents -->
                <div class="contents">
                    <div class="password-wrap">
                        <h2>비밀번호 변경</h2>
                        <div class="form-box">
                            <div class="input-box">
                            <label for="currentPassword">현재 비밀번호<span>*</span></label>
                            <input id="currentPassword" type="password">
                            </div>
                            <div class="input-box">
                                <label for="newPassword">비밀번호<span>*</span></label>
                                <input id="newPassword" type="password">
                                <p class="validation-text">영문 , 숫자, 특수문자 중 3가지 이상 조합의 8글자 이상를 사용해야 합니다.</p>
                            </div>
                            <div class="input-box">
                            <label for="confirmPassword">비밀번호 확인<span>*</span></label>
                            <input id="confirmPassword" type="password">
                            </div>
                        </div>
                        <p class="text">* 영문 , 숫자, 특수문자 중 3가지 이상 조합의 8글자 이상</p>
                        <div class="btn-wrap">
                            <button type="button" id="cancel" class="btn btn-secondary">취소</button>
                            <button type="button" id="save" class="btn btn-primary">저장</button>
                        </div>
                    </div>
                </div>
                <!-- // Contents -->
            </div>

        </div>
    </div>
</div>

<script>

    $(function(){

        $("#user_auth").on("click", function(e){
            e.preventDefault();
            $(location).attr('href', 'logout');
        })

        $("#save").on('click', function(e){
            e.preventDefault();
            save();
        });

        //--------------------------------------------------
        // * 비밀번호 규칙
        // 8자 ~ 40자
        // 영어 소문자 1개 이상 포함
        // 영어 대문자 1개 이상 포함
        // 숫자 1개 이상 포함
        // 특수문자 1개 이상 포함 ( !@$^* )
        // 같은문자 연속 3개 이상 안됨
        // 비번에 아이디 포함되면 안됨
        //--------------------------------------------------

        // - 최대입력제한 40바이트, 영문, 숫자, 특수문자 입력 가능
        // - 영문, 숫자, 특수문자 필수 조합 8글자 이상
        // - 연속적인 숫자 => 같은문자 연속 3개 이상 안됨.
        // - 키보드의 연속적인 배열
        // - 계정명(ID)과 동일한 비밀번호 => 단순히 비교.
        // - 이전에 사용한 비밀번호의 재사용 => 단순히 비교.
        function check_password(password)
        {
            var msgbox = this.$alert;

            if (typeof password == 'undefined' || password == '')
            {
                msgbox('패스워드를 입력해 주세요.');
                return false;
            }

            var passwordRules = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,40}$/;
        
            console.log(passwordRules.test(password));
            return passwordRules.test(password);
        }
        
        //--------------------------------------------------
        function checkPassword(user_id, password)
        {   
            if (typeof user_id == 'undefined' || user_id == '')
            {
                Vue.alert('아이디를 입력해 주세요.');
                return false;
            }

            if ( !check_password(password) )
            {
                Vue.alert('숫자와 영문자 특수문자 조합으로 8~40자리를 사용해야 합니다.');
                return false;
            }

            var checkNumber = password.search(/[0-9]/g);
            var checkEnglish = password.search(/[a-z]/ig);

            if( checkNumber <0 || checkEnglish <0 )
            {
                Vue.alert('숫자와 영문자를 혼용하여야 합니다.');
                return false;
            }

            if( /(\w)\1\1/.test(password) )
            {
                Vue.alert('같은 문자를 연속으로 3번 이상 사용하실 수 없습니다.');
                return false;
            }

            if( password.search(user_id) > -1 )
            {
                Vue.alert('비밀번호에 아이디가 포함되었습니다.');
                return false;
            }

            // Vue.alert('유효한 비밀번호 입니다.');
            return true;
        }

        function cancel()
        {
            // Vue.alert('이전페이지로 이동');
            window.location.href = '/main';
            return;
        }

        function save()
        {
            var currentPassword = $("#currentPassword").val();
            var newPassword     = $("#newPassword").val();
            var confirmPassword = $("#confirmPassword").val();

            var user_id = localStorage.getItem("user_id");

            if (com_utils.isEmpty(currentPassword))
            {
                Vue.alert('현재 패스워드를 입력해 주세요.');
                return;
            }

            if (com_utils.isEmpty(newPassword))
            {
                Vue.alert('새로운 패스워드를 입력해 주세요.');
                return;
            }

            if (com_utils.isEmpty(confirmPassword))
            {
                Vue.alert('패스워드를 한번 더 입력해 주세요.');
                return;
            }

            if (currentPassword == newPassword)
            {
                Vue.alert('현재 패스워드와 동일 합니다.');
                return;
            }

            if(!checkPassword(user_id, newPassword))
            {
                return;
            }

            if(newPassword !== confirmPassword)
            {
                Vue.alert('변경할 패스워드와 일치하지 않습니다.');
                $("#confirmPassword").val("");
                return;
            }

            var data = {
                user_id: user_id,
                currentPassword: com_utils.SHA256(currentPassword),
                newPassword: com_utils.SHA256(newPassword)
            }

            com_utils.post( "{{ url('/api/user/pwdchg') }}", data, function(res){
                if (res.code !== '0000')
                {
                    Vue.alert(res.message).then((val)=>{
                        if (val == true)
                        {
                            // window.location.href = '/login';
                        }
                    });
                }
                else
                {
                    Vue.alert(res.message).then((val)=>{
                        if (val == true)
                        {
                            window.location.href = '/logout';
                        }
                    });
                }
            });
        }

    });

</script>

@include('includes.footer')
