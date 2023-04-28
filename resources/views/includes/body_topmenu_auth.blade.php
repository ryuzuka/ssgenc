<!-- Top Menu -->
<ul class="top-menu">

    @php

        $menus_top = null;

        //1. 최초 이동 메뉴 결정시 권한이 없을 경우, 초기 이동 메뉴 결정
        //      => 현재 최초 진입시 무조건 프로젝트로 간다(오류).
        //2. 메뉴 이동시 탑 메뉴 이동 초기화.

        $menus_top = [
            [
                'name' => '프로젝트 관리',
                'href' => 'project',
                'access_yn' => "N",
                'current' => false
            ],
            [
                'name' => '게시판 관리',
                'href' => 'meeting',
                'access_yn' => "N",
                'current' => false
            ],
            [
                'name' => '사이트 관리',
                'href' => 'message',
                'access_yn' => "N",
                'current' => false
            ],
            [
                'name' => '관리자 관리',
                'href' => 'user',
                'access_yn' => "N",
                'current' => false
            ],
        ];

        if( isset($menus) )
        {
            $menus_tmp = [
                $menus[0][0],
                $menus[1][0],
                $menus[2][0],
                $menus[3][0]
            ];

            $i = 0;

            foreach($menus_tmp as $it)
            {
                foreach($menus[$i] as $menu)
                {
                    if ($menu->category == $it->category && $menu->access_yn == 'Y')
                    {
                        $menus_top[$i]['href'] = $menu->url;
                        $menus_top[$i]['access_yn'] = $menu->access_yn;
                        break;
                    }
                }

                $i++;
            }

            if ($menus_top[$tab_no]['href'] != "#")
            {
                $menus_top[$tab_no]['current'] = true;
            }

            // dd($menus_top);
            $menus_top = json_decode(json_encode($menus_top));
        }

    @endphp

    @if ($menus_top != null)

        @foreach($menus_top as $menu)

            @if ($menu->current == true)
                <li class="current"><a href={{ $menu->href }}>{{ $menu->name }}</a></li>
            @else
                @if ($menu->access_yn == "N")
                    <li><a href="#" style="color:#D5DBDB">{{ $menu->name }}</a></li>
                @else
                    <li><a href={{ $menu->href }}>{{ $menu->name }}</a></li>
                @endif
            @endif

        @endforeach

    @endif

</ul>
<!-- // Top Menu -->
