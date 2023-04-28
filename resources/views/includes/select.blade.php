<div class="select-box">

    @php

        //동일한 표현 7.0부터 지원 됨.
        // if( !isset($code_id) || ($code_id===null) )
        // if( !($code_id ?? false) )
        if ( !isset($code_id) )
        {
            $code_id = app('request')->input($id_name);
        }

    @endphp

    <select id="{{ $id_name }}" name="{{ $id_name }}">

        @if( isset($items) )

            @foreach($items as $item)

                @if (trim($item->code_id) == $code_id)
                    <option value="{{ trim($item->code_id) }}" selected>{{ $item->code_nm }}</option>
                @else
                    <option value="{{ trim($item->code_id) }}">{{ $item->code_nm }}</option>
                @endif

            @endforeach

        @endif

    </select>
    
</div>
