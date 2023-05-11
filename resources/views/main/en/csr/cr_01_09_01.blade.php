<!DOCTYPE html>
<html lang="en">
<head>
  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : Write a report"
  ])
</head>

<body class="en">
  <div class="wrap">

    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="sub-content c-cr09 section header-black">
        <div class="inner">
          <div class="sub-header">
            <div class="flex-box vertical">
              <div class="inner-cell">
                <em class="sg-text-04">Write a report</em>
              </div>
              <div class="inner-cell">
                <p class="sg-text-07">For service complaints and suggestions, please contact the Customer Service Center.</p>
                <a href="customer-service-center" class="btn btn-primary"><span>Go to Customer Service Center</span></a>
              </div>
            </div>
            <ul class="sg-text-09">
              <li>- For prompt handling of your report, please provide your real name. However, if it is difficult to do so, please specify as much factual detail as possible.</li>
              <li>- In order to verify the fact, a verification process from the responsible department may be carried out.</li>
            </ul>
          </div>
          <div class="write-group">
            <div class="flex-box">
              <div class="inner-cell">
                <h3 class="sg-text-04">Consent of <br class="pc-only">collection and <br class="pc-only">use of personal <br class="pc-only">information</h3>
              </div>
              <div class="inner-cell">
                <p class="sg-text-09">Shinsegae E&C collects minimum personal information to provide sincere answers and guidance for your reports.</p>
                <em class="sg-text-07">1. Consent to collection and use of personal information (required)</em>
                <table class="tbl-list">
                  <caption><span class="blind">Consent to collection and use of personal information</span></caption>
                  <colgroup>
                    <col class="width01">
                    <col class="width02">
                    <col class="width03">
                  </colgroup>
                  <thead>
                  <tr>
                    <th scope="col">Purpose</th>
                    <th scope="col">Information collected</th>
                    <th scope="col">Retention period</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Personal identification and identity verification, prevention of illegal use, resolution of inquiries and complaint handling</td>
                    <td>Name, affiliation, password, e-mail, <br class="pc-only">report title and details</td>
                    <td><span class="type">Destroyed after 1 year from the date of completion of reporting</span></td>
                  </tr>
                  </tbody>
                </table>
                <p class="sg-text-09">The Users have the right to refuse consent to the collection and use of personal information. If the Users refuse consent, the results of inquiry and processing may be limited. However, if it is necessary to retain personal information for a certain period in accordance with applicable laws and regulations, it may be followed for that period.</p>
                <em class="sg-text-07">2. Consent to collection and use of personal information (optional)</em>
                <table class="tbl-list">
                  <caption><span class="blind">Consent to collection and use of personal information</span></caption>
                  <colgroup>
                    <col class="width01">
                    <col class="width02">
                    <col class="width03">
                  </colgroup>
                  <thead>
                  <tr>
                    <th scope="col">Purpose</th>
                    <th scope="col">Information collected</th>
                    <th scope="col">Retention period</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Personal identification and identity verification, prevention of illegal use, resolution of inquiries and complaint handling</td>
                    <td>Contact information, attached file</td>
                    <td><span class="type">Destroyed after 1 year from the date of completion of reporting</span></td>
                  </tr>
                  </tbody>
                </table>
                <p class="sg-text-09">The Users have the right to refuse consent to the collection and use of personal information. Even if the Users refuse consent, the results of inquiry and processing may not be limited. However, if it is necessary to retain personal information for a certain period in accordance with applicable laws and regulations, it may be followed for that period.</p>
                <div class="agree-box">
                  <div class="chk-box type">
                    <input id="adult_yn" type="checkbox" required>
                    <label for="adult_yn"><em>[Required]</em> You must be 14 years of age or older.</label>
                  </div>
                  <div class="chk-box">
                    <input id="privacy_info_yn" type="checkbox" required>
                    <label for="privacy_info_yn"><em>[Required]</em> I agree to the collection and use of personal information.</label>
                  </div>
                  <div class="chk-box">
                    <input id="privacy_policy_yn" type="checkbox">
                    <label for="privacy_policy_yn"><em>[Optional]</em> I agree to the collection and use of personal information.</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex-box">
              <div class="inner-cell">
                <h3 class="sg-text-04">Personal Details</h3>
              </div>
              <div class="inner-cell">
                <dl class="type01 writer">
                  <dt>
                    <label for="cust_nm">Name<span>*</span></label>
                  </dt>
                  <dd>
                    <div class="input-box">
                      <input id="cust_nm" type="text">
                    </div>
                    <div class="mo-block">
                      <div class="chk-box">
                        <input type="radio" id="rdo1-1" value="Y" name="name_yn" checked>
                        <label for="rdo1-1">Real Name</label>
                      </div>
                      <div class="chk-box">
                        <input type="radio" id="rdo1-2" value="N" name="name_yn">
                        <label for="rdo1-2">Anonym</label>
                      </div>
                    </div>
                  </dd>
                </dl>
                <dl>
                  <dt>
                    Affiliation<span>*</span>
                  </dt>
                  <dd class="chk-block">
                    <div class="chk-box">
                      <input id="rdo2-1" type="radio" name="company_cd" value="01" checked>
                      <label for="rdo2-1">Partner of Shinsegae E&C</label>
                    </div>
                    <div class="chk-box">
                      <input id="rdo2-2" type="radio" name="company_cd" value="02">
                      <label for="rdo2-2">Employees of Shinsegae E&C</label>
                    </div>
                    <div class="chk-box">
                      <input id="rdo2-3" type="radio" name="company_cd" value="03">
                      <label for="rdo2-3">Others</label>
                    </div>
                  </dd>
                </dl>
                <div class="box">
                  <dl class="phone-number">
                    <dt>
                      <label for="select1">Contact information</label>
                    </dt>
                    <dd>
                      <div class="contact-box">
                        <div class="select-box">
                          <select id="mobile1" name="select" title="">
                            <option value="010">010</option>
                            <option value="02">02</option>
                            <option value="031">031</option>
                            <option value="032">032</option>
                            <option value="033">033</option>
                            <option value="041">041</option>
                            <option value="042">042</option>
                            <option value="043">043</option>
                            <option value="044">044</option>
                            <option value="051">051</option>
                            <option value="052">052</option>
                            <option value="053">053</option>
                            <option value="054">054</option>
                            <option value="055">055</option>
                            <option value="061">061</option>
                            <option value="062">062</option>
                            <option value="063">063</option>
                            <option value="064">064</option>
                            <option value="070">070</option>
                            <option value="080">080</option>
                          </select>
                        </div>
                        -
                        <div class="input-box">
                          <input id="mobile2" type="text" maxlength="4">
                        </div>
                        -
                        <div class="input-box">
                          <input id="mobile3" type="text" maxlength="4">
                        </div>
                      </div>
                    </dd>
                  </dl>
                </div>
                <dl>
                  <dt>
                    <label for="email">e-mail<span>*</span></label>
                  </dt>
                  <dd>
                    <div class="email-box">
                      <div class="flex-area">
                        <div class="input-box">
                          <input id="email" type="text">
                        </div>
                        <span>@</span>
                        <div class="input-box">
                          <input id="domain" type="text" class="domain">
                        </div>
                      </div>
                      <div class="select-box">
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
                  </dd>
                </dl>
              </div>
            </div>
            <div class="flex-box">
              <div class="inner-cell">
                <h3 class="sg-text-04">Details of the report</h3>
              </div>
              <div class="inner-cell">
                <!-- <dl class="type02">
                  <dt>
                    Subject being reported<span>*</span>
                  </dt>
                  <dd>
                    <em><label for="accuser_nm">Name</label></em>
                    <div class="input-box">
                      <input id="accuser_nm" type="text">
                    </div>
                    <em><label for="part_nm">Department</label></em>
                    <div class="input-box">
                      <input id="part_nm" type="text">
                    </div>
                  </dd>
                </dl>  -->
                <dl>
                  <dt>
                    Classification<span>*</span>
                  </dt>
                  <dd>
                    <div class="dropdown js-dropdown distinction" placeholder="Choose one">
                      <button type="button" id="gubun" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false"></button>
                      <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">

                        @if( isset($items_tipoffs) )

                          @foreach($items_tipoffs as $item)

                            <li role="option" aria-selected="false">
                              <button type="button" value="{{ $item->code_id }}">{{ $item->code_nm_en }}
                              </button>
                            </li>

                          @endforeach

                        @else

                          <li role="option" aria-selected="true">
                            <button type="button" value="01">Violation of ethical management</button>
                          </li>
                          <li role="option" aria-selected="true">
                            <button type="button" value="02">Sexual harassment at workplace</button>
                          </li>
                          <li role="option" aria-selected="true">
                            <button type="button" value="03">Suggestions for issues</button>
                          </li>
                          <li role="option" aria-selected="true">
                            <button type="button" value="04">Suggestions for ideas</button>
                          </li>

                        @endif
                      </ul>
                    </div>
                  </dd>
                </dl>
                <dl class="subject">
                  <dt>
                    <label for="subject">Title<span>*</span></label>
                  </dt>
                  <dd>
                    <div class="input-box">
                      <input id="subject" type="text">
                    </div>
                  </dd>
                </dl>
                <dl class="write">
                  <dt>
                    <label for="content">Details<span>*</span></label>
                  </dt>
                  <dd>
                    <div class="input-box js-textarea">
                      <div class="box">
                        <textarea id="content" name="txt-field" maxlength="1500" cols="30" rows="10" placeholder="For an accurate and fair investigation, please write objective information or provide the cases in detail. The investigation may not be conducted if it is found to be a malicious report for the purpose of slander against others. Please attach relevant filesm if any (photos, documents, etc.) for smooth investigation. Please be careful not to include personal information (contact number, address, resident registration number, etc.) in the contents and attachments."></textarea>
                        <div class="length-box"><!-- 글자수 카운트 시작 시 class 추가 : count -->
                          <span class="current-length">0</span>/<span class="total-length">1,500</span>
                        </div>
                      </div>
                      <p class="sg-text-10">*A maximum of 1,500 characters can be entered.</p>
                    </div>
                  </dd>
                </dl>
                <dl class="reply">
                  <dt>
                    Accept or Decline to be contacted<span>*</span>
                  </dt>
                  <dd>
                    <div class="chk-box">
                      <input id="rdo3-1" type="radio" name="reply_yn" value="Y">
                      <label for="rdo3-1">Required</label>
                    </div>
                    <div class="chk-box">
                      <input id="rdo3-2" type="radio" name="reply_yn" value="N">
                      <label for="rdo3-2">Not Required</label>
                    </div>
                    <p class="msg">*Results will be notified to the email address you provide, and results can only be notified if you report with your real name.</p>
                  </dd>
                </dl>
                <dl>
                  <dt>Attachment</dt>
                  <dd>
                    <div class="attach-file-box">
                      <div class="file-box">
                        <div class="attach-field">
                          <div class="attach-file js-attach-file">
                            <input type="text" class="attach-text" readonly="readonly">
                            <label for="attachFile01">Attachment</label>
                            <input type="file" class="attach-file" id="attachFile01">
                          </div>
                          <button type="button" class="add-file del"><span class="blind">Add file</span></button>
                        </div>
                        <div class="attach-field" style="display: none">
                          <div class="attach-file js-attach-file">
                            <input type="text" class="attach-text" readonly="readonly">
                            <label for="attachFile02">Attachment</label>
                            <input type="file" class="attach-file" id="attachFile02">
                          </div>
                          <button type="button" class="add-file del"><span class="blind">Add file</span></button>
                        </div>
                        <div class="attach-field" style="display: none">
                          <div class="attach-file js-attach-file">
                            <input type="text" class="attach-text" readonly="readonly">
                            <label for="attachFile03">Attachment</label>
                            <input type="file" class="attach-file" id="attachFile03">
                          </div>
                          <button type="button" class="add-file del"><span class="blind">Add file</span></button>
                        </div>
                        <div class="attach-field" style="display: none">
                          <div class="attach-file js-attach-file">
                            <input type="text" class="attach-text" readonly="readonly">
                            <label for="attachFile04">Attachment</label>
                            <input type="file" class="attach-file" id="attachFile04">
                          </div>
                          <button type="button" class="add-file del"><span class="blind">Add file</span></button>
                        </div>
                        <div class="attach-field" style="display: none">
                          <div class="attach-file js-attach-file">
                            <input type="text" class="attach-text" readonly="readonly">
                            <label for="attachFile05">Attachment</label>
                            <input type="file" class="attach-file" id="attachFile05">
                          </div>
                          <button type="button" class="add-file del"><span class="blind">Add file</span></button>
                        </div>
                      </div>
                      <p class="msg">You can attach up to 5 files. (Acceptable file formats within 50MB: png, jpg, jpeg, gif, pdf)</p>
                    </div>
                  </dd>
                </dl>
                <dl class="password">
                  <dt>
                    <label for="password">Password<span>*</span></label>
                  </dt>
                  <dd>
                    <div class="input-box">
                      <input id="password" type="password" placeholder="Enter 6 digits" maxlength="6">
                    </div>
                  </dd>
                </dl>
                <dl class="password">
                  <dt>
                    <label for="otp">Security Code<span>*</span></label>
                  </dt>
                  <dd>
                    <div class="input-box attach-file-box">
                      <input id="otp" type="text" placeholder="Enter security code" maxlength="6">
                      <p class="msg">{{$token}}</p>
                    </div>
                  </dd>
                </dl>
                <p class="info-text">*Reports will be confidentially processed, and you can check your inquiry and answer you’re your email and password in the<br class="pc-only"> [Reporting > Search Report] Menu.</p>
              </div>
            </div>
          </div>
          <div class="btn-wrap">
            <a href="ombudsman" class="btn btn btn-tertiary-sm cancel">Cancel</a>
            <button type="button" class="btn btn-primary-sm confirm">Report</button>
          </div>
          <h4 class="sg-text-06">CSR Officer Contact Details</h4>
          <ul class="contact-address">
            <li>
              <em>TEL</em>
              <span>02)3406-6763</span>
            </li>
            <li>
              <em>FAX</em>
              <span>02)3406-6700</span>
            </li>
            <li>
              <em>E-mail</em>
              <span>ssgenc@shinsegae.com</span>
            </li>
          </ul>
          <div class="btn-wrap">
            <a href="contact-us" class="btn btn-primary"><span>Contact us</span></a>
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

  <div class="wrap-loading">
    <div style="width: 60px"><img src="images/loading.gif"/></div>
  </div>

  <!-- common, plugins, app -->
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/plugins.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <!-- components -->

  <script>
    ($ => {
      $.depth1Index = 2
      $.depth2Index = 8
      let gubun = '00';

      /** 파일 첨부 */
      let $attachBox = $('.file-box')
      let isAttached = []

      $(document).ready(function () {

        init();

        // 작성자
        let $writerInput = $('#accuser_nm')
        $('.writer .chk-box input').on('change', e => {
          let idx = $(e.target).parent().index()
          if (idx === 0) {
            $writerInput.prop('disabled', false).val('').focus()
          } else if (idx === 1) {
            $writerInput.prop('disabled', true).val('-')
          }
        })

        // dropdown
        $("ul li button").on('click', function(e){
          gubun = $(this).val();
          console.log('구분: ', gubun);
        });

        // email
        let $email = $('.email-box')
        let $name = $email.find('input#email')
        let $domain = $email.find('input.domain')

        $email.find('.select-box select').on('change', e => {
          if (e.target.value === '') {
            $domain.val('').prop('disabled', false).focus()
          } else {
            $domain.val(e.target.value).prop('disabled', true)
          }
        })

        //첨부파일
        $("#file_attach").on('change',function(){

        var text = '';
        var files = $(this)[0].files;
        for(var i = 0 ; i < files.length ; i++){
          text += files[i].name;
          text += ',';
        }

        text = text.replace(/,$/, '');

        $("#file_attach_text").val(text);
        });

      })

      function init()
      {

        setTimeout(function () {
          $("input[type!='radio']").each(function () {
            $(this).val('')
          })
          $('textarea').val('')
        }, 40)

      }

      //--------------------------------------------
      //기본 host url을 리턴한다.
      function getBaseUrl()
      {
        return "{{ url('/') }}";
      }

      //--------------------------------------------
      //지정된 업무id에 해당되는 url을 생성해서 리턴한다.
      function getUrl(key)
      {
        return getBaseUrl() + '/api/custsvc/' + key;
      }

      //--------------------------------------------
      //data : param data
      //image : 이미지 포맷 첨부파일
      //attach : 첨부파일 포맷 pdf, xls => 멀티목록으로 등록함.
      function request(data, image, attach)
      {
        com_utils.request(
            "{{ csrf_token() }}",
            getUrl('upload'),
            data, image, attach,
            ".wrap-loading",
            response
        );
      }

      //--------------------------------------------
      function response(res)
      {
          if (res != null)
          {
              if (res.code == '0000')
              {
                Vue.alert(res.message).then((val)=>{
                  if (val == true)
                  {
                      var params = {
                        type: '02', //제보등록
                        gubun: gubun,
                        receipt_id: res.data.receipt_id
                      }

                      send_mail(getUrl('sendmail-regist'), params);
                  }
                });
              }
              else
              {
                var code = res.code;
                var message = res.message;
                if ( !com_utils.isEmpty(res.data) )
                {
                    //맨 첫 컬럼 내용만 보여 줌.
                    Vue.alert('['+code+'] '+res.data[0]);
                }
                else
                {
                    Vue.alert('['+code+'] '+message);
                }
              }
          }
      }

      function send_mail(url, params)
      {
        com_utils.post(url, params, function(res){
          if (res.code == '0000')
          {
          }
          else
          {
              var code = res.code;
              var message = res.message;
              if ( !com_utils.isEmpty(res.data) )
              {
                  //맨 첫 컬럼 내용만 보여 줌.
                  Vue.alert('['+code+'] '+res.data[0]);
              }
              else
              {
                  Vue.alert('['+code+'] '+message);
              }
          }
          $(location).attr('href', "{{ url('footer-receipt?') }}"+jQuery.param(params));
        });
      }

      function getAttach()
      {
        var arrfiles = []

        for(var key in isAttached)
        {
          arrfiles.push('#attachFile0'+(Number(key)+1));
        }

        return arrfiles;
      }

      function getItem()
      {
        var chk_privacy_policy_yn = $('#privacy_policy_yn').is(':checked');

        var adult_yn = 'Y';
        var privacy_info_yn = 'Y';
        var privacy_policy_yn = (chk_privacy_policy_yn == false)? 'N' : 'Y';

        var cust_nm = $('#cust_nm').val();
        var subject = $("#subject").val();
        var content = $("#content").val();
        var accuser_nm = $("#accuser_nm").val();
        var part_nm = $("#part_nm").val();

        var reply_yn = $('input[name="reply_yn"]:checked').val();
        var name_yn = $('input[name="name_yn"]:checked').val();
        var company_cd = $('input[name="company_cd"]:checked').val();

        var mobile1 = $('#mobile1').val();
        var mobile2 = $('#mobile2').val();
        var mobile3 = $('#mobile3').val();
        var mobile = mobile1+'-'+mobile2+'-'+mobile3;
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

        var item = {
          id: "",
          cust_nm: cust_nm,
          email: email,
          mobile: (privacy_policy_yn=='Y')? mobile : '',
          adult_yn : adult_yn,
          privacy_info_yn : privacy_info_yn,
          privacy_policy_yn : privacy_policy_yn,
          type: '02', //제보등록
          gubun: gubun,
          reply_yn: reply_yn,
          name_yn: name_yn,
          company_cd: company_cd,
          subject: subject,
          content: content,
          accuser_nm: accuser_nm,
          part_nm: part_nm,
          password: com_utils.SHA256(password),
          lang: 'en',
          otp: $("#otp").val()
        };

        return item;
      }

      function Add()
      {
        if ( validation() )
        {
          request(getItem(), getAttach(), null);
        }
      }

      // validate required checkbox
      function validateRequiredCheckbox () {
        let arrRequired = []

        $('.agree-box input').each(function (index) {
          let $input = $(this)

          if ($input.prop('required')) {
            if ($input.prop('checked')) {
              arrRequired[index] = true
            } else {
              arrRequired[index] = false
            }
          }
        })

        return arrRequired.every(val => val === true)
      }

      $('.btn-wrap .confirm').on('click', e => {
        Add();
      });

      function Alert(text){
        $("#pop-alert-text").text(text);
        $('#pop-alert').modal({closedFocus: '.btn-wrap .confirm'});
      }

      function Confirm(text){
        $("#pop-confirm-text").text(text);
        $('#pop-confirm').modal({closedFocus: '.btn-wrap .confirm'});
      }

      function validation()
      {
        var chk_adult_yn = $('#adult_yn').is(':checked');
        var chk_privacy_info_yn = $('#privacy_info_yn').is(':checked');

        if (chk_adult_yn == false)
        {
          Alert('If 14 years of age or older, please check it.');
          return false;
        }

        if (chk_privacy_info_yn == false)
        {
          Alert('Please check whether consent to collection of personal information is required.');
          return false;
        }

        var password = $("#password").val();
        if (com_utils.isEmpty(password) || password.length != 6)
        {
          Alert('Please enter a 6-digit password.');
          return false;
        }

        var accuser_nm = $("#accuser_nm").val();
        var part_nm = $("#part_nm").val();

        var mobile1 = $('#mobile1').val();
        var mobile2 = $('#mobile2').val();
        var mobile3 = $('#mobile3').val();
        var chk_privacy_policy_yn = $('#privacy_policy_yn').is(':checked');

        if (chk_privacy_policy_yn==false)
        {
          if ( !com_utils.isEmpty(mobile2) || !com_utils.isEmpty(mobile3) )
          {
            Alert('To register your contact information, you must agree to the collection and use of personal information.');
            return false;
          }
        }

        if ($("#mail_server").val() === '')
        {
          domain = $(".domain").val();
        }
        else
        {
          domain = $("#mail_server").val();
        }
        var mail_id = $("#email").val();
        var email = mail_id+'@'+domain;
        if (mail_id === '' || domain === '')
        {
          Alert('Please enter your email account.');
          return false;
        }

        if (gubun==='00')
        {
          Alert('Please select the classfication.');
          return false;
        }

	return true;
      }

      $attachBox.on('change', 'input.attach-file', function () {
        let idx = $(this).closest('.attach-field').index()
        let $attach = $attachBox.find('.attach-field')

        if ($(this).val()) {
          $attach.eq(idx).find('.del').show()
          if (idx < $attach.length - 1) {
            $attach.eq(idx + 1).show()
          }
          isAttached[idx] = true
        } else {
          $attachBox.find('.attach-field:eq(' + idx + ') button.del').trigger('click')
        }
      })

      $attachBox.on('click', 'button.del', function () {
        let idx = $(this).parent().index()
        let $attach = $attachBox.find('.attach-field')

        if (isAttached.length < $attach.length) {
          $attach.eq(idx).hide()
        }
        $attach.eq(idx).find('input').val('')
        $attachBox.append($attach.eq(idx))

        $(this).hide()
        isAttached.pop()
      })

    })(window.jQuery)
  </script>
</body>
</html>
