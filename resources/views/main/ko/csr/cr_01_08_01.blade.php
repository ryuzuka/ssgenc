<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 결과조회"
  ])
</head>

<body>
  <div class="wrap">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="visual csr section">
        <div class="text-box">
          <h2 class="sg-text-01">결과조회</h2>
          <p class="sg-text-05">더 나은 하루를 위해 당신의 이야기를 들려주세요</p>
        </div>
      </div>
      <div class="sub-content c-cr08 section header-black">
        <div class="inner">

          <h3 class="sg-text-03">{{ ($type=='01')? '상담':'제보하기' }} 결과 조회</h3>

          <p class="sg-text-09">접수 시 입력한 이메일과 비밀번호를 입력하시면 작성 내용 및 답변을 확인하실 수 있습니다.</p>
          <div class="cr-input-box">
            <div class="area">
              <label for="email">이메일<span>*</span></label>
              <div class="email-box">
                <div class="flex-area">
                  <div class="input-box">
                    <input id="email" type="text">
                  </div>
                  @
                  <div class="input-box">
                    <input id="domain" type="text" class="domain">
                  </div>
                </div>
                <div class="select-box domain">
                  <select id="mail_server" name="select" title="">
                    <option value="">직접입력</option>
                    <option value="naver.com">naver.com</option>
                    <option value="nate.com">nate.com</option>
                    <option value="yahoo.co.kr">yahoo.co.kr</option>
                    <option value="hotmail.com">hotmail.com</option>
                    <option value="gmail.com">gmail.com</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="area">
              <label for="password">비밀번호<span>*</span></label>
              <div class="input-box">
                <input id="password" type="password" placeholder="6자리 숫자 입력" maxlength="6">
              </div>
            </div>
            <div class="btn-wrap">
              <button id="add" type="button" class="btn btn-primary"><span>확인</span></button>
            </div>
          </div>
        </div>
      </div>
    </div>

      <div id="pop-alert" class="layer dimmed" role="dialog" aria-modal="true" style="display: none;">
        <div class="layer-wrap">
          <div id="pop-alert-text" class="layer-content">
            필수항목을 입력해주세요.
          </div>
          <div class="button-wrap">
            <button id="add" class="btn btn-primary-sm">확인</button>
          </div>
        </div>
      </div>

      <div id="pop-confirm" class="layer" role="dialog" aria-modal="true">
        <div class="layer-wrap">
          <div id="pop-confirm-text" class="layer-content">
            등록하시겠습니까?
          </div>
          <div class="button-wrap">
            <button class="btn btn-tertiary-sm">취소</button>
            <button class="btn btn-primary-sm">등록</button>
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
      $.depth1Index = 2
      $.depth2Index = 7

      $(document).ready(function () {

        setTimeout(function () {
          $("input[type!='radio']").each(function () {
            $(this).val('')
          })
          $('textarea').val('')
        }, 20)

        // 이메일
        let $email = $('.email-box')
        $email.find('.select-box select').on('change', e => {
          let $domain = $email.find('input.domain')
          if (e.target.value === '') {
            $domain.val('').prop('disabled', false).focus()
          } else {
            if(e.target.value === '직접입력')
              {
                $domain.val(e.target.value).prop('disabled', false)
              }
              else
              {
                $domain.val(e.target.value).prop('disabled', true)
              }
            }
        })

        function Alert(text){
          $("#pop-alert-text").text(text);
          $('#pop-alert').modal({closedFocus: '.btn-wrap .confirm'});
        }

        function Confirm(text){
          $("#pop-confirm-text").text(text);
          $('#pop-confirm').modal({closedFocus: '.btn-wrap .confirm'});
        }

        $("#add").on("click", function(){

          var domain = '';
          if ($("#mail_server").val() === '')
          {
            domain = $(".domain").val();
          }
          else
          {
            domain = $("#mail_server").val();
          }

          var email = $("#email").val()+'@'+domain;
          var password = $("#password").val();

          if (com_utils.isEmpty(email) || email === '@' || com_utils.isEmpty(domain))
          {
            Alert('관리자에게 문의해 주세요.');
            return;
          }
          if (com_utils.isEmpty(password))
          {
            Alert('비밀번호를 입력해 주세요.');
            return;
          }

          var params = {
            type: '{{ $type }}',
            email: email,
            password: com_utils.SHA256(password)
          };

          com_utils.post("{{ url('api/custsvc/checkReceipt') }}", params, function(res){
            if (res.code == '0000')
            {
              $(location).attr('href', "{{ url('search-result?') }}"+jQuery.param(params));
            }
            else{
              var code = res.code;
              var message = res.message;
              if ( !com_utils.isEmpty(res.data) )
              {
                //맨 첫 컬럼 내용만 보여 줌.
                Alert('['+code+'] '+res.data[0]);
              }
              else
              {
                Alert('['+code+'] '+message);
              }
            }
          });
        })

      })
    })(window.jQuery)
  </script>
</body>
</html>
