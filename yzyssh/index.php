<?php
require "common.php";

if ($set['autokeywords'] == 1) {
    $word = get_word();
} else {
    $word = "迪迦奥特曼";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title><?php echo $set['title']; ?></title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="keywords" content="<?php echo $set['keywords']; ?>">
<meta name="description" content="<?php echo $set['desc']; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit"> 
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
<link href="./css/style.css" rel="stylesheet" >
<link rel="shortcut icon" href="./favicon.ico">
</head>
<body>
<div class="container">
	<div class="content">
		<!-- 内容 -->
		<div class="box">
			<div class="title">
				<h1><?php echo $set['title']; ?></h1>
			</div>
			<div class="search_container">
				<div class="search_content">
					<input type="text" name="longurl" id="key" placeholder="输入影视名称.支持全网搜索">
				</div>
				<button type="submit" id="ajax_key">搜索</button>
			</div>
			<div id="moda"></div>
		</div>
	</div>
</div>
<!-- JS输出 -->
<script src="./js/umqun.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>