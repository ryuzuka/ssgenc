
@include('includes.header', ['title' => $title, 'lang' => $lang])

<div class="wrap">
    <div class="wrapper">

    @include('includes.body_header')

        <div class="container">

            @include('includes.body_topmenu_auth', ['tab_no' => $tab_no])

            <div class="contents-wrap">

                @include('includes.body_leftmenu_auth', ['tab_no' => $tab_no, 'menu_no' => $menu_no])

                <!-- Contents -->
                <div class="contents">
                    <h2>{{ $subject }}</h2>
                    <table class="tbl">
                        <colgroup>
                            <col style="width:20%;">
                            <col style="width:80%;">
                        </colgroup>
                        <tbody>
                            
                            {{-- contents section --}}
                            @yield('contents')
                        
                        </tbody>
                    </table>

                    {{-- 기능 버튼 영역 --}}
                    @yield('button_area')

                    <div class="wrap-loading display-none">
                        <div style="width: 60px"><img src="images/loading.gif"/></div>
                    </div>

                    {{-- 수정이력 영역 --}}
                    @yield('modify_history_area')

                </div>
                <!-- // Contents -->

            </div>
        </div>
    </div>
</div>

<style type="text/css" >
    .wrap-loading{ /*화면 전체를 어둡게 합니다.*/
        position: fixed;
        left:0;
        right:0;
        top:0;
        bottom:0;
        background: rgba(0,0,0,0.2); /*not in ie */
        filter: progid:DXImageTransform.Microsoft.Gradient(startColorstr='#20000000', endColorstr='#20000000');/* ie */
    }
    .wrap-loading div{ /*로딩 이미지*/
        position: fixed;
        top:50%;
        left:50%;
        margin-left: -21px;
        margin-top: -21px;
    }
    .display-none{ /*감추기*/
        display:none;
    }
</style>

<script>

    //상세 공통함수 전제 조건(라우터생성)
    //1. api/{workid}/store => 저장
    //2. api/{workid}/delete => 삭제
    //3. api/{workid}/update => 레코드와 첨부파일 바인딩

    var $_this_workid   = null;     //현재 선택된 업무id
    var $_this_id       = null;     //현재 상세로 선택된 레코드id
    var $_this_attach_id = null;    //현재 상세로 선택된 레코드 첨부id


    //상세 공통 함수
    //--------------------------------------------
    //현재진행되는 업무 페이지를 지정한다.
    function setWorkId(id)
    {
        $_this_workid = id;
    }

    //--------------------------------------------
    //현재 업무의 레코드 id를 지정한다.
    function setId(id)
    {
        $_this_id = id;
    }

    function setAttachId(id)
    {
        $_this_attach_id = id;
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
        return getBaseUrl() + '/api/' + $_this_workid + '/' + key;
    }

    function fileErrorHandler(res)
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

    //file_id 와 file_view_id를 통해 1개의 파일만 삭제한다.
    //마지막 파일이 삭제될땨, attach_id가 클리어되어야 함.
    //첨부파일 기능이 없는 상세화면은 이 함수가 호출되지 않는다.
    function fileDelete($view_id)
    {
        var item = {
            file_id: $_this_attach_id,
            file_view_id: '#'+$view_id  //실제 디비에는 #이 포함됨.
        }

        com_utils.post(getBaseUrl()+'/api/file/delete', item, function(res){
            if (res.code == '0000')
            {
                if( !com_utils.isEmpty(res.data) )
                {
                    if (res.data.file_id == 0)
                    {
                        com_utils.post(getUrl('deleteAttach'), {id:$_this_id}, function(res){
                            if (res.code == '0000')
                            {
                                Vue.alert(res.message);
                            }
                            else
                            {
                                fileErrorHandler(res);
                            }   
                        });
                        
                        return;
                    }
                }

                Vue.alert(res.message);
            }
            else
            {
                fileErrorHandler(res);
            }
        });
    }

    //--------------------------------------------
    //id의 레코드를 삭제한다.
    function Delete(id)
    {
        var item = {
            id: id
        }

        com_utils.post(getUrl('delete'), item, function(res){
            if (res.code == '0000')
            {
                Vue.alert(res.message).then((val)=>{
                if (val == true)
                {
                    window.location.replace(document.referrer);
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
        });
    }

    //--------------------------------------------
    //data : param data
    //image : 이미지 포맷 첨부파일
    //attach : 첨부파일 포맷 pdf, xls => 멀티목록으로 등록함.
    function request(data, image, attach)
    {
        // com_utils.request = function (csrf_token, url, data, arrImage, attach, loading_id, callback)
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
                        window.location.replace(document.referrer);
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

    // 상세에서 기본적으로 제공되는 첨부파일 처리 기능
    //이미지 타입과 첨부파일 타입을 구분해야 한다.
    $( function() {

        if ($_this_id !== "")
        {
            $( "#delete" ).removeClass("btn-secondary");
            $( "#delete" ).addClass("btn-primary");
        }
        else
        {
            $( "#delete" ).removeClass("btn-primary");
            $( "#delete" ).addClass("btn-secondary");
        }

        $( "#cancel" ).removeClass("btn-secondary");
        $( "#cancel" ).addClass("btn-primary");

        $( "#add" ).removeClass("btn-secondary");
        $( "#add" ).addClass("btn-primary");

        // attach file change
        $(".attach-file").on('change',function(){
            var fileName = $(this).val();
            var $fb = $(this).parents('.file-box');

            $fb.find('.attach-text').val(fileName);

            var $fb_next = $fb.next('.regist-box');
            var $img = $fb_next.find('.regist-img');

            if ($img.length > 0)
            {
                $fb_next.find(".regist-file").children("span").text(fileName);
                var reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
                reader.onload = (e) => {
                    $img.children("img").attr('src', e.target.result);
                }
            }
            else
            {
                $fb.find('.regist-file').children("span").text(fileName);
            }
        });

        $(".attach-file-muliple").on('change',function(){

            var files = $(this)[0].files;

            if (files.length > 5)
            {
                Vue.alert("첨부파일 개수는 최대 5개까지만 가능합니다.");
                return;
            }

            var fileName = '';
            var $limit = 0;
            for(var i = 0; i < files.length; i++)
            {
                $limit = $limit + files[i].size;
                if($limit > 50000000)
                {
                    Vue.alert("첨부파일 용량은 총 50MB를 넘길수 없습니다.");
                    return;
                }

                fileName += files[i].name;

                if (i < files.length-1)
                {
                    fileName += ',';
                }
            }

            // console.log('fileName => ' + fileName);

            var $fb = $(this).parents('.file-box');
            $fb.find('.attach-text').val(fileName);
            $fb.find('.regist-file').children("span").text(fileName);
        });

        // attach file delete
        $( ".delete" ).on('click', function(e){
            e.preventDefault();

            // if (!com_utils.isEmpty(fileDelete))
            // {
            //     fileDelete($_this_id);
            // }

            // var $id = $(this).parents().parents().siblings(".file-box").find(".attach-file");
            // console.log('id => ' + $id.attr('id'));

            //첨부한 파일이 없을경우 넘어가도록
            $file_nm = $(this).siblings('span').text();
            // console.log('파일명 => ' + $file_nm);
            if(com_utils.isEmpty($file_nm))
            {
                return;
            }

            Vue.confirm('선택한 첨부파일을 삭제하시겠습니까?').then((val)=>{
                if (val == true)
                {
                    var $id = $(this).parents().parents().siblings(".file-box").find(".attach-file");
                    var $fb = $id.parents('.file-box');

                    $id.val("");
                    $fb.find(".attach-text").val("");

                    var $fb_next = $fb.next('.regist-box');
                    var $img = $fb_next.find('.regist-img');
                    if ($img.length > 0)
                    {
                        $fb_next.find(".regist-file").children("span").text("");
                        $img.children("img").attr("src", "");
                    }
                    else
                    {
                        $(this).prev().text("");
                        $(this).parents('.file-box').find('.attach-text').val("");
                    }

                    //파일삭제 서버 요청
                    //file_id, file_view_id 필요.
                    if (!com_utils.isEmpty(fileDelete))
                    {
                        fileDelete($id.attr('id'));
                    }
                }
            })
            .catch(()=>{
            });
        });

        //취소버튼   
        $( "#cancel" ).on('click', function(e){
            e.preventDefault();
            window.location.replace(document.referrer);
        });

        //삭제버튼
        $( "#delete" ).on('click', function(e){
            e.preventDefault();
            Vue.confirm('선택된 항목을 삭제하시겠습니까?').then((val)=>{
            if (val == true)
            {
                Delete($_this_id);
            }
            })
            .catch(()=>{
                // console.log('cancel...');
            });        
        });        
    });

</script>

@stack('srcipt_source')

@include('includes.footer')
