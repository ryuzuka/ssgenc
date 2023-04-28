
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
                    
                    {{-- contents section --}}
                    @yield('contents')

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
    // 상세에서 기본적으로 제공되는 첨부파일 처리 기능
    //이미지 타입과 첨부파일 타입을 구분해야 한다.
    $( function() {
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

            if (files.length > 3)
            {
                Vue.alert("첨부파일 개수는 최대 3개까지만 가능합니다.");
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
                }
            })
            .catch(()=>{
            });
        });
    });
</script>

@stack('srcipt_source')

@include('includes.footer')
