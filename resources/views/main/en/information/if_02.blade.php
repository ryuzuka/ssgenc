<!DOCTYPE html>
<html lang="en">
<head>
  @include('main.en.inc.meta',[
    "title" => "SHINSEGAE E&C : Awards & Certification"
    ])
</head>

<body class="en">
  <div class="wrap">

    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="sub-content i-if02 section header-black">
        <div class="inner">
          <div class="sub-header">
            <h2 class="sg-text-06">Awards</h2>
            <p class="sg-text-03">Shinsegae E&C received <br>
              <span>{{ $items_award_count }} awards</span> and <span>{{ $items_cert_count }} certificates.</span></p>
          </div>
          <div class="tab js-tab">
            <div class="dropdown tabs js-dropdown" placeholder="Awards">
              <button type="button" id="dropdown" class="dropdown-btn" aria-haspopup="listbox" aria-expanded="false">Awards</button>
              <ul class="dropdown-list" role="listbox" aria-labelledby="dropdown" tabindex="-1">
                <li role="option" aria-selected="false"><button type="button" data-value="">Awards</button></li>
                <li role="option" aria-selected="false"><button type="button" data-value="">Certification</button></li>
              </ul>
            </div>
            <div class="tab-list" role="tablist">
              <button type="button" id="tab1" role="tab" aria-controls="tab-content1" aria-selected="true">Awards</button>
              <button type="button" id="tab2" role="tab" aria-controls="tab-content2" aria-selected="false">Certification</button>
            </div>
            <div class="tab-content">

              <div id="tab-award" class="content" role="tabpanel" aria-labelledby="tab1" tabindex="0">
                <ul id="item_list" class="list01">

                  @if( isset($items) )

                    @foreach($items as $item)

                      <li>

                        <picture>

                          @if(isset($items_file))

                            @foreach($items_file as $it)

                              @if ($item->attach_id == $it['attach_id'])

                                @php

                                  $file_token = $it['file_token'];

                                  $main_image = null;
                                  $main_mo_image = null;

                                  foreach($it['files'] as $file)
                                  {
                                    switch($file['file_view_id'])
                                    {
                                      case '#main_image'    : $main_image     = $file['file_nm']; break;
                                      case '#main_mo_image' : $main_mo_image  = $file['file_nm']; break;
                                    }
                                  }
                                  
                                @endphp

                                {{-- 모바일용 메인이미지 --}}
                                @if (isset($main_mo_image))
                                  <source media="(max-width: 1024px)" srcset="/download/{{ $file_token.'_'.$main_mo_image }}">
                                @else
                                  <source media="(max-width: 1024px)" srcset="/images/information/img-if2-blank-m.png">
                                @endif

                                {{-- PC용 메인이미지 --}}
                                @if (isset($main_image))
                                  <img src="/download/{{ $file_token.'_'.$main_image }}" alt="{{ $item->subject_ko }}">
                                @else
                                  <img src="/images/information/img-if2-blank.png" alt="{{ $item->subject_ko }}">
                                @endif

                              @endif

                            @endforeach

                          @endif

                        </picture>

                        <em>{{ $item->subject_en }}</em>
                        <div class="agency">
                          <span>Hosted</span>
                          <span>{{ $item->agency_en }}</span>
                        </div>
                        <span class="date">{{ \Carbon\Carbon::parse($item->registed_at)->format('Y.m.d') }}</span>
                      </li>

                    @endforeach

                  @endif

                </ul>
                <div class="btn-wrap">
                  <button type="button" class="btn btn-secondary more"><span>Click for more awards</span></button>
                </div>
              </div>

              <div id="tab-cert" class="content" role="tabpanel" aria-labelledby="tab2" tabindex="0">
                <ul id="item_list" class="list01">

                  @if( isset($items) )

                    @foreach($items as $item)

                      <li>
                        {{-- 
                        <picture>
                          <source media="(max-width: 1024px)" srcset="/images/information/img-if2-19-m.png">
                          <img src="/images/information/img-if2-19.png" alt="사회복지자원봉사단체 보건복지부장관상">
                        </picture>
                        --}}

                        <picture>

                          @if(isset($items_file))

                            @foreach($items_file as $it)

                              @if ($item->attach_id == $it['attach_id'])

                                @php

                                  $file_token = $it['file_token'];

                                  $main_image = null;
                                  $main_mo_image = null;

                                  foreach($it['files'] as $file)
                                  {
                                    switch($file['file_view_id'])
                                    {
                                      case '#main_image'    : $main_image     = $file['file_nm']; break;
                                      case '#main_mo_image' : $main_mo_image  = $file['file_nm']; break;
                                    }
                                  }
                                  
                                @endphp

                                {{-- 모바일용 메인이미지 --}}
                                @if (isset($main_mo_image))
                                  <source media="(max-width: 1024px)" srcset="/download/{{ $file_token.'_'.$main_mo_image }}">
                                @else
                                  <source media="(max-width: 1024px)" srcset="/images/information/img-if2-blank-m.png">
                                @endif

                                {{-- PC용 메인이미지 --}}
                                @if (isset($main_image))
                                  <img src="/download/{{ $file_token.'_'.$main_image }}" alt="{{ $item->subject_ko }}">
                                @else
                                  <img src="/images/information/img-if2-blank.png" alt="{{ $item->subject_ko }}">
                                @endif

                              @endif

                            @endforeach

                          @endif

                        </picture>

                        <span class="badge">Certificate</span>
                        <em>{{ $item->subject_en }}</em>
                        <div class="agency">
                          <span>Hosted</span>
                          <span>{{ $item->agency_en }}</span>
                        </div>
                        <span class="date">{{ \Carbon\Carbon::parse($item->registed_at)->format('Y.m.d') }}</span>

                      </li>

                    @endforeach  

                  @endif

                </ul>
                <div class="btn-wrap">
                  <button type="button" class="btn btn-secondary more"><span>Click for more certificates</span></button>
                </div>
              </div>
            </div>
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
      $.depth1Index = 3
      $.depth2Index = 1

      let page = "{{ (isset($page))?$page: 1 }}";
      let gubun = "{{ $gubun }}";
      var items_more = "{{ $items_more }}";

      $(document).ready(function () {
        $.switchUI.init($.viewType)

        if (gubun == '01')
        {
          $('.js-tab').tab('active', 0)
        }
        else{
          $('.js-tab').tab('active', 1)
        }

        if (items_more == 0)
        {
          $("button.more").attr('disabled', true);
        }

        // 임시
        $('.btn.more').on('click', e => {
          load_more();
        })

        $('.js-dropdown .dropdown-list button').on('click', function () {
          let index = $(this).parent().index();
          getContentList(index);
        })

        $('.js-tab .tab-list button').on('click', function () {
          let index = $(this).index();
          getContentList(index);
        })

        function getContentList(index)
        {
          gubun = (index==0)?'01':'02';

          if (gubun == '01')
          {
            $('.js-tab').tab('active', 0);
          }
          else{
            $('.js-tab').tab('active', 1)
          }

          var params = {
            gubun: gubun
          };
          
          $(location).attr('href', "{{ url('api/award/getContentList?') }}"+jQuery.param(params) );
        }

        function load_more()
        {
          if ($("button.more").attr('disabled'))
          {
            return;
          }

          var params = {
            page: (page==1)?page++:page,
            gubun: gubun
          };

          $.ajax({
            url: "{{ url('/') }}" + "/api/award/loadmore?" + jQuery.param(params),
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
            if (gubun === '01') {
              $("#tab-award .list01").append(html);
            } else {
              $("#tab-cert .list01").append(html);
            }

          })
          .fail(function(jqXHR, ajaxOptions, thrownError)
          {
            // Vue.alert('No response from server');
          });
        }

      })
    })(window.jQuery)
  </script>
</body>
</html>
