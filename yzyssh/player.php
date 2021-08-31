<?php
$url = @$_GET['play'];
if (!empty($url))
    $url = htmlentities($url, ENT_QUOTES);
else {
    header('Refresh:3,Url=../');
    echo '<h1>地址出错，将返回首页。。。</h1>';
    die;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>萌兔追剧</title>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="x5-fullscreen" content="true" />
<meta name="x5-page-mode" content="app"  />
<meta name="full-screen" content="yes" />
<meta name="browsermode" content="application" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<script src="./js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/player.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="./css/player.css" />
<link rel="shortcut icon" href="./favicon.ico">
</head>
<body>
    <script type="text/javascript">
	    var play = {
		    "auto":true,
		    "live":false,
		    "trys":"0",
			"seek":"0",
			"take":vfed.cookie.put("<?php echo $url; ?>"),
			"urls":"<?php echo $url; ?>",
			"jump":"",
			"pics":"./images/loading.gif"
		};
	</script>
    <div id="video" style="width:100%;height:100%"></div>
	<div class="play"></div>
	<div class="total">
	    <span class="peer"></span>
	    <span class="load"></span>
	    <span class="line"></span>
	</div>
    <link rel="stylesheet" type="text/css" href="./css/dplayer.css" />
	<script src="./js/p2p.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./js/hls.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./js/dplayer.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">vfed.player.eplayer(play.auto, play.live, play.trys, play.seek, play.take, play.urls, play.jump, play.pics);</script>
    <span style="display: none;"></span>
</body>
</html>