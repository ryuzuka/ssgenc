@if(isset($text))
    <th scope="row">{!! $text !!}</th>
@endif

<td>
    <div class="file-box">
        <input type="text" id="{{ $id_name }}_file_nm" name="{{ $id_name }}_file_nm" value="{{ $file_nm }}" class="attach-text w375" readonly placeholder="파일첨부">
        <label for="{{ $id_name }}">파일찾기</label>
        @if(isset($multiple))
            @if($multiple == false)
                <input type="file" id="{{ $id_name }}" name="{{ $id_name }}" class="attach-file-muliple">
            @else
                <input multiple="multiple" type="file" id="{{ $id_name }}" name="{{ $id_name }}" class="attach-file-muliple">
            @endif
        @else
            <input multiple="multiple" type="file" id="{{ $id_name }}" name="{{ $id_name }}" class="attach-file-muliple">
        @endif
        <span class="text-info">@if(isset($file_desc)) {!! $file_desc !!} @endif</span>
        <div class="regist-box">
            <div class="regist-file">
                <span><a href="{{ (isset($file_path))?$file_path:'#' }}" download="{{ $file_nm }}">{{ $file_nm }}</a></span>
                <button type="button" class="delete" id="{{ $id_name }}_delete"><span class="blind">삭제</span></button>
            </div>
        </div>
    </div>
</td>
