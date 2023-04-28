@if( isset($items) )

    @php

        $skip=0;

        //동일한 표현 7.0부터 지원 됨.
        // if( !isset($code_id) || ($code_id===null) )
        // if( !($code_id ?? false) )
        if ( !isset($code_id) )
        {
            $code_id = app('request')->input($id_name);
        }

    @endphp

    @foreach($items as $item)

        {{-- view 속성이 'Y' 인것만 표시 --}}
        @if ($item->view == 'Y')

            <div class="radio-box">

                @if ( isset($code_id) )

                    @if( $code_id == trim($item->code_id) )
                        <input id="{{ $id_name }}_{{ trim($item->code_id) }}" value="{{ trim($item->code_id) }}" type="radio" name="{{ $id_name }}" checked>
                    @else
                        <input id="{{ $id_name }}_{{ trim($item->code_id) }}" value="{{ trim($item->code_id) }}" type="radio" name="{{ $id_name }}">
                    @endif

                @else

                    @if($loop->index == $skip)
                        <input id="{{ $id_name }}_{{ trim($item->code_id) }}" value="{{ trim($item->code_id) }}" type="radio" name="{{ $id_name }}" checked>
                    @else
                        <input id="{{ $id_name }}_{{ trim($item->code_id) }}" value="{{ trim($item->code_id) }}" type="radio" name="{{ $id_name }}">
                    @endif

                @endif
                
                <label for="{{ $id_name }}_{{ trim($item->code_id) }}">{{ $item->code_nm }}
                </label>

            </div>

        @else

            @php
                $skip++;
            @endphp

        @endif

    @endforeach

@endif

