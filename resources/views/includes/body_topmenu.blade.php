<!-- Top Menu -->
<ul class="top-menu">

    @php

        $menus_top = null;

        $menus_top = [
            [
                'name' => '프로젝트 관리',
                'href' => url('/project'),
                'current' => false
            ],
            [
                'name' => '게시판 관리',
                'href' => url('/meeting'),
                'current' => false
            ],
            [
                'name' => '사이트 관리',
                'href' => url('/message'),
                'current' => false
            ],
            [
                'name' => '관리자 관리',
                'href' => url('/user'),
                'current' => false
            ],
        ];

        //선택된 인덱스를 활성화 한다.
        $menus_top[$tab_no]['current'] = true;

        if (isset($href))
        {
            $menus_top[$tab_no]['href'] = $href;
        }

        //배열을 객체로 전환하는 방법.
        $menus_top = json_decode(json_encode($menus_top));

    @endphp

    @if ($menus_top != null)

        @foreach($menus_top as $menu)

            @if ($menu->current == true)
                <li class="current"><a href={{ $menu->href }}>{{ $menu->name }}</a></li>
            @else
                @if ($menu->href == "#")
                    <li><a href={{ $menu->href }} style="color:#D5DBDB">{{ $menu->name }}</a></li>
                @else
                    <li><a href={{ $menu->href }}>{{ $menu->name }}</a></li>
                @endif
            @endif

        @endforeach

    @endif

</ul>
<!-- // Top Menu -->
