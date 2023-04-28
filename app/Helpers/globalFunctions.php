<?php

//-------------------------------------------------------------
//composer.json에서 자동로딩 되도록 설정 됨.
//로딩 우선순위가 높아야하는 공통함수는 무조건 여기에 넣어야 함.
//-------------------------------------------------------------

//-------------------------------------------------------------
//url에서 domain 정보를 추출한다.
if (! function_exists('getDomain')) {

    function getDomain($url)
    {
        $urls = explode("//", $url ?? '');
        if(count($urls)>1)
        {
            return $urls[1];
        }

        return null;
    }
}

//'response_json' 함수명으로 직접 호출 함.
if(! function_exists('response_json')) {
    function response_json($code, $message, $data="")
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }
}

if(! function_exists('response_ok')) {
    function response_ok($message, $data="")
    {
        return response()->json([
            'code' => '0000',
            'message' => $message,
            'data' => $data
        ]);
    }
}

if(! function_exists('response_error')) {
    function response_error($code, $message, $data="")
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }
}

// php 7.2 에서 count(arg)에 arg가 null 이면 오류나는 문제 해결을 위해 사용
if(! function_exists('isNotNullCount')) {
    function notNullCount($countable)
    {
        if(isset($countable)) {
            if(is_object($countable) || is_array($countable)) {
                return count($countable);
            }
        }

        return 0;
    }
}

// 모바일 환경인지
if(! function_exists('isMobile')) {
    function isMobile()
    {
        return preg_match('/phone|samsung|lgtel|mobile|[^A]skt|nokia|blackberry|android|sony/i', request()->server('HTTP_USER_AGENT'));
    }
}

if(! function_exists('ver_asset')) {
    function ver_asset($path)
    {
        return asset($path). '?ver='. config('laon.VER');
    }
}

// 관리자 데모일 경우 데이터를 *로 표시
if (! function_exists('invisible')) {
    function invisible($data)
    {
        $result = '';
        for($i=0; $i<mb_strlen($data, 'UTF-8'); $i++) {
            $result .= '*';
        }
        return $result;
    }
}

if (! function_exists('viewDefault')) {
    function viewDefault($path, $params=[])
    {
        $path = 'themes.'. $path;
        $pathArr = explode('.', $path);
        $pathArr[1] = 'default';
        $defaultPath = implode('.', $pathArr);
        return view()->exists($path) ? view($path, $params) : view($defaultPath, $params);
    }
}

if (! function_exists('alert')) {
    function alert($message)
    {
        return redirect(route('message'))->with('message', $message);
    }
}

if (! function_exists('alertClose')) {
    function alertClose($message)
    {
        return redirect(route('message'))->with('message', $message)->with('popup', 1);
    }
}

if (! function_exists('alertRedirect')) {
    function alertRedirect($message, $redirect="/")
    {
        return redirect(route('message'))->with('message', $message)->with('redirect', $redirect);
    }
}

if (! function_exists('alertErrorWithInput')) {
    function alertErrorWithInput($message, $key)
    {
        return redirect()->back()->withErrors([$key => $message])->withInput();
    }
}

if (! function_exists('confirm')) {
    function confirm($message, $redirect)
    {
        return redirect(route('confirm'))->with('message', $message)->with('redirect', $redirect);
    }
}

if (! function_exists('getUser')) {
    // 관리자에선 id, 커뮤니티에선 id_hashkey가 넘어오기 때문에 구별해서 user를 구해준다.
    function getUser($id)
    {
        $user = null;

        if(mb_strlen($id, 'utf-8') > 10) {  // 커뮤니티 쪽에서 들어올 때 user의 id가 아닌 id_hashKey가 넘어온다.
            $user = App\Models\User::where('id_hashkey', $id)->first();
        } else {
            $user = App\Models\User::find($id);
        }

        return $user ? : new App\Models\User();
    }
}

if (! function_exists('convertText')) {
    // Text 형식으로 변환
    function convertText($str, $html=0, $restore=false)
    {
        $source[] = "<";
        $source[] = ">";
        $source[] = "\"";
        $source[] = "\'";

        $target[] = "&lt;";
        $target[] = "&gt;";
        $target[] = "&#034;";
        $target[] = "&#039;";

        if($restore) {
            $str = str_replace($target, $source, $str);
        }

        // TEXT 출력일 경우 &amp; &nbsp; 등의 코드를 정상으로 출력해 주기 위함
        if ($html == 0) {
            $str = htmlSymbol($str);
        }

        if ($html) {
            $source[] = "\n";
            $target[] = "<br>";
        }

        return str_replace($source, $target, $str);
    }
}

if (! function_exists('htmlSymbol')) {
    function htmlSymbol($str)
    {
        return preg_replace("/\&([a-z0-9]{1,20}|\#[0-9]{0,3});/i", "&#038;\\1;", $str);
    }
}

if (! function_exists('urlAutoLink')) {
    function urlAutoLink($str)
    {
        $target = cache("config.board")->linkTarget;

        $str = str_replace(array("&lt;", "&gt;", "&amp;", "&quot;", "&nbsp;", "&#039;"), array("\t_lt_\t", "\t_gt_\t", "&", "\"", "\t_nbsp_\t", "'"), $str);
        $str = preg_replace("/([^(href=\"?'?)|(src=\"?'?)]|\(|^)((http|https|ftp|telnet|news|mms):\/\/[a-zA-Z0-9\.-]+\.[가-힣\xA1-\xFEa-zA-Z0-9\.:&#!=_\?\/~\+%@;\-\|\,\(\)]+)/i", "\\1<a href=\"\\2\" target=\"$target\" rel=\"nofollow\">\\2</a>", $str);
        $str = preg_replace("/(^|[\"'\s(])?(www\.[^\"'\s()<]+)/i", "\\1<a href=\"http://\\2\" target=\"$target\" rel=\"nofollow\">\\2</a>", $str);
        $str = preg_replace("/[0-9a-z_-]+@[a-z0-9._-]{4,}/i", "<a href=\"mailto:\\0\">\\0</a>", $str);
        $str = str_replace(array("\t_nbsp_\t", "\t_lt_\t", "\t_gt_\t", "'"), array("&nbsp;", "&lt;", "&gt;", "&#039;"), $str);

        return $str;
    }
}

if (! function_exists('cutString')) {
    // 문자열 자리수로 자르기(charset = 'utf-8')
    function cutString($str, $len, $suffix="…")
    {
        $arr_str = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
        $strLength = mb_strlen($str, 'UTF-8');

        if ($strLength >= $len) {
            $str = mb_substr($str, 0, $len, 'UTF-8');

            return $str . ($strLength > $len ? $suffix : '');
        } else {
            return $str;
        }
    }
}

if (! function_exists('searchKeyword')) {
    function searchKeyword($keyword, $subject)
    {
        // 문자앞에 \ 를 붙입니다.
        $src = array('/', '|');
        $dst = array('\/', '\|');

        if( !is_array($keyword) ) {
            if (!trim($keyword)) return $subject;

            // 검색어 전체를 공란으로 나눈다
            $s = explode(' ', $keyword);
        } else {
            $s = $keyword;
        }

        // "/(검색1|검색2)/i" 와 같은 패턴을 만듬
        $pattern = '';
        $bar = '';
        for ($m=0; $m<notNullCount($s); $m++) {
            if (trim($s[$m]) == '') continue;
            $tmp_str = quotemeta($s[$m]);
            $tmp_str = str_replace($src, $dst, $tmp_str);
            $pattern .= $bar . $tmp_str . "(?![^<]*>)";
            $bar = "|";
        }

        // 지정된 검색 폰트의 색상, 배경색상으로 대체
        $replace = "<span class=\"sch_key\">\\1</span>";

        return preg_replace("/($pattern)/i", $replace, $subject);
    }
}

if (! function_exists('getSearchString')) {
    // 검색어 특수문자 제거
    function getSearchString($keyword)
    {
        $pattern = array();
        $pattern[] = '#\.*/+#';
        $pattern[] = '#\\\*#';
        $pattern[] = '#\.{2,}#';
        $pattern[] = '#[/\'\"%=*\#\(\)\|\+\&\!\$~\{\}\[\]`;:\?\^\,]+#';

        $replace = array();
        $replace[] = '';
        $replace[] = '';
        $replace[] = '.';
        $replace[] = '';

        return preg_replace($pattern, $replace, $keyword);
    }
}

if (! function_exists('checkIncorrectContent')) {
    // 올바르지 않은 코드가 글 내용에 다수 들어가 있는지 검사
    function checkIncorrectContent($request)
    {
        if (substr_count($request->content, '&#') > 50) {
            return false;
        }
        return true;
    }
}

if (! function_exists('checkAdminAboutNotice')) {
    // 관리자가 아닌데 공지사항을 남기려 하는 경우가 있는지 검사
    function checkAdminAboutNotice($request)
    {
        if ( !session()->get('admin') && $request->filled('notice') ) {
            return false;
        }
        return true;
    }
}

if (! function_exists('getFileSize')) {
    // 파일 사이즈 구하기
    function getFileSize($size)
    {
        if ($size >= 1048576) {
            $size = number_format($size/1048576, 1) . "M";
        } else if ($size >= 1024) {
            $size = number_format($size/1024, 1) . "K";
        } else {
            $size = number_format($size, 0) . "byte";
        }
        return $size;
    }
}

if (! function_exists('utf8Strcut')) {
    // UTF-8 문자열 자르기
    // 출처 : https://www.google.co.kr/search?q=utf8_strcut&aq=f&oq=utf8_strcut&aqs=chrome.0.57j0l3.826j0&sourceid=chrome&ie=UTF-8
    function utf8Strcut($str, $size, $suffix='...' )
    {
            $substr = substr( $str, 0, $size * 2 );
            $multiSize = preg_match_all( '/[\x80-\xff]/', $substr, $multiChars );

            if ( $multiSize > 0 )
                $size = $size + intval( $multiSize / 3 ) - 1;

            if ( strlen( $str ) > $size ) {
                $str = substr( $str, 0, $size );
                $str = preg_replace( '/(([\x80-\xff]{3})*?)([\x80-\xff]{0,2})$/', '$1', $str );
                $str .= $suffix;
            }

            return $str;
    }
}

if (! function_exists('deleteCache')) {
    // 게시판 캐시 삭제
    function deleteCache($base, $boardTableName)
    {
        $cacheName = $base. '-'. $boardTableName;
        cache()->forget($cacheName);
    }
}

if (! function_exists('hyphenHpNumber')) {
    // 휴대폰번호의 숫자만 취한 후 중간에 하이픈(-)을 넣는다.
    function hyphenHpNumber($hp)
    {
        $hp = preg_replace("/[^0-9]/", "", $hp);
        return preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $hp);
    }
}

if (! function_exists('cleanXssTags')) {
    // XSS 관련 태그 제거
    function cleanXssTags($str)
    {
        $str = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $str);

        return $str;
    }
}

if (! function_exists('getEmailAddress')) {
    // 이메일 주소 추출
    function getEmailAddress($email)
    {
        preg_match("/[0-9a-z._-]+@[a-z0-9._-]{4,}/i", $email, $matches);

        return notNullCount($matches) > 0 ? $matches[0] : '';
    }
}

if (! function_exists('subjectLength')) {
    // 글 제목 목록에서 설정값에 따라 자르기
    function subjectLength($subject, $length)
    {
        $result = $subject;
        if($subject && mb_strlen($subject, 'UTF-8') > $length) {
            $result = mb_substr($subject, 0, $length, 'UTF-8'). '...';
        }

        return $result;
    }
}

if (! function_exists('getIconFolderName')) {
    // 글 제목 목록에서 설정값에 따라 자르기
    function getIconFolderName($date)
    {
        $userCreated = new Carbon\Carbon($date);

        return $userCreated->format('Ym');
    }
}

if (! function_exists('getIconName')) {
    // 글 제목 목록에서 설정값에 따라 자르기
    function getIconName($id, $date)
    {
        return md5($id. $date);
    }
}
