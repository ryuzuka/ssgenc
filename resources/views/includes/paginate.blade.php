@if ( isset($paginator) && $paginator->hasPages() )

    <div class="paging">

        @php

            // config => maximum number of mobile links (a little bit inaccurate, but will be ok for now)
            $link_limit = Config::get('constants.PAGINATION.LINK_LIMIT');
            // dd($link_limit);
        @endphp

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button type="button" class="paging-first" disabled><span class="blind">@lang('pagination.first')</span></button>
            <button type="button" class="paging-prev" disabled><span class="blind">@lang('pagination.previous')</span></button>
        @else
            {{-- 버튼 선택시 위의 페이지로 이동 되도록--}}
            <button type="button" class="paging-first" onclick="window.location='{{ $paginator->url(1) }}'">
                <span class="blind">@lang('pagination.first')</span></button>
            <button type="button" class="paging-prev"  onclick="window.location='{{ $paginator->previousPageUrl() }}'">
                <span class="blind">@lang('pagination.previous')</span></button>
        @endif

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)

            @php
                $half_total_links = floor($link_limit / 2);
                $from = $paginator->currentPage() - $half_total_links;
                $to = $paginator->currentPage() + $half_total_links;
                if ($paginator->currentPage() < $half_total_links)
                {
                    $to += $half_total_links - $paginator->currentPage();
                }
                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links)
                {
                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                }
            @endphp

            @if ($from < $i && $i < $to)

                @if ($paginator->currentPage() == $i)
                    <a href="#" class="active" aria-current="page">{{ $i }}</a>
                @else
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                @endif
        
            @endif
    

        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button type="button" class="paging-next" onclick="window.location='{{ $paginator->nextPageUrl() }}'">
                <span class="blind">@lang('pagination.next')</span></button>
            <button type="button" class="paging-last" onclick="window.location='{{ $paginator->url($paginator->lastPage()) }}'">
                <span class="blind">@lang('pagination.last')</span></button>
        @else
            <button type="button" class="paging-next" disabled><span class="blind">@lang('pagination.next')</span></button>
            <button type="button" class="paging-last" disabled><span class="blind">@lang('pagination.last')</span></button>
        @endif

    </div>

@endif