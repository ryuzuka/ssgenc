<meta charset="UTF-8">

<title>{{ $title }}</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<meta name="description" content="">

<link rel="stylesheet" href="/css/common.css">
<link rel="stylesheet" href="/css/swiper.min.css">

<script type="text/javascript" src="/js/libs/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="/js/libs/lodash.min.js"></script>
<script type="text/javascript" src="/js/libs/moment.min.js"></script>
<script type="text/javascript" src="/js/libs/swiper.min.js"></script>
<script type="text/javascript" src="/js/libs/gsap.min.js"></script>

<script>
  let agent = navigator.userAgent.toLowerCase()
  if ( (navigator.appName == 'Netscape' && navigator.userAgent.search('Trident') != -1) || (agent.indexOf("msie") != -1) ) {
    window.location ='microsoft-edge:https://www.shinsegae-enc.com'
    setTimeout(function () {
      window.opener = 'self'
      window.open('', '_parent', '')
      window.close()
    }, 100)
  }
</script>

<script src="/js/app.js" defer></script>
<script src="/js/lang.js"></script>
<script src="/js/com_utils.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZCNBL9HDPZ"></script>
<script>
	window.dataLayer = window.dataLayer || []
	function gtag(){dataLayer.push(arguments)}
	gtag('js', new Date())
	gtag('config', 'G-ZCNBL9HDPZ')
</script>
