<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.en.inc.meta',[
  "title" => "SHINSEGAE E&C : Corporate Social Responsibility"
  ])
</head>

@php

  if(!isset($page))
  {
    $page = 1;
  }

@endphp
<body class="en">
  <div class="wrap">
    @include('main.en.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="sub-content c-cr03 section header-black">
        <div class="inner">
          <div class="sub-header">
            <em class="sg-text-06">Corporate Social Responsibility</em>
            <p class="sg-text-03">As a local community member, Shinsegae E&C demonstrates a sharing and win-win spirit by leveraging the essence of our business when <span>seeking collaboration with other companies, supporting the underprivileged, and conducting environmental campaigns.</span></p>
            <p class="sg-text-09">In particular, we are offering our employees to voluntarily participate in the cafeteria volunteer activity while also encouraging our employees to participate in CSR activities with their families.</p>
          </div>
          <div class="flex-box">
            <div class="inner-cell">
              <h3 class="sg-text-04">CSR in 2022<br>
                <span>KRW 500 Million</span></h3>
            </div>
            <div class="inner-cell type">
              <picture>
                <source media="(max-width: 1024px)" srcset="/images/en/csr/img-cr3-01-m.png">
                <img src="/images/en/csr/img-cr3-01.png" alt="">
              </picture>
            </div>
          </div>
          <h3 class="sg-text-04">Key CSR activities</h3>
          <ul id="item_list" class="list01">

            @if (isset($items))

              @foreach($items as $item)

                <li>
                  <a href="{{ url('social-contribution-dtl?id='.$item->id) }}">
                    <picture>
                      <source media="(max-width:1024px)" srcset="{{ (isset($item->thumb_mo_image))?$item->thumb_mo_image:'' }}">
                      <img src="{{ (isset($item->thumb_image))?$item->thumb_image:'' }}" alt="{{ $item->subject_en }}">
                    </picture>
                    <em class="title">{{ $item->subject_en }}</em>
                    <span class="text">{{ $item->contrib_nm }}</span>
                  </a>
                </li>

              @endforeach

            @endif

          </ul>
          <div class="btn-wrap">
            <button type="button" class="btn btn-secondary more"><span>Learn more CSR activities</span></button>
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

  <script>
    ($ => {
      $.depth1Index = 1
      $.depth2Index = 0
      var $content = $('.contents.section');
      var $tab = $(".js-tab");
      var $dropdown = $(".js-dropdown");

      var page = "{{ $page }}";
      var items_more = "{{ $items_more }}";

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
        // window.SSG.Project.init();

        $(".btn-wrap").on('click', function(e){
          e.preventDefault();

          // Vue.alert('more');
          load_more();
        });
      });

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
          url: "{{ url('/') }}" + "/api/csr/loadmore?" + jQuery.param(params),
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
