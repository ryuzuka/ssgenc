<!DOCTYPE html>
<html lang="ko">
<head>
  @include('main.ko.inc.meta',[
  "title" => "신세계 건설 : 실적보고서"
  ])
</head>

<body>
<div class="wrap">
  @include('main.ko.inc.header')

  <!--: Start #contents -->
  <div class="contents">
    <div class="sub-content i-if04 section header-black">
      <div class="inner">
        <h2 class="sg-text-06">실적보고서</h2>
        <h3 class="sg-text-04">사업보고서</h3>
        <table class="tbl-list">
          <caption><span class="blind">사업보고서 정보</span></caption>
          <colgroup>
            <col style="width:10%;">
            <col style="width:58%;">
            <col style="width:16%;">
            <col style="width:16%;">
          </colgroup>
          <thead>
          <tr>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">자료</th>
            <th scope="col">게시일</th>
          </tr>
          </thead>
          <tbody>

            @if (isset($items))

              @foreach($items as $item)

              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->subject }}</td>
                @if($item->file_path=='')
                  <td></td>
                @else
                  <td><a href="{{ $item->file_path }}" class="report" download><span class="blind">보고서 다운로드</span></a></td>
                @endif
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y.m.d') }}</td>
              </tr>

              @endforeach

            @endif

          </tbody>
        </table>

        @include('includes.paginate', ['paginator' => $items])

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
      // $.depth1Index = 3
      // $.depth2Index = 3

      $(document).ready(function () {
        // let $page = $('table tbody')
        // let listLength = $page.find('tr').length

        // // paging - 사업보고서
        // $('.paging.js-paging').paging({
        //   offset: 0,            // 현재 페이지 (default: 0)
        //   limit: 5,             // 한 화면에 보여지는 리스트(게시글) 갯수
        //   total: listLength     // 전체 리스트 갯수
        // }).on('change', e => {
        //   $page.hide()
        //   $page.eq(e.offset).show()
        //   // console.log('paging1, offset: ' + e.offset + ', total: ' + e.total)
        // })
      })
    })(window.jQuery)
  </script>
</body>
</html>
