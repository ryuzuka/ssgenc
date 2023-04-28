<div class="layer project-modal" role="dialog" aria-modal="true">
    <div class="layer-wrap full">
        <button class="close"><span class="blind">Close</span></button>
        <div class="layer-content project">

            @php

                $biz_area_class = null;

                switch($biz_area)
                {
                    case '02': $biz_area_class = 'popup-top'; break;
                    case '03': $biz_area_class = 'popup-top type01'; break;
                    case '04': $biz_area_class = 'popup-top type02'; break;
                    case '05': $biz_area_class = 'popup-top type03'; break;
                }

            @endphp

            <div class="{{ $biz_area_class }}">
                <div class="text-box">
                    <div class="cell">
                        <em>{!! $title_1 !!}</em>
                        <span class="total">{!! $title_2 !!}</span>
                    </div>

                    @if (isset($title_3) && isset($title_4))

                        <div class="cell">
                            <em>{!! $title_3 !!}</em>
                            <span class="total">{!! $title_4 !!}</span>
                        </div>

                    @endif

                </div>
            </div>

            <table class="tbl-list">
                <caption><span class="blind">Project information</span></caption>
                <colgroup>
                <col class="width01">
                <col class="width02">
                <col class="width03">
                <col class="width04 pc-only">
                <col class="width05 pc-only">
                </colgroup>
                <thead>
                    <tr>
                    
                        <th scope="col">Type</th>
                        <th scope="col">Project Name</th>
                        <th scope="col" class="pc-only">Project Address</th>
                        <th scope="col" class="pc-only">Size/Total Area</th>
                        <th scope="col">Duration</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <div class="paging js-paging">
                <button type="button" class="paging-first" disabled><span class="blind">first</span></button>
                <button type="button" class="paging-prev" disabled><span class="blind">prev</span></button>
                <div class="paging-list">
                </div>
                <button type="button" class="paging-next"><span class="blind">next</span></button>
                <button type="button" class="paging-last"><span class="blind">last</span></button>
            </div>            

        </div>
    </div>
</div>