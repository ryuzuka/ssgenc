<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 문의하기"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content f-ft section header-black">
      <div class="inner">
        <div class="sub-header">
          <h2 class="sg-text-06">문의하기</h2>
          <p class="sg-text-01">궁금한 사항에<br>빠르게 답변 드리겠습니다.</p>
        </div>
        <div class="flex-box">
          <div class="inner-cell">
            <h3 class="sg-text-04">개인정보의 수집 <br class="pc-only">및 이용 동의</h3>
          </div>
          <div class="inner-cell">
            <p class="sg-text-09">신세계건설에서는 정보주체의 문의하기와 관련하여 성실한 답변 및 안내를 위해 최소한의 개인정보를 수집하고 있습니다.</p>
            <em class="sg-text-07">1. 개인정보 수집 및 이용 동의(필수)</em>
            <table class="tbl-list">
              <caption><span class="blind">개인정보 수집 및 이용 동의 정보</span></caption>
              <colgroup>
                <col class="width01">
                <col class="width02">
                <col class="width03">
              </colgroup>
              <thead>
              <tr>
                <th scope="col">목적</th>
                <th scope="col">항목</th>
                <th scope="col">보유기간</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>개인 식별 및 본인여부 확인, 부정 이용 방지, 문의사항 해결 및 불만처리</td>
                <td>이름, 이메일, 비밀번호, 상담 제목 및 내용</td>
                <td><span class="type">문의 처리 완료일로부터 <br class="pc-only">1년 보관 후 파기</span></td>
              </tr>
              </tbody>
            </table>
            <p class="sg-text-09">정보주체께서는 개인정보 수집 및 이용 동의에 거부할 권리가 있으며, 동의를 거부 할 경우 문의 및 처리 결과에 제한이 있을 수 있습니다. 단, 관계법령에 따라 일정기간
              보유하여야 할 필요가 있는 경우 그 기간에 따를 수 있습니다.</p>
            <em class="sg-text-07">2. 개인정보 수집 및 이용 동의(선택)</em>
            <table class="tbl-list">
              <caption><span class="blind">개인정보 수집 및 이용 동의 정보</span></caption>
              <colgroup>
                <col class="width01">
                <col class="width02">
                <col class="width03">
              </colgroup>
              <thead>
              <tr>
                <th scope="col">목적</th>
                <th scope="col">항목</th>
                <th scope="col">보유기간</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>개인 식별 및 본인여부 확인, 부정 이용 방지, 문의사항 해결 및 불만처리</td>
                <td>연락처, 첨부파일</td>
                <td><span class="type">문의 처리 완료일로부터 <br class="pc-only">1년 보관 후 파기</span></td>
              </tr>
              </tbody>
            </table>
            <p class="sg-text-09">정보주체께서는 개인정보 수집 및 이용 동의에 거부할 권리가 있으며, 동의를 거부
              하더라도 문의 및 처리 결과에 제한이 없습니다.<br>단, 관계법령에 따라 일정기간 보유하여야 할 필요가 있는 경우 그 기간에 따를 수 있습니다.</p>
            <div class="agree-box">
              <div class="chk-box type">
                <input id="adult_yn" type="checkbox" required>
                <label for="adult_yn"><em>[필수]</em> 본인은 만14 세 이상입니다.</label>
              </div>
              <div class="chk-box">
                <input id="privacy_info_yn" type="checkbox" required>
                <label for="privacy_info_yn"><em>[필수]</em> 개인정보 수집 및 이용에 동의합니다.</label>
              </div>
              <div class="chk-box">
                <input id="privacy_policy_yn" type="checkbox">
                <label for="privacy_policy_yn"><em>[선택]</em> 개인정보 수집 및 이용에 동의합니다.</label>
              </div>
            </div>
          </div>
        </div>
        <div class="flex-box">
          <div class="inner-cell">
            <h3 class="sg-text-04">상담자 정보</h3>
          </div>
          <div class="inner-cell">
            <div class="write-box">
              <dl>
                <dt>
                  구분<span>*</span>
                </dt>
                <dd>
                  <div class="dropdown js-dropdown distinction" placeholder="선택하세요">
                    <button type="button" id="gubun" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false"></button>

                    {{-- <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
                      <li role="option" aria-selected="false"><button type="button" data-value="">분양/계약</button></li>
                      <li role="option" aria-selected="false"><button type="button" data-value="">AS/하자</button></li>
                      <li role="option" aria-selected="false"><button type="button" data-value="">수주상담</button></li>
                      <li role="option" aria-selected="false"><button type="button" data-value="">협력회사</button></li>
                      <li role="option" aria-selected="false"><button type="button" data-value="">일반문의</button></li>
                      <li role="option" aria-selected="false"><button type="button" data-value="">공사관리(민원 등)</button></li>
                      <li role="option" aria-selected="false"><button type="button" data-value="">레저(골프장, 아쿠아필드)</button></li>
                    </ul> --}}

                    <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">

                      @if( isset($items_custsvc) )

                        @foreach($items_custsvc as $item)

                          <li role="option" aria-selected="false">
                            <button type="button" value="{{ $item->code_id }}">{{ $item->code_nm }}
                            </button>
                          </li>

                        @endforeach

                      @else


                        <li role="option" aria-selected="false">
                          <button type="button" value="01">분양/계약</button>
                        </li>
                        <li role="option" aria-selected="false">
                          <button type="button" value="02">AS/하자</button>
                        </li>
                        <li role="option" aria-selected="false">
                          <button type="button" value="03">수주상담</button>
                        </li>
                        <li role="option" aria-selected="false">
                          <button type="button" value="04">협력회사</button>
                        </li>
                        <li role="option" aria-selected="false">
                          <button type="button" value="05">일반문의</button>
                        </li>
                        <li role="option" aria-selected="false">
                          <button type="button" value="06">레저(골프장, 아쿠아필드)</button>
                        </li>

                      @endif

                    </ul>

                  </div>
                </dd>
              </dl>
              <div class="box">
                <dl>
                  <dt>
                    <label for="cust_nm">이름<span>*</span></label>
                  </dt>
                  <dd class="name">
                    <div class="input-box">
                      <input id="cust_nm" type="text">
                    </div>
                  </dd>
                </dl>
                <dl>
                  <dt>
                    <label for="mobile">연락처</label>
                  </dt>
                  <dd>
                    <div class="contact-box">
                      <div class="select-box">
                        <select id="mobile1" name="mobile1" title="">
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
              <div class="box">
                <dl>
                  <dt>
                    <label for="email">이메일<span>*</span></label>
                  </dt>
                  <dd>
                    <div class="email-box">
                      <div class="flex-area">
                        <div class="input-box">
                          <input id="email" type="text">
                        </div>
                        <span>@</span>
                        <div class="input-box">
                          <input type="text" class="domain">
                        </div>
                      </div>
                      <div class="select-box domain">
                        <select id="mail_server" name="mail_server" title="">
                          <option value="">직접입력</option>
                          <option value="naver.com">naver.com</option>
                          <option value="nate.com">nate.com</option>
                          <option value="yahoo.co.kr">yahoo.co.kr</option>
                          <option value="hotmail.com">hotmail.com</option>
                          <option value="gmail.com">gmail.com</option>
                        </select>
                      </div>
                    </div>
                    <p class="text-info">*이메일로 답변드리니 정확히 기입해 주시기 바랍니다.</p>
                  </dd>
                </dl>
              </div>
              <dl class="reply">
                <dt>답변 회신 여부<span>*</span></dt>
                <dd>
                  <div class="radio-box">
                    <input id="reply_yn_01" type="radio" name="reply_yn" value="Y">
                    <label for="reply_yn_01">필요</label>
                  </div>
                  <div class="radio-box">
                    <input id="reply_yn_02" type="radio" name="reply_yn" value="N">
                    <label for="reply_yn_02">불필요</label>
                  </div>
                </dd>
              </dl>
            </div>
          </div>
        </div>
        <div class="flex-box summary" style="display:none;">
          <div class="inner-cell">
            <h3 class="sg-text-04">사업 개요</h3>
          </div>
          <div class="inner-cell">
            <div class="write-box">
              <dl>
                <dt>
                  <label for="address">공사위치<br>(주소)<span>*</span></label>
                </dt>
                <dd>
                  <div class="input-box">
                    <input id="address" type="text">
                  </div>
                </dd>
              </dl>
              <div class="box">
                <dl>
                  <dt>
                    <label for="gu">지역지구</label>
                  </dt>
                  <dd>
                    <div class="input-box">
                      <input id="gu" type="text">
                    </div>
                  </dd>
                </dl>
                <dl>
                  <dt>
                    <label for="usage">용도</label>
                  </dt>
                  <dd>
                    <div class="input-box">
                      <input id="usage" type="text">
                    </div>
                  </dd>
                </dl>
                </dl>
              </div>
              <div class="box column03">
                <dl>
                  <dt>
                    <label for="gfa">연면적</label>
                  </dt>
                  <dd class="unit-box">
                    <div class="input-box">
                      <input id="gfa" type="text">
                    </div>
                    <span class="unit">㎡</span>
                  </dd>
                </dl>
                <dl>
                  <dt>
                    <label for="floors_no">지상층수</label>
                  </dt>
                  <dd>
                    <div class="input-box">
                      <input id="floors_no" type="text">
                    </div>
                  </dd>
                </dl>
                <dl>
                  <dt>
                    <label for="household">세대수</label>
                  </dt>
                  <dd>
                    <div class="input-box">
                      <input id="household" type="text">
                    </div>
                  </dd>
                </dl>
              </div>
              <div class="box column03">
                <dl>
                  <dt>
                    <label for="land_area">대지면적</label>
                  </dt>
                  <dd class="unit-box">
                    <div class="input-box">
                      <input id="land_area" type="text">
                    </div>
                    <span class="unit">㎡</span>
                  </dd>
                </dl>
                <dl>
                  <dt>
                    <label for="basement_no">지하층수</label>
                  </dt>
                  <dd>
                    <div class="input-box">
                      <input id="basement_no" type="text">
                    </div>
                  </dd>
                </dl>
                <dl>
                  <dt>
                    <label for="contract_amt">도급액</label>
                  </dt>
                  <dd>
                    <div class="input-box">
                      <input id="contract_amt" type="text">
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>
        </div>
        <div class="flex-box">
          <div class="inner-cell">
            <h3 class="sg-text-04">상담자 내용</h3>
          </div>
          <div class="inner-cell">
            <div class="write-box">
              <dl>
                <dt>
                  <label for="subject">제목<span>*</span></label>
                </dt>
                <dd>
                  <div class="input-box">
                    <input id="subject" type="text">
                  </div>
                </dd>
              </dl>
              <dl class="write">
                <dt>
                  <label for="content">내용<span>*</span></label>
                </dt>
                <dd>
                  <div class="input-box js-textarea">
                    <div class="box">
                      <textarea id="content" name="txt-field" maxlength="1500" cols="30" rows="10" placeholder="불건전한 내용(음해성/음란성 비방 등) 또는 광고성 게시물은 사전 통보 없이 삭제처리 될 수 있으며, 내용 작성 시 개인정보(연락처, 주소, 주민등록번호 등) 가 포함되지 않도록 주의해 주시기 바랍니다."></textarea>
                      <div class="length-box"><!-- 글자수 카운트 시작 시 class 추가 : count -->
                        <span class="current-length">0</span>/<span class="total-length">1,500</span>
                      </div>
                    </div>
                  </div>
                </dd>
              </dl>
              <dl>
                <dt>파일첨부</dt>
                <dd>
                  <div class="attach-file-box">
                    <div class="file-box">
                      <div class="attach-field">
                        <div class="attach-file js-attach-file">
                          <input type="text" class="attach-text" readonly="readonly">
                          <label for="attachFile01">파일첨부</label>
                          <input type="file" class="attach-file" id="attachFile01">
                        </div>
                        <button type="button" class="add-file del"><span class="blind">첨부파일 필드 추가</span></button>
                      </div>
                      <div class="attach-field" style="display: none">
                        <div class="attach-file js-attach-file">
                          <input type="text" class="attach-text" readonly="readonly">
                          <label for="attachFile02">파일첨부</label>
                          <input type="file" class="attach-file" id="attachFile02">
                        </div>
                        <button type="button" class="add-file del"><span class="blind">첨부파일 필드 추가</span></button>
                      </div>
                      <div class="attach-field" style="display: none">
                        <div class="attach-file js-attach-file">
                          <input type="text" class="attach-text" readonly="readonly">
                          <label for="attachFile03">파일첨부</label>
                          <input type="file" class="attach-file" id="attachFile03">
                        </div>
                        <button type="button" class="add-file del"><span class="blind">첨부파일 필드 추가</span></button>
                      </div>
                      <div class="attach-field" style="display: none">
                        <div class="attach-file js-attach-file">
                          <input type="text" class="attach-text" readonly="readonly">
                          <label for="attachFile04">파일첨부</label>
                          <input type="file" class="attach-file" id="attachFile04">
                        </div>
                        <button type="button" class="add-file del"><span class="blind">첨부파일 필드 추가</span></button>
                      </div>
                      <div class="attach-field" style="display: none">
                        <div class="attach-file js-attach-file">
                          <input type="text" class="attach-text" readonly="readonly">
                          <label for="attachFile05">파일첨부</label>
                          <input type="file" class="attach-file" id="attachFile05">
                        </div>
                        <button type="button" class="add-file del"><span class="blind">첨부파일 필드 추가</span></button>
                      </div>
                    </div>
                    <p class="msg">첨부파일은 최대 5개 등록 가능합니다. (50MB 이내의 확장자 png, jpg, jpeg, gif, pdf)</p>
                  </div>
                </dd>
              </dl>
              <dl class="password">
                <dt>
                  <label for="password">비밀번호<span>*</span></label>
                </dt>
                <dd>
                  <div class="input-box">
                    <input id="password" type="password" placeholder="6자리 숫자 입력" maxlength="6">
                  </div>
                </dd>
              </dl>
              <dl class="password">
                <dt>
                  <label for="otp">보안코드<span>*</span></label>
                </dt>
                <dd>
                  <div class="input-box attach-file-box">
                    <input id="otp" type="text" placeholder="보안코드 입력" maxlength="6">
                    <p class="msg">{{$token}}</p>
                  </div>
                </dd>
              </dl>
            </div>
            <ul class="list03">
              <li>* ‘<span>*</span>’표시는 필수 입력사항 입니다.</li>
              <li>* 문의 내용은 비공개 처리 되며 등록 및 답변은 [고객상담실 > 상담결과조회] 메뉴에서 입력하신 이메일과 비밀번호를 통해 확인하실 수 있습니다.</li>
            </ul>
            <div class="btn-wrap">
              <a href="customer-service-center" id="cancel" class="btn btn btn-tertiary-sm cancel">취소</a>
              <button id="add" type="button" class="btn btn-primary-sm confirm">등록</button>
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
          <button id="pop-confirm" class="btn btn-primary-sm">확인</button>
        </div>
      </div>
    </div>

    <div id="pop-confirm" class="layer" role="dialog" aria-modal="true">
      <div class="layer-wrap">
        <div id="pop-confirm-text" class="layer-content">
          등록하시겠습니까?
        </div>
        <div class="button-wrap">
          <button id="pop-cancel" class="btn btn-tertiary-sm">취소</button>
          <button id="pop-add" class="btn btn-primary-sm">등록</button>
        </div>
      </div>
    </div>
  </div>
  <!--: End #contents -->

  @include('main.ko.inc.footer')
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
    $.depth2Index = 7
    // 구분: dropdown
    let gubun = '00';

    /** 파일 첨부 */
    let $attachBox = $('.file-box')
    let isAttached = []

    $(document).ready(function () {

      init();

      let $distinction = $('.js-dropdown.distinction')
      $distinction.dropdown('clear')
      $distinction.find('li').last().insertBefore($distinction.find('li').last().prev())
      $distinction.dropdown()

      $("ul li button").on('click', function(e){
          gubun = $(this).val();
          let $summary = $('.flex-box.summary');
          if (gubun === '03')
          {
            $summary.css('display', 'flex')
          }
          else
          {
            $summary.css('display', 'none')
          }
      });

      // 이메일
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
      function response(res) {
        if (res != null) {
          if (res.code == '0000') {
            Vue.alert(res.message).then((val) => {
              if (val == true) {
                var params = {
                  type: '01', //고객상담
                  gubun: gubun,
                  receipt_id: res.data.receipt_id
                }
                send_mail(getUrl('sendmail-regist'), params);
              }
            });
          } else {
            var code = res.code;
            var message = res.message;
            if (!com_utils.isEmpty(res.data)) {
              //맨 첫 컬럼 내용만 보여 줌.
              Vue.alert('[' + code + '] ' + res.data[0]);
            } else {
              Vue.alert('[' + code + '] ' + message);
            }
          }
        }
      }

      //--------------------------------------------
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
        var address = $("#address").val();
        var gu = $("#gu").val();
        var gfa = $("#gfa").val();
        var land_area = $("#land_area").val();
        var usage = $("#usage").val();
        var floors_no = $("#floors_no").val();
        var basement_no = $("#basement_no").val();
        var contract_amt = $("#contract_amt").val();
        var household = $("#household").val();

        var reply_yn = $('input[name="reply_yn"]:checked').val();

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
          type: '01', //고객상담
          gubun: gubun,
          reply_yn: reply_yn,
          subject: subject,
          content: content,
          address: address,
          gu: gu,
          gfa: gfa,
          land_area: land_area,
          usage: usage,
          floors_no: floors_no,
          basement_no: basement_no,
          contract_amt: contract_amt,
          household: household,
          password: com_utils.SHA256(password),
          lang: 'ko',
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

      // 등록
      $('.btn-wrap .confirm').on('click', e => {
        Add();
      })

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
          Alert('14세 이상 필수 여부를 확인해 주세요.');
          return false;
        }

        if (chk_privacy_info_yn == false)
        {
          Alert('개인정보 수집 동의 필수 여부를 확인해 주세요.');
          return false;
        }

        var password = $("#password").val();
        if (com_utils.isEmpty(password) || password.length != 6)
        {
          Alert('비밀번호 6자리를 입력해 주세요.');
          return false;
        }

        var mobile1 = $('#mobile1').val();
        var mobile2 = $('#mobile2').val();
        var mobile3 = $('#mobile3').val();
        var chk_privacy_policy_yn = $('#privacy_policy_yn').is(':checked');

        if (chk_privacy_policy_yn==false)
        {
          if ( !com_utils.isEmpty(mobile2) || !com_utils.isEmpty(mobile3) )
          {
            Alert('연락처를 등록하려면,개인정보 수집 및 이용에 동의해야 합니다.');
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
          Alert('이메일은 필수 입력 항목 입니다.');
          return false;
        }

        if (gubun==='00')
        {
          Alert('구분을 선택해 주세요.');
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

    })
  })(window.jQuery)
</script>
</body>
</html>
