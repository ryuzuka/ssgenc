{{-- 
  // 페이지명 : 관리자 관리 등록/수정
  // 설명 : 관리자 관리 상세 및 등록/수정을 한다.
--}}

{{-- 1) 보드 리스트형식의 템플릿 --}}
@extends('layouts.board_detail', [
      'title' => '관리자 관리',
      'subject' => '사용자 정보 '.(($edit)?'수정':'등록'),
      'lang' => 'ko',
      'tab_no' => 3,
      'menu_no' => 0
  ])

{{-- 2) contents 영역 --}}
@section('contents')

@php

$id = null;
$part_id = null;
$user_type = null;

$items_user_find_key = null;

if(isset($item))
{
  $id = $item->user_id;
  $part_id = $item->part_id;
  $user_type = $item->user_type;
}

// dd($menus_access);

@endphp

  <tr>
    <th scope="row">이름 <span>*</span></th>
    <td>
      <div class="find-id">
        <input id="name" type="text" class="w375" value="{{ isset($item->name)? $item->name : '' }}" @if($edit) readonly @endif>
      </div>
    </td>
  </tr>
  <tr>
    <th scope="row">아이디 <span>*</span></th>
    <td>
      <div class="find-id">
        <input id="user_id" type="text" class="w375" value="{{ isset($item->user_id)? $item->user_id : '' }}" @if($edit) readonly @endif>

        @if (!$edit)

          <button id="user_id_check" type="button" class="btn">아이디 중복 체크</button>

        @endif

      </div>
    </td>
  </tr>

  @if ($edit)

    <tr>
      <th scope="row">비밀번호 <span>*</span></th>
      <td>
        <div class="find-id">
          <input id="password" type="password" class="w375">
          {{-- <button type="button" class="btn">저장</button> --}}
        </div>
      </td>
    </tr>
    
    @if(isset($edit) && $edit == true)

      <tr>
        <th scope="row">비밀번호 <span>*</span></th>
        <td>
          <button id="pwdgen" type="button" class="btn">비밀번호 재발급</button>
        </td>
      </tr>

    @endif

  @else

    <tr>
      <th scope="row">비밀번호 <span>*</span></th>
      <td>
        <input id="password" type="password" minlength="8">
        <span class="text-info col">8자 이상 영문 대문자/영문 소문자/숫자/특수문자 중 3가지 이상 조합하여 입력해주세요.</span>
      </td>
    </tr>

    {{-- <tr>
      <th scope="row">비밀번호 확인 <span>*</span></th>
      <td>
        <div class="find-id">
          <input type="text" class="w375">
          <button id="pwdcheck" type="button" class="btn">재 확인</button>
        </div>
      </td>
    </tr> --}}

    @endif

  <tr>

    <th scope="row">소속 <span>*</span></th>
    <td>
      {{-- <input id="part_nm" type="text" class="w375" value="{{ isset($item->part_nm)? $item->part_nm : '' }}"> --}}

    {{-- 소속 --}}
    @include('includes.select', [
        // 'text' => '소속선택',
        'id_name' => 'part_id',
        'items' => $items_parts,
        'code_id' => $part_id
        ])    
    </td>

  </tr>
  <tr>
    <th scope="row">이메일주소 <span>*</span></th>
    <td>
      <input id="email" type="text" class="w375" value="{{ isset($item->email)? $item->email : '' }}">
      <div class="check-box">

          @if (isset($item->email_yn) && $item->email_yn=='Y')
            <input id="email_yn" type="checkbox" name="email_yn" value="Y" checked>
          @else
            <input id="email_yn" type="checkbox" name="email_yn" value="N">
          @endif

        <label for="email_yn">메일 알림 받기</label>
      </div>
    </td>
  </tr>
  <tr>
    <th scope="row">권한설정 <span>*</span></th>
    <td>
      <div class="authority">
        <div class="area">
          <span class="text">등급</span>
          <div class="cont">

            @if (isset($items_user_types))

              @foreach($items_user_types as $it)

                <div class="check-box">
                  <input id="user_type{{ $it->code_id }}" name="user_type" value="{{ $it->code_id }}" type="checkbox"
                      @if($user_type == $it->code_id) checked @endif>
                  <label for="user_type{{ $it->code_id }}">{{ $it->code_nm }}</label>
                </div>

              @endforeach

            @endif

          </div>
        </div>
        <div class="area">
          <span class="text">메뉴</span>
          <div class="cont">
            <div class="check-box">
              <input id="menu_all" type="checkbox">
              <label for="menu_all">전체 선택</label>
            </div>
          </div>
        </div>
        <div class="area">
          <span class="text">프로젝트 관리</span>
          <div class="cont">

            @if (isset($cat_project))

              @foreach($cat_project as $it)

                <div class="check-box">
                  <input id="project{{ $it->menu_id }}" value="{{ $it->menu_id }}" name="menu_projects" type="checkbox">
                  <label for="project{{ $it->menu_id }}">{{ $it->menu_nm }}</label>
                </div>

              @endforeach

            @endif

          </div>
        </div>
        <div class="area">
          <span class="text">게시판 관리</span>
          <div class="cont">

            @if (isset($cat_board))

              @foreach($cat_board as $it)

                <div class="check-box">
                  <input id="board{{ $it->menu_id }}" value="{{ $it->menu_id }}" name="menu_boards" type="checkbox">
                  <label for="board{{ $it->menu_id }}">{{ $it->menu_nm }}</label>
                </div>

              @endforeach

            @endif

          </div>
        </div>
        <div class="area">
          <span class="text">고객상담 관리</span>
          <div class="cont">

            @if (isset($cat_cust))

              @foreach($cat_cust as $it)

                <div class="check-box">
                  <input id="cust{{ $it->menu_id }}" value="{{ $it->menu_id }}" name="menu_custs" type="checkbox">
                  <label for="cust{{ $it->menu_id }}">{{ $it->menu_nm }}</label>
                </div>

              @endforeach

            @endif

          </div>
        </div>
        <div class="area">
          <span class="text">사이트 관리</span>
          <div class="cont">

            @if (isset($cat_site))

              @foreach($cat_site as $it)

                <div class="check-box">
                  <input id="site{{ $it->menu_id }}" value="{{ $it->menu_id }}" name="menu_sites" type="checkbox">
                  <label for="site{{ $it->menu_id }}">{{ $it->menu_nm }}</label>
                </div>

              @endforeach

            @endif

          </div>
        </div>
          <div class="area">
            <span class="text">관리자 관리</span>
            <div class="cont">
  
              @if (isset($admin_site))
  
                @foreach($admin_site as $it)
  
                  <div class="check-box">
                    <input id="admin{{ $it->menu_id }}" value="{{ $it->menu_id }}" name="menu_admins" type="checkbox">
                    <label for="admin{{ $it->menu_id }}">{{ $it->menu_nm }}</label>
                  </div>
  
                @endforeach
  
              @endif
  
            </div>
  
        </div>
      </div>
    </td>
  </tr>

  <tr>
    <th scope="row">사유 <span>*</span></th>
    <td>
      <input id="reason" type="text" class="w375" value="{{ (isset($item->reason))? $item->reason : '홈페이지 운영' }}">
    </td>
  </tr>

  <tr>
    <th scope="row">승인권자 <span>*</span></th>
    <td>
      <input id="approved_id" type="text" class="w375" value="관리자" readonly>
    </td>
  </tr>

  <tr>
    <th scope="row">권한만료일자 <span>*</span></th>
    <td>
      <div class="datepicker-box">
        <div id="dateBox" class="date-box">
            <input id="expired_at" type="text" value="{{ (isset($item->expired_at))?$item->expired_at:'' }}">
        </div>
      </div>
    </td>
  </tr>

  <tr>

    {{-- 상태 --}}
    @include('includes.radio', [
        'text' => '상태 <span>*</span>',
        // 'must_check' => true,
        'id_name' => 'states',
        'items' => $items_states,
        'code_id' => isset($item->useflag)? $item->useflag : 'N'
      ])

  </tr>

@endsection

{{-- 3) 기능버튼 영역 --}}
@section('button_area')

  <div class="btn-wrap">

    @if ($edit)

      <div class="left">
        <button id="user_enable" type="button" class="btn btn-primary">계정활성화</button>
      </div>

    @endif

    <div class="right">
      <button id="cancel" type="button" class="btn btn-secondary">취소</button>
      <button id="add" type="button" class="btn btn-primary">등록</button>
    </div>
  </div>

@endsection

{{-- 4) 수정이력 영역 --}}
@if (isset($item))

@section('modify_history_area')

  <!-- 수정이력 -->
  <div class="modify-history">
    <em>수정이력</em>
    <ul>
      <li>최초작성 : <span>{{ $item->created_id }}</span> <span>{{ $item->created_at }}</span></li>
      <li>최종수정 : <span>{{ $item->updated_id }}</span> <span>{{ $item->updated_at }}</span></li>
    </ul>
  </div>
  <!-- // 수정이력 -->

@endsection

@endif

{{-- 5) 스크립트 영역 --}}
@once
@push('srcipt_source')
  
  <script>

    $( function() {

      var id = "{{ $id }}";
      var edit = "{{ $edit }}"
      var menus_access = JSON.parse('<?php echo json_encode($menus_access) ?>');
      var checkIdFlag = false;

      init();
      
      setAuthCheck('menu_projects');
      setAuthCheck('menu_boards');
      setAuthCheck('menu_custs');
      setAuthCheck('menu_sites');
      setAuthCheck('menu_admins');

      setId(id);
      setWorkId('user');

      function init()
      {
        $( "#expired_at" ).datepicker({ dateFormat: 'yy-mm-dd' });
      }

      $('#email_yn').on('click', function(){
        var val = $(this).val();
        if (val === 'Y')
        {
          $(this).val('N');
          $(this).prop('checked', false);
        }
        else
        {
          $(this).val('Y');
          $(this).prop('checked', true);
        }
      });

      $("#pwdgen").on('click', function(){

        //Vue.alert('비밀번호 재 발급...');
        var user_id = $("#user_id").val();

        var data = {
          user_id: user_id
        }

        //아예 메일 전송까지 컨트롤러에서 처리되어야 한다.
        com_utils.post(getUrl('send-pwdgen'), data, function(res){
          if (res.code == '0000')
          {
            Vue.alert(res.message).then((val)=>{
              if (val == true)
              {
              }
            });
          }
          else{
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
        });
      })

      function getItem()
      {
        var name = $("#name").val();
        var id = $("#user_id").val();
        var pw = $("#password").val();
        var email = $("#email").val();
        var email_yn = $("#email_yn").val();
        var part_id = $("select[name=part_id] option:selected").val();
        var useflag = $('input[name="states"]:checked').val();
        var approved_id = $("#approved_id").val();
        var reason = $("#reason").val();
        var user_type = $('input[type="checkbox"][name="user_type"]:checked').val();

        var menu_projects = getAuthCheck('menu_projects');
        var menu_boards   = getAuthCheck('menu_boards');
        var menu_custs    = getAuthCheck('menu_custs');
        var menu_sites    = getAuthCheck('menu_sites');
        var menu_admins   = getAuthCheck('menu_admins');
        var expired_at  = $( "#expired_at" ).val();

        var password = null;
        if ( !com_utils.isEmpty(pw) )
        {
          password = com_utils.SHA256(pw);
        }

        var password_next = new Date();
        password_next.setMonth(password_next.getMonth()+3);
        password_next.setDate(password_next.getDate());        

        var item = {
          id: id,
          name: name,
          password: password,
          part_id: part_id,
          useflag: useflag,
          email: email,
          email_yn: email_yn,
          user_type: user_type,
          reason: reason,
          approved_id: approved_id,
          expired_at: expired_at,
          password_next: password_next,
          menu_projects: menu_projects,
          menu_boards: menu_boards,
          menu_custs: menu_custs,
          menu_sites: menu_sites,
          menu_admins: menu_admins
        };

        return item;
      }

      //수정해야 함-작업중 소스 임=>사용자 등록 코드.
      function Add()
      {
        if ( edit !== '1' && !checkIdFlag )
        {
          Vue.alert('아이디 중복 여부를 확인해 주세요.');
          return;
        }

        request(getItem(), null, null);
      }

      function setAuthCheck(name)
      {
        $('input[type="checkbox"][name="'+name+'"]').each(function(){
          var $this = $(this);
          $.each(menus_access, function(i, item){
            if ($this.val() == item.menu_id)
            {
              $this.prop('checked', (item.useflag=='Y')?true:false);
            }
          });
        });
      }

      function getAuthCheck(name)
      {
        return $('input[type="checkbox"][name="'+name+'"]').map(function(i, e)
                {
                  var useflag = ($(this).prop('checked'))?'Y':'N';
                  return {menu_id:e.value, useflag:useflag};
                }).toArray();
      }

      //--------------------------------------
      function checkUserId()
      {
        var id = $("#user_id").val();

        if (com_utils.isEmpty(id))
        {
          Vue.alert('사용자 아이디가 입력되지 않았습니다.');
          return;
        }

        var data = {
          id: id
        }

        com_utils.post(getUrl('user-checkid'), data, function(res){
          if (res.code == '0000')
          {
            Vue.alert(res.message).then((val)=>{
              if (val == true)
              {
                checkIdFlag = true;
              }
            });
          }
          else{
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
        });
      }

      //--------------------------------------
      function enableUser()
      {
        var id = $("#user_id").val();

        var data = {
          id: id
        }

        com_utils.post(getUrl('user-enable'), data, function(res){
          if (res.code == '0000')
          {
            Vue.alert(res.message).then((val)=>{
              if (val == true)
              {
                window.location.replace(document.referrer);
              }
            });
          }
          else{
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
        });
      }

      //등록버튼
      $( "#add" ).on('click', function(e){
        e.preventDefault();

        var id = $("#user_id").val();
        var password = $("#password").val();

        //수정에서 패스워드 입력되어 있지 않으면 그냥 넘어감.
        if (edit === '1' && com_utils.isEmpty(password))
        {
          Add();
          return;
        }

        if( checkPassword(id, password) )
        {
          Add();
        }
      });

      //계정활성화 버튼
      $( "#user_enable" ).on('click', function(e){
        e.preventDefault();
        Vue.confirm('계정을 활성화 하시겠습니까?').then((val)=>{
          if (val == true)
          {
            enableUser();
          }
        })
        .catch(()=>{
          // console.log('cancel...');
        });        
      });

      $( "#user_id_check" ).on('click', function(e){
        e.preventDefault();
        checkUserId();
      });

      $("#menu_all").on('click', function(e){

        // Vue.alert('메뉴 전체선택.');
        var checked = $('#menu_all').is(':checked');
        if(checked)
        {
          $('input[type="checkbox"][name="menu_projects"]').prop('checked', true);
          $('input[type="checkbox"][name="menu_boards"]').prop('checked', true);
          $('input[type="checkbox"][name="menu_custs"]').prop('checked', true);
          $('input[type="checkbox"][name="menu_sites"]').prop('checked', true);
          $('input[type="checkbox"][name="menu_admins"]').prop('checked', true);
        }
        else
        {
          $('input[type="checkbox"][name="menu_projects"]').prop('checked', false);
          $('input[type="checkbox"][name="menu_boards"]').prop('checked', false);
          $('input[type="checkbox"][name="menu_custs"]').prop('checked', false);
          $('input[type="checkbox"][name="menu_sites"]').prop('checked', false);
          $('input[type="checkbox"][name="menu_admins"]').prop('checked', false);
        }
      });

      $('input[type="checkbox"][name="user_type"]').on('click', function(){
        if ($(this).prop('checked'))
        {
          $('input[type="checkbox"][name="user_type"]').prop('checked', false);
          $(this).prop('checked', true);
        }
      });
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
        var msgbox = Vue.alert;

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
        var msgbox = Vue.alert;

        if (typeof user_id == 'undefined' || user_id == '')
        {
            msgbox('아이디를 입력해 주세요.');
            return false;
        }

        if ( !check_password(password) )
        {
            msgbox('비밀번호는 숫자와 영문자 특수문자 조합으로 8~40자리를 사용해야 합니다.');
            return false;
        }

        var checkNumber = password.search(/[0-9]/g);
        var checkEnglish = password.search(/[a-z]/ig);

        if( checkNumber <0 || checkEnglish <0 )
        {
            msgbox('비밀번호는 숫자와 영문자를 혼용하여야 합니다.');
            return false;
        }

        if( /(\w)\1\1/.test(password) )
        {
            msgbox('비밀번호는 같은 문자를 연속으로 3번 이상 사용하실 수 없습니다.');
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

  </script>

@endpush
@endonce