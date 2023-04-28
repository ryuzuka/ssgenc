<template>

    <!-- Contents -->
    <div class="contents">
        <div class="cont-wrap">
        <h2>비밀번호 변경</h2>
        <p class="text">비밀번호를 수정한 지 90일 지났습니다.<br>비밀번호를 변경해주세요.</p>
        <div class="btn-wrap">
            <!-- <button type="button" v-on:click="extend30days" class="btn btn-secondary">30일 연장하기</button> -->
            <a href="/pwdchg" class="btn btn-primary">비밀번호 변경하러 가기</a>
        </div>
        <div class="change-next">
            <a href="/main">다음에 변경하기</a>
        </div>
        </div>
    </div>
    <!-- // Contents -->

</template>

<script>
    //v-if : 
    //v-for : 
    //v-show : 디렉티브와 => display:none 속성 참조.
    //v-bind : html 태그 기본 속성과 뷰 데이터 속성을 연결한다.
    //v-on : 화면요소의 이벤트를 감지하여 처리할때 사용한다.
    //v-model : 폼에 입력한 값을 뷰 인스턴와 즉시 동기화한다. <input>, <select>, <textarea>태그만 가능 

    import utils from '../utils';
    import VueSimpleAlert from "vue-simple-alert";

    Vue.use(VueSimpleAlert);
    Vue.use(utils);

    export default {
        data: {
        },
        mounted() {
            // console.log('APP_URL => ' + utils.getBaseUrl(''));
            console.log('Component mounted.');
        },
        methods:{

            extend30days: function(event)
            {
                var msgbox = this.$alert;

                var user_id = localStorage.getItem("user_id");
                if (this.currentPassword == this.newPassword)
                {
                    msgbox('현재 패스워드와 동일 합니다.');
                    return;
                }

                if(!this.checkPassword(user_id, this.newPassword))
                {
                    return;
                }

                var data = {
                    user_id: user_id,
                    currentPassword: utils.sha256(this.currentPassword),
                    newPassword: utils.sha256(this.newPassword)
                }

                axios.post(utils.getBaseUrl('/api/user/extend-pwdchg'), data)
                    .then((res) => {
                        console.log(JSON.stringify(res));

                        if (res.data.code !== '0000')
                        {
                            msgbox(res.data.message);
                        }
                        else
                        {
                            msgbox(res.data.message);
                        }
                    })
                    .catch((error) => {
                        msgbox(error);
                    })
                    .finally(() => {

                    });
            },
        }
    }
</script>
