<!-- Left Menu -->
<div class="left-menu">

    @php

        if( isset($menus) )
        {
            // dd($menus[$tab_no][$menu_no]);

            //선택된 인덱스를 활성화 한다.
            foreach($menus[$tab_no] as $it)
            {
                $it->current = false;
                $it->name = $it->menu_nm;

                if ($it->access_yn == 'Y')
                {
                    $it->href = url($it->url);
                }
                else
                {
                    $it->href = url('#');
                }
            }

            if(isset($menus[$tab_no][$menu_no]->href))
            {
                if ($menus[$tab_no][$menu_no]->href != "#")
                {
                    $menus[$tab_no][$menu_no]->current = true;
                }
            }

            $menus = $menus[$tab_no];

            // dd($menus);
        }

    @endphp

    <ul>

        @if ($menus != null)

            @foreach($menus as $menu)

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
</div>
<!-- // Left Menu -->
