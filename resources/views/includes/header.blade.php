<!DOCTYPE html>
<html lang={{ $lang }}>
    <head>

        <meta charset="UTF-8">
        <title>{{ $title }}</title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/admin.css">
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/app.js" defer></script>
        <script src="js/lang.js"></script>    
        <script src="js/com_utils.js"></script>
        {{-- 필요한 스트립트가 추가되어 출력 됨 --}}
        @stack('scripts')

    </head>
    <body class="admin">
