<template>

    <div class="contents-wrap">
        <!-- Contents -->
        <div class="contents">
            <div class="password-wrap">
                <h2>비밀번호 변경</h2>
                <div class="form-box">
                    <div class="input-box">
                    <label for="currentPassword">현재 비밀번호<span>*</span></label>
                    <input v-model="currentPassword" type="password">
                    </div>
                    <div class="input-box">
                    <validation-provider rules="required|pwdchk|min:8|max:40" v-slot="{ errors }">
                        <label for="newPassword">비밀번호<span>*</span></label>
                        <input v-model="newPassword" type="password">
                        <p class="validation-text danger">{{ errors[0] }}</p>
                        <!-- <p class="validation-text">영문 , 숫자, 특수문자 중 3가지 이상 조합의 8글자 이상를 사용해야 합니다.</p> -->
                    </validation-provider>
                    </div>
                    <div class="input-box">
                    <label for="confirmPassword">비밀번호 확인<span>*</span></label>
                    <input v-model="confirmPassword" type="password">
                    </div>
                </div>
                <p class="text">* 영문 , 숫자, 특수문자 중 3가지 이상 조합의 8글자 이상</p>
                <div class="btn-wrap">
                    <button type="button" v-on:click="cancel" class="btn btn-secondary">취소</button>
                    <button type="button" v-on:click="save" class="btn btn-primary">저장</button>
                </div>
            </div>
        </div>
        <!-- // Contents -->
    </div>

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
    import { ValidationProvider, extend, ValidationObserver } from "vee-validate" // vee-validate 로 부터 사용할 기능 import
    import * as rules from "vee-validate/dist/rules"
    for (let rule in rules) {
        // add the rule
        extend(rule, rules[rule])
    }

    extend('min', {
        validate(value, { min }) {
            if (value.length >= min) return true;
            return '{_field_}는 {min} 글자 이상이어야 합니다.';
        },
        params: ['min']
    });

    extend('max', {
        validate(value, { max }) {
            if (value.length < max) return true;
            return '{_field_}는 {max} 글자 이하이어야 합니다.';
        },
        params: ['max']
    });

    extend('pwdchk', {
        validate: value => {
            let regex = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,40}$/.test(value);
            if (!regex) {
                return '숫자와 영문자 특수문자 조합으로 8~40자리를 사용해야 합니다.';
            } else {
                return true;
            }
        },
        params: ['pwdchk']
    });

    // extend('etc', {
    //     validate: value => {
    //         let regex = /(\w)\1\1/.test(value);
    //         if (!regex) {
    //             return '같은 문자를 연속으로 3번 이상 사용하실 수 없습니다.';
    //         } else {
    //             return true;
    //         }
    //     },
    //     params: ['etc']
    // });

    Vue.component("ValidationProvider", ValidationProvider);
    Vue.component("ValidationObserver", ValidationObserver);

    Vue.use(VueSimpleAlert);
    Vue.use(utils);

    export default {
        data: {
            user_id: '',
            currentPassword: '',
            newPassword: '',
            confirmPassword: ''
        },
        mounted() {
            console.log('APP_URL => ' + utils.getBaseUrl(''));
            console.log('Component mounted.');
        },
        methods:{

            cancel: function(event)
            {
                var msgbox = this.$alert;

                // msgbox('이전페이지로 이동');
                window.location.href = '/main';
                return;
            },
            
            save: function(event)
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

                if(this.newPassword !== this.confirmPassword)
                {
                    msgbox('변경할 패스워드와 일치하지 않습니다.');
                    return;
                }

                var data = {
                    user_id: user_id,
                    currentPassword: utils.sha256(this.currentPassword),
                    newPassword: utils.sha256(this.newPassword)
                }

                axios.post('/api/user/pwdchg', data)
                    .then((res) => {
                        console.log(JSON.stringify(res));

                        if (res.data.code !== '0000')
                        {
                            Vue.alert(res.data.message).then((val)=>{
                                if (val == true)
                                {
                                    // window.location.href = '/login';
                                }
                            });
                        }
                        else
                        {
                            Vue.alert(res.data.message).then((val)=>{
                                if (val == true)
                                {
                                    window.location.href = '/logout';
                                }
                            });
                        }
                    })
                    .catch((error) => {
                        msgbox(error);
                    })
                    .finally(() => {

                    });
            },

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
            check_password: function(password)
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
            },
            
            //--------------------------------------------------
            checkPassword: function(user_id, password)
            {   
                var msgbox = this.$alert;

                if (typeof user_id == 'undefined' || user_id == '')
                {
                    msgbox('아이디를 입력해 주세요.');
                    return false;
                }

                // if (this.isIdAuthEnabled == false)
                // {
                //     msgbox('아이디를 검증해 주세요.');
                //     return false;
                // }

                if ( !this.check_password(password) )
                {
                    msgbox('숫자와 영문자 특수문자 조합으로 8~40자리를 사용해야 합니다.');
                    return false;
                }

                var checkNumber = password.search(/[0-9]/g);
                var checkEnglish = password.search(/[a-z]/ig);

                if( checkNumber <0 || checkEnglish <0 )
                {
                    msgbox('숫자와 영문자를 혼용하여야 합니다.');
                    return false;
                }

                if( /(\w)\1\1/.test(password) )
                {
                    msgbox('같은 문자를 연속으로 3번 이상 사용하실 수 없습니다.');
                    return false;
                }

                if( password.search(user_id) > -1 )
                {
                    msgbox('비밀번호에 아이디가 포함되었습니다.');
                    return false;
                }

                // msgbox('유효한 비밀번호 입니다.');
                return true;
            }
            
        }
    }
</script>
