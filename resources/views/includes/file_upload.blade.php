@if(isset($text))
    <th scope="row" @if(isset($rowspan)) rowspan="{{ $rowspan }}" @endif>{!! $text !!}</th>
@endif

<td>
    <div class="file-box">
        <input type="text" class="attach-text w375" readonly placeholder="파일첨부">
        <label for="{{ $id_name }}">파일찾기</label>
        <input type="file" id="{{ $id_name }}" name="{{ $id_name }}" class="attach-file">
    </div>
    <div class="regist-box">
        <div class="regist-img">
            @if (isset($file_token))
                <img src="/download/{{ $file_token.'_'.$file_nm }}" />
            @else
                <img id="{{ $id_name }}_img" src="" />
            @endif
        </div>
        <span class="regist-info">@if(isset($file_desc)) {!! $file_desc !!} @endif</span>
        <div class="regist-file">
            <span>{{ $file_nm }}</span>
            <button type="button" class="delete" id="{{ $id_name }}_delete"><span class="blind">삭제</span></button>
        </div>
    </div>
    <div class="regist-text">
        <div class="area">
            <span class="text">대체 텍스트</span>
            <input id="{{ $id_name }}_text" type="text" class="w375">
        </div> 
    </div>
</td>
