@php

  if(!isset($page))
  {
    $page = 1;
  }

  if(!isset($gubun))
  {
    $gubun = '01';
  }

@endphp

<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : ".$category
  ])
</head>

<body>
  <div class="wrap">
    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents housing section header-black">
      <div class="sub-content project">
        <div class="inner">
          <div class="sub-header">
            <em class="sg-text-06">{{ $category }}</em>
            <p class="sg-text-01">{{ $title }}</p>
            <p class="sg-text-07">{!! $description !!}</p>
            <div class="btn-box">

              @if ($biz_area!=='05')
                <a href="#" id="result_list" class="btn btn-primary result"><span>See results</span></a>
              @endif

              @if ($biz_area==='02')
                <a href="https://villiv.co.kr/main" target="_blank" title="새창 열림" class="btn btn-tertiary">
                  <span>See VILLIV</span>
                </a>
              @endif
            </div>
          </div>
          <div class="tab js-tab">

            <div class="dropdown tabs js-dropdown">

              @if( isset($items_gubun) )
                @foreach($items_gubun as $item)

                  @if ($gubun == $item->code_id)
                    <button type="button" id="dropdown" 
                      class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false"
                      value="{{ $item->code_id }}">
                      {{ $item->code_nm_en }}
                    </button>
                  @endif

                @endforeach  
              @endif

              <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">

                @if( isset($items_gubun) )

                  @php

                    $i = 0;

                  @endphp

                  @foreach($items_gubun as $item)

                      @if ($item->code_id != '00')

                        @if ($gubun == $item->code_id)

                          <li role="option" aria-selected="true">
                            <button class="dropdown-gubun" id="dropdown{{ $i+1 }}" type="button" value="{{ $item->code_id }}">
                              {{ $item->code_nm_en }}
                            </button>
                          </li>

                        @else

                          <li role="option" aria-selected="false">
                            <button class="dropdown-gubun" id="dropdown{{ $i+1 }}" type="button" value="{{ $item->code_id }}">
                              {{ $item->code_nm_en }}
                            </button>
                          </li>

                        @endif

                        @php

                          $i++;
      
                        @endphp
      
                      @endif

                  @endforeach
        
                @endif

              </ul>

            </div>

            <div class="tab-list" role="tablist">

                @if( isset($items_gubun) )

                  @php

                    $i = 0;

                  @endphp

                  @foreach($items_gubun as $item)

                      @if ($item->code_id != '00')

                        @if ($gubun == $item->code_id)

                            <button class="tab-gubun" type="button" id="tab{{ $i+1 }}" role="tab" value="{{ $item->code_id }}"
                              aria-controls="tab-content{{ $i+1 }}" aria-selected="true">
                              {{ $item->code_nm_en }}
                            </button>

                        @else

                          <button class="tab-gubun" type="button" id="tab{{ $i+1 }}" role="tab" value="{{ $item->code_id }}"
                            aria-controls="tab-content{{ $i+1 }}" aria-selected="false">
                            {{ $item->code_nm_en }}
                          </button>

                        @endif

                        @php

                          $i++;
      
                        @endphp
        
                      @endif

                  @endforeach
      
              @endif

            </div>
            
            <div class="content" role="tabpanel">
                  
                <div class="pj-cont">
                  @if ( isset($main_item) )

                        <div class="default-area">
                          {{-- 상세페이지 이동 링크 --}}
                          <a href="{{ url('main-project-detail?id='.$main_item->id) }}">
                            <div class="inner-cell">
                              <picture>

                                {{-- 모바일용 메인이미지 --}}
                                <source media="(max-width: 1024px)" srcset="{{$main_item->main_mo_image }}">
                                {{-- PC용 메인이미지 --}}
                                <img src="{{ $main_item->main_image }}" alt="{{ $main_item->name_en }}">

                              </picture>
                            </div>
                            <div class="inner-cell">
                              <em class="sg-text-03">{{ $main_item->name_en }}</em>

                              <span class="sg-text-10">

                                @if ($main_item->from == $main_item->to)
                                  {{ date('Y-m', strtotime($main_item->from)) }}
                                @else
                                  {{ date('Y-m', strtotime($main_item->from)) }} ~ 
                                    @if($main_item->project_yn == 'Y') {{ 'under construction' }} @else {{ date('Y-m', strtotime($main_item->to)) }} @endif
                                @endif

                              </span>

                              <p class="sg-text-08">{!! $main_item->desc_en !!}</p>
                            </div>
                          </a>
                        </div>

                  @endif

                  @if ( isset($items) )

                    <ul id="item_list" class="list">

                      @foreach($items as $item)

                        @if ($gubun == '01' && $item->main_yn == 'Y')
                        
                        @else
                        
                          <li>
                            {{-- 상세페이지 이동 링크 --}}
                            <a href="{{ url('main-project-detail?id='.$item->id) }}">
                              <picture>

                                @if(isset($items_file))

                                  @foreach($items_file as $it)

                                    @if ($item->attach_id == $it['attach_id'])

                                      @php

                                        $file_token = $it['file_token'];

                                        $thumb_image = null;
                                        $thumb_mo_image = null;

                                        foreach($it['files'] as $file)
                                        {
                                          switch($file['file_view_id'])
                                          {
                                            case '#thumb_image'   : $thumb_image    = $file['file_nm']; break;
                                            case '#thumb_mo_image': $thumb_mo_image = $file['file_nm']; break;
                                          }
                                        }

                                        // dd($file_token.'_'.$thumb_image);
                                        
                                      @endphp

                                      {{-- 모바일용 대표이미지 --}}
                                      <source media="(max-width: 1024px)" srcset="/download/{{ $file_token.'_'.$thumb_mo_image }}">
                                      {{-- PC용 대표이미지 --}}
                                      <img src="/download/{{ $file_token.'_'.$thumb_image }}" alt="{{ $item->name }}">
                                      
                                    @endif

                                  @endforeach

                                @endif

                              </picture>
                              <em class="sg-text-06">{{ $item->name }}</em>
                              <span class="sg-text-10">
                                
                                @if ($item->from == $item->to)
                                  {{ date('Y-m', strtotime($item->from)) }}
                                @else
                                  {{ date('Y-m', strtotime($item->from)) }} ~ 
                                    @if($item->project_yn == 'Y') {{ 'under construction' }} @else {{ date('Y-m', strtotime($item->to)) }} @endif
                                @endif

                              </span>
                            </a>
                          </li>

                        @endif  

                      @endforeach

                    </ul>

                    <div class="btn-wrap">
                      <button type="button" class="btn btn-secondary more"><span>See more</span></button>
                    </div>

                  @endif

                </div>    

          </div>
        </div>
      </div>
    </div>

    {{-- 프로젝트 실적 팝업 --}}
    @include('main.en.project.pj_result', [
      'biz_area' => $biz_area,
      'items' => (isset($items))?$items:null
    ])

    </div>
    <!--: End #contents -->
    @include('main.en.inc.footer')
  </div>

  <div class="wrap-loading display-none">
    <div style="width: 60px"><img src="images/loading.gif"/></div>
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

  <!-- common, plugins, app -->
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/plugins.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <!-- -->
  <script type="text/javascript" src="/js/components/project/index.js"></script>
  <script type="text/javascript" src="/js/components/project/ProjectRecord.js"></script>
  <!-- -->
  
  <script>
    ($ => {
      $.depth1Index = 1
      $.depth2Index = 0
      var $content = $('.contents.section');
      var $tab = $(".js-tab");
      var $dropdown = $(".js-dropdown");

      var page = "{{ $page }}";
      var biz_area = "{{ $biz_area }}";
      var gubun = "{{ $gubun }}";
      var category = "{{ $category }}";
      var items_more = "{{ $items_more }}";

      if (biz_area === '05') {
        $tab.find('.tab-list button').eq(3).attr('disabled', true)
        $dropdown.find('.dropdown-list > li').eq(3).find('button').attr('disabled', true)
      }

      switch(biz_area)
      {
        case '02': $.depth2Index = 0; break;
        case '03': $.depth2Index = 1; break;
        case '04': $.depth2Index = 2; break;
        case '05': $.depth2Index = 3; break;
      }

      if (com_utils.isEmpty(page))
      {
        page = 1;
      }
      else{
        page = Number(page)+1;
      }

      if (items_more == 0)
      {
        $("button.more").attr('disabled', true);
      }

      $(document).ready(function () {
        window.SSG.Project.init();
        window.SSG.ProjectRecord.init(biz_area, gubun);
        
        $tab.tab('active', Number(gubun)-1);
        $dropdown.dropdown('active', Number(gubun)-1);

        $(".btn-wrap").on('click', function(e){
          e.preventDefault();

          // Vue.alert('more');
          load_more();
        });
      });

      //탭 변경시 이벤트 처리
      $(document).on('click', '.tab-gubun, .dropdown-gubun', function(e) {
          var id = $(this).attr("id");
          gubun = $('#'+id).val();

          var params = {
            page: 1,
            biz_area: biz_area,
            gubun: gubun
          };

          var url = null;

          switch(biz_area)
          {
            default:
            case '02': url = "{{ url('/housing-facility?') }}"; break;            //주거시설
            case '03': url = "{{ url('/construction-facility?') }}"; break;       //건축시설
            case '04': url = "{{ url('/civil-engineering-facility?') }}"; break;  //토목시설
            case '05': url = "{{ url('/leisure-business?') }}"; break;            //레저사업
          }

          $(location).attr('href', url + jQuery.param(params) );
      });

      function load_more()
      {
        if ($("button.more").attr('disabled'))
        {
          return;
        }

        var params = {
          page: (page==1)?page++:page,
          biz_area: "{{ $biz_area }}",
          gubun: gubun
        };

        $.ajax({
          url: "{{ url('/') }}" + "/api/project/loadmore?" + jQuery.param(params),
          type: "get",
          datatype: "html",
          beforeSend: function()
          {
            $('.wrap-loading').show();
          }
        })
        .done(function(res)
        {          
          $('.wrap-loading').hide();

          var html = '';
          var count = 0;
          var items_more = 0;

          if (res == null)
          {
            return;
          }

          if (res.code=='0000')
          {
            count = res.data.count;
            items_more = res.data.items_more;
            html = res.data.html;
            if (items_more == 0)
            {
              $("button.more").attr('disabled', true);
            }
          }

          page++;

          //id를 정해야 함.
          $("#item_list").append(html);

        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
          // Vue.alert('No response from server');
        });
      }
      
    })(window.jQuery)
  </script>
</body>
</html>
