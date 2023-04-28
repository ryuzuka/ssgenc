<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 직무소개"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents section header-black">
    <div class="sub-content i-if05 section header-black">
      <div class="inner">
        <div class="sub-header">
          <h2 class="sg-text-06">직무소개</h2>
          <p class="sg-text-03">신세계건설의 다양한 직무소개와 현직자 선배들의 <br class="pc-only">생생한 잡스토리를 전해 드립니다.</p>
        </div>
        <div class="flex-box width-type vertical">
          <div class="inner-cell">
            <h3 class="sg-text-04 ">신세계 건설 직무소개</h3>
          </div>
          <div class="inner-cell">
            <p class="sg-text-09">신세계 건설의 다양한 직무를 소개합니다.</p>
          </div>
        </div>
        <ul id="item_list" class="list05">

          @if( isset($items) )

            @foreach($items as $item)

              <li>
                <a href="{{ url('job-introduction-dtl?id='.$item->id) }}">
                  <picture>

                    @if(isset($items_file))

                      @foreach($items_file as $it)

                        @if ($item->attach_id == $it['attach_id'])

                          @php

                            $file_token = $it['file_token'];

                            $thumb_image = null;
                            $main_mo_image = null;

                            foreach($it['files'] as $file)
                            {
                              switch($file['file_view_id'])
                              {
                                case '#thumb_image'     : $thumb_image      = $file['file_nm']; break;
                                case '#thumb_mo_image'  : $thumb_mo_image   = $file['file_nm']; break;
                              }
                            }

                          @endphp

                          <source media="(max-width: 1024px)" srcset="/download/{{ $file_token.'_'.$thumb_mo_image }}">
                          <img src="/download/{{ $file_token.'_'.$thumb_image }}" alt="">

                        @endif

                      @endforeach

                    @endif

                  </picture>

                  <em>{{ $item->duty_nm }}</em>
                  <span>{{ $item->part_nm }}</span>
                </a>
              </li>

            @endforeach

          @endif

        </ul>
        <div class="btn-wrap">
          <button type="button" class="btn btn-secondary more"><span>직무소개 더보기</span></button>
        </div>
      </div>
    </div>
    <!--: End #contents -->

    @include('main.ko.inc.footer')
  </div>
</div>

  <!-- common, plugins, app -->
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/plugins.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <!-- components -->
  <script>
    ($ => {
      $.depth1Index = 3
      $.depth2Index = 4
      let page = "{{ (isset($page))?$page: 1 }}";
      let items_more = "{{ $items_more }}";

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
        let $list = $('.contents.section .list05 > li')
        let list = []
        let listIndex = 0

        $list.each(function (index) {
          list[index] = $(this)
        })

        $('.btn.more').on('click', e => {
          load_more();
        })

        function load_more()
        {
          if ($("button.more").attr('disabled'))
          {
            return;
          }

          var params = {
            page: (page==1)?page++:page
          };

          $.ajax({
            url: "{{ url('/') }}" + "/api/duty/loadmore?" + jQuery.param(params),
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

      })
    })(window.jQuery)
  </script>
</body>
</html>
