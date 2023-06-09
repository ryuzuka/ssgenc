<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>이메일</title>
</head>

<body style="margin:0;padding:0;background-color:#fdfdfd;">
<table cellpadding="0" cellspacing="0" align="center" width="696" style="max-width:696px;width:100%;margin:0 auto;font-family:'Malgun Gothic', Dotum,'돋움',Helvetica,'Apple SD Gothic Neo',sans-serif;color:#000;border:1px solid #000;">
  <!--header-->
  <thead>
  <tr>
    <th style="padding:15px 0 15px 20px;background:#202020;font-size:18px;font-weight:normal;color:#fff;line-height:30px;letter-spacing:-.18px;text-align:left;"
    > @if ($type=='01')
        문의하기
      @else
        제보하기
      @endif
    </th>
  </tr>
  </thead>
  <!--//header-->
  <tbody>
  <tr>
    <td style="padding:40px 20px 16px;">
      <table cellpadding="0" cellspacing="0" style="width:100%;font-family:'Malgun Gothic', Dotum,'돋움',Helvetica,'Apple SD Gothic Neo',sans-serif">
        <tbody>
        <!-- title -->
        <tr>
          <td style="padding-top:45px;padding-bottom:12px;font-size:16px;color:#787878;line-height:27px;">

            [{{ $category }}]

            @if ($type=='01')
              1:1 문의가 접수되었습니다
            @else
              신문고 제보가 접수되었습니다.
            @endif
          </td>
        </tr>
        <tr>
          <td style="width:100%;padding:15px 0 0 8px;border-top:4px solid #da2128;font-weight:bold;font-family:'Malgun Gothic', Dotum,'돋움',Helvetica,'Apple SD Gothic Neo',sans-serif;font-size:16px;color:#000;line-height:27px;">
            @if ($type=='01') 문의번호는 @else 제보번호는 @endif
            <span style="color:#da2128">{{ $receipt_id }}</span> 입니다.
          </td>
        </tr>
        <tr>
          <td style="padding:16px 0 0 8px;font-size:14px;color:#787878;line-height:23px;letter-spacing:-.7px;">
            @if ($type=='01') 문의내용이 @else 제보내용이 @endif 접수되었습니다. 홈페이지를 확인해 주세요.<br>
              24시간內 답변 바랍니다.
          </td>
        </tr>
        <tr>
          <td style="padding-top:100px;text-align:center;">
            <a href="{{ $url_result }}" style="display:inline-block;margin:10px 3px 0 0;padding:10px 34px;background:#202020;border-radius:100px;font-size:18px;font-weight:bold;color:#fff;letter-spacing:-.18px;text-decoration:none;"
            >
            확인하기
          </a>
          </td>
        </tr>
        <tr>
          <td style="padding-top:94px;font-size:12px;color:#787878;line-height:23px;letter-spacing:-.6px;">본 메일은 발신전용 메일입니다.<br>
            ⓒSINSEGAE E&C ALL RIGHTS RESERVED.</td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>
  </tbody>
</table>
</body>
</html>
