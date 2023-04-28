<template>
    <!-- Contents -->
    <div class="contents">
        <div class="cont-wrap">
            <h2>로그인</h2>
            <div class="login-box">
            <div class="form-box">
                <div class="input-box">
                    <label for="user_id">ID<span>*</span></label>
                    <input v-model="user_id" type="text">
                </div>
                <div class="input-box">
                    <label for="password">Password<span>*</span></label>
                    <input v-model="password" type="password">
                </div>
                <button id="login" type="button" v-on:click="login" class="btn">로그인</button>
            </div>
            <div class="id-remember">
                <span class="text-remember">아이디 기억하기</span>
                <!-- <button class="button-box"></button> -->
                <button class="button-box" :class="{on: id_remember}" @click="toggle"></button>
            </div>
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
    import Vue from 'vue'
    import VueI18n from 'vue-i18n'

    Vue.use(VueI18n);
    Vue.use(VueSimpleAlert);
    Vue.use(utils);

    export default {
        data: {
            id_remember: false,
            user_id: '',
            password: ''
        },
        created() {
            if (localStorage.length > 0)
            {
                this.id_remember = localStorage.getItem("id_remember");
                console.log('created() : this.id_remember => ' + this.id_remember);
                if (this.id_remember == 'true')
                {
                    this.user_id = localStorage.getItem("user_id");
                    console.log('created() : this.user_id => ' + this.user_id);
                    this.id_remember = true;
                }
                else
                {
                    this.id_remember = false;
                }
            }
        },        
        mounted() {
            // console.log('APP_URL => ' + utils.getBaseUrl(''));
            // console.log('Component mounted. => ' + this.trans('auth.no_user_id'));

            // this.id_remember = localStorage.getItem("id_remember");
        },
        methods:{
            toggle: function(event)
            {
                event.preventDefault();

                this.id_remember = !this.id_remember;
                // console.log('this.id_remember => ' + this.id_remember);
                this.$forceUpdate();
            },

            login: function(event)
            {
                var user_id	= this.user_id;
                var pw	= this.password;
                var msgbox = this.$alert;

                if (user_id === undefined || user_id === '')
                {
                    msgbox(this.trans('auth.E006'));
                }
                else if (pw === undefined || pw === '')
                {
                    msgbox(this.trans('auth.E007'));
                }

                var pw_sha256 = utils.sha256(pw);
                var params = {
                    user_id: btoa(user_id),
                    password: btoa(pw_sha256)
                }
                axios.post('/api/auth/login', params, {
                        headers: { 'Content-Type': 'application/json' },
                    })                
                    .then((res) => {
                        if (res.data.code !== '0000')
                        {
                            if (res.data.code == 'E011')
                            {
                                this.$fire({
                                    titleText: res.data.message,
                                    showCancelButton: true,
                                    showCloseButton: true,
                                    confirmButtonText: '계속',
                                    cancelButtonText: '종료'
                                }).then((result) => {
                                    // console.log('result =>' + JSON.stringify(result));
                                    if (result.value)
                                    {
                                        axios.post('/api/auth/forcedLogin', params, {
                                                headers: { 'Content-Type': 'application/json' },
                                            })                
                                            .then((res) => {
                                                if (res.data.code !== '0000')
                                                {
                                                    msgbox(res.data.message);
                                                }
                                                else
                                                {
                                                    //토큰을 넘겨야 한다.
                                                    localStorage.setItem("user_id", user_id);
                                                    localStorage.setItem("id_remember", this.id_remember);
                                                    localStorage.setItem("token", res.data.token);
                                                    
                                                    window.location.href = res.data.url;
                                                }
                                            });
                                    }
                                    else
                                    {
                                        // console.log('cancel');
                                    }
                                });
                            }
                            else
                            {
                                msgbox(res.data.message);
                            }
                        }
                        else
                        {
                            //토큰을 넘겨야 한다.
                            localStorage.setItem("user_id", user_id);
                            localStorage.setItem("id_remember", this.id_remember);
                            localStorage.setItem("token", res.data.token);
                            
                            window.location.href = res.data.url;
                        }
                    })
                    .catch((error) => {
                        msgbox(error);
                    })
                    .finally(() => {

                    });
            }
        }
    }
</script>
