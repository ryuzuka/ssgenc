<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 사회공헌"
  ])
</head>

@php

  if(!isset($page))
  {
    $page = 1;
  }

@endphp

<body>
  <div class="wrap">
    @include('main.ko.inc.header')

    <!--: Start #contents -->
    <div class="contents">
      <div class="sub-content c-cr03 section header-black">
        <div class="inner">
          <div class="sub-header">
            <em class="sg-text-06">사회공헌</em>
            <p class="sg-text-03">신세계 건설은 업의 본질을 반영한 <br class="pc-only"><span>비즈니스 상생과 취약계층 지원 및 환경보호 캠페인</span>을 중심으로 <br class="pc-only">지역사회의 일원으로서 나눔과 상생의 정신을 펼치고 있습니다.</p>
            <p class="sg-text-09">특히, 카페테리아 봉사활동을 통해 임직원이 자율적으로 선택해서 참여할 수 있는 기회를 제공하고 있으며, <br class="pc-only">임직원 본인 외에도 가족과 함께할 수 있는 참여형 활동 또한 장려하고 있습니다.</p>
          </div>
          <div class="flex-box">
            <div class="inner-cell">
              <h3 class="sg-text-04">2022년 사회공헌 <br class="pc-only"><span>500백만</span></h3>
            </div>
            <div class="inner-cell type">
              <picture>
                <source media="(max-width: 1024px)" srcset="/images/csr/img-cr3-01-m.png">
                <img src="/images/csr/img-cr3-01.png" alt="희망배달캠페인 31%, 취약계층 지원 34%, 지역사회 연계 21%, 기타 14%">
              </picture>
            </div>
          </div>
          <h3 class="sg-text-04">주요 사회공헌활동 소개</h3>
          <ul id="item_list" class="list01">

            @if (isset($items))

              @foreach($items as $item)

                <li>
                  <a href="{{ url('social-contribution-dtl?id='.$item->id) }}">
                    <picture>
                      <source media="(max-width:1024px)" srcset="{{ (isset($item->thumb_mo_image))?$item->thumb_mo_image:'' }}">
                      <img src="{{ (isset($item->thumb_image))?$item->thumb_image:'' }}" alt="{{ $item->subject_ko }}">
                    </picture>
                    <em class="title">{{ $item->subject_ko }}</em>
                    <span class="text">{{ $item->contrib_nm }}</span>
                  </a>
                </li>

              @endforeach

            @endif

          </ul>
          <div class="btn-wrap">
            <button type="button" class="btn btn-secondary more"><span>사회공헌활동 더보기</span></button>
          </div>
        </div>
      </div>
    </div>
    <!--: End #contents -->

    @include('main.ko.inc.footer')
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
