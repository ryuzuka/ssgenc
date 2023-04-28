<!-- Left Menu -->
<div class="left-menu">

    @php

        $menus_left = 
        [
            //프로젝트 관리
            [
                [
                    'name' => '프로젝트 관리',
                    'href' => url('project'),
                    'current' => false
                ],
                [
                    'name' => '프로젝트 실적 관리',
                    'href' => url('projectlist'),
                    'current' => false
                ]
            ],

            //게시판 관리
            [
                [
                    'name' => '이사회 진행사항 관리',
                    'href' => url('meeting'),
                    'current' => false
                ],
                [
                    'name' => '위원회 운영내역 관리',
                    'href' => url('committee'),
                    'current' => false
                ],
                [
                    'name' => '뉴스&공지 / 영상관리',
                    'href' => url('notice'),
                    'current' => false
                ],
                [
                    'name' => '실적보고서 관리',
                    'href' => url('report'),
                    'current' => false
                ],
                [
                    'name' => '공시 관리',
                    'href' => url('posting'),
                    'current' => false
                ],
                [
                    'name' => 'ESG 공시 관리',
                    'href' => url('esgposting'),
                    'current' => false
                ],
                [
                    'name' => '수상실적 관리',
                    'href' => url('award'),
                    'current' => false
                ],
                [
                    'name' => '사회공헌 관리',
                    'href' => url('csr'),
                    'current' => false
                ],
                [
                    'name' => '직무소개 관리',
                    'href' => url('duty'),
                    'current' => false
                ],
                [
                    'name' => '고객상담 관리',
                    'href' => url('custom?type=01'),
                    'current' => false
                ],
                [
                    'name' => '제보 관리',
                    'href' => url('custom?type=02'),
                    'current' => false
                ],
            ],

            //사이트 관리
            [
                [
                    'name' => '메인 키비주얼/메세지 관리',
                    'href' => url('message'),
                    'current' => false
                ],
                [
                    'name' => '정보 관리',
                    'href' => url('information'),
                    'current' => false
                ],
                [
                    'name' => '메인 팝업 관리',
                    'href' => url('mainpopup'),
                    'current' => false
                ],
                [
                    'name' => '메인 공지 관리',
                    'href' => url('mainnotice'),
                    'current' => false
                ],

            ],

            //관리자 관리
            [
                [
                    'name' => '관리자 관리',
                    'href' => url('user'),
                    'current' => false
                ],
                [
                    'name' => '로그 관리',
                    'href' => url('loginmenu'),
                    'current' => false
                ],
                [
                    'name' => '부서 관리',
                    'href' => '#',
                    'current' => false
                ],
                [
                    'name' => '메뉴 관리',
                    'href' => url('menu'),
                    'current' => false
                ],
                // [
                //     'name' => '권한 관리',
                //     'href' => '#',
                //     'current' => false
                // ],
            ],
        ];

        if( isset($menus_left) )
        {
            $menus_left[$tab_no][$menu_no]['current'] = true;

            if (isset($href))
            {
                $menus_left[$tab_no][$menu_no]['href'] = $href;
            }

            //배열을 객체로 전환하는 방법.
            $menus_left = json_decode(json_encode($menus_left[$tab_no]));
        }

    @endphp

    <ul>

        @if ($menus_left != null)

            @foreach($menus_left as $menu)

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
