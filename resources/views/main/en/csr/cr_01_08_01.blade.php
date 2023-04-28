<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : Result inquiry"
  ])
</head>

<body class="en">
  <div class="wrap">
    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="visual csr section">
        <div class="text-box">
          <h2 class="sg-text-01">Result inquiry</h2>
          <p class="sg-text-05">Tell us your story for a better day</p>
        </div>
      </div>
      <div class="sub-content c-cr08 section header-black">
        <div class="inner">
          <h3 class="sg-text-03">{{ ($type=='01')? 'Inquiry' : 'report' }} results</h3>
          <p class="sg-text-09">Please enter the emial and the password to search your inquiry.</p>
          <div class="cr-input-box">
            <div class="area">
              <label for="email">Email<span>*</span></label>
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
                    <option value="">Directly input</option>
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
              <label for="password">Password<span>*</span></label>
              <div class="input-box">
                <input id="password" type="password" placeholder="Enter 6 digits" maxlength="6">
              </div>
            </div>
            <div class="btn-wrap">
              <button id="add" type="button" class="btn btn-primary"><span>OK</span></button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="pop-alert" class="layer dimmed" role="dialog" aria-modal="true" style="display: none;">
        <div class="layer-wrap">
          <div id="pop-alert-text" class="layer-content">
            Please fill in the required fields.
          </div>
          <div class="button-wrap">
            <button id="add" class="btn btn-primary-sm">OK</button>
          </div>
        </div>
      </div>

      <div id="pop-confirm" class="layer" role="dialog" aria-modal="true">
        <div class="layer-wrap">
          <div id="pop-confirm-text" class="layer-content">
            Would you like to register?
          </div>
          <div class="button-wrap">
            <button class="btn btn-tertiary-sm">Cancel</button>
            <button class="btn btn-primary-sm">OK</button>
          </div>
        </div>
      </div>
    </div>

    <!--: End #contents -->
    @include('main.en.inc.footer')
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
            if(e.target.value === 'Directly input')
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
            Alert('Please contact the administrator.');
            return;
          }
          if (com_utils.isEmpty(password))
          {
            Alert('Please input your registed password.');
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
