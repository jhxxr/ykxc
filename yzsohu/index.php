<?php

require "./data/index.php";
$data = data(array("act" => "index"));

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta name="referrer" content="no-referrer">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<title>主页</title>
<meta name="keywords" content="演示网站主页">
<meta name="description" content="这是一个演示网站的主页">
<link rel="stylesheet" type="text/css" href="./static_sh/css/jquery.mobile.min.css">
<link rel="stylesheet" type="text/css" href="./static_sh/css/common.css">
</head>

<body class="body">

<div class="header">
	<a class="logo" href="./" style="background-image:url(./static_sh/images/logo.png)"></a>
	<div class="search">
		<input type="text" placeholder="输入你想看的" id="search" />
		<a id="searchDo"></a>
	</div>
	<div class="navigate">
		<a href="./" class="current">精选</a>
		<a href="./list/dianying/">电影</a>
		<a href="./list/dianshi/">电视剧</a>
		<a href="./list/zongyi/">综艺</a>
		<a href="./list/dongman/">动漫</a>
	</div>
</div>

<span class="clear"></span>

<div class="s-slider">
	<ul id="bannerList">
		<?php foreach($data['banner'] as $v){ ?>
		<li><a href="./play/?vid=<?php echo urlencode($v['id'])?>"><i style="background-image:url(<?php echo $v['pic']?>)"></i><span><?php echo htmlspecialchars($v['title'])?></span></a></li>
		<?php } ?>
	</ul>
	<ol></ol>
	<div style="display:none"><span class="now"></span><span>/</span><span class="total"></span></div>
</div>

<span class="clear" style="height:0.3rem"></span>

<div class="list">

	<h3 class="title">电视剧热播<img src="./static_sh/images/icon_title.png" /><a href="./list/dianshi/">更多</a></h3>

	<div class="items" id="dianshiList">
		<?php foreach($data['dianshi'] as $k => $v){ ?>
		<a href="./play/?vid=<?php echo urlencode($v['id'])?>"<?php echo $k >= 18 ? ' style="display:none"' : '' ?>>
			<i style="background-image:url(<?php echo $v['pic']?>)"><b><?php echo $v['hint']?></b></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>

	<div class="more one">
		<a class="switch-button" data-list-type="dianshi"><img src="./static_sh/images/more_2.png" />换一换</a>
	</div>
</div>

<div class="clear" style="height:0.1rem"></div>

<div class="list">

	<h3 class="title">电影热播<img src="./static_sh/images/icon_title.png" /><a href="./list/dianying/">更多</a></h3>

	<div class="items" id="dianyingList">
		<?php foreach($data['dianying'] as $k => $v){ ?>
		<a href="./play/?vid=<?php echo urlencode($v['id'])?>"<?php echo $k >= 18 ? ' style="display:none"' : '' ?>>
			<i style="background-image:url(<?php echo $v['pic']?>)"><b><?php echo $v['hint']?></b></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>

	<div class="more one">
		<a class="switch-button" data-list-type="dianying"><img src="./static_sh/images/more_2.png" />换一换</a>
	</div>
</div>

<div class="clear" style="height:0.1rem"></div>

<div class="list">

	<h3 class="title">综艺热播<img src="./static_sh/images/icon_title.png" /><a href="./list/zongyi/">更多</a></h3>

	<div class="items" id="zongyiList">
		<?php foreach($data['zongyi'] as $k => $v){ ?>
		<a href="./play/?vid=<?php echo urlencode($v['id'])?>"<?php echo $k >= 18 ? ' style="display:none"' : '' ?>>
			<i style="background-image:url(<?php echo $v['pic']?>)"><b><?php echo $v['hint']?></b></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>

	<div class="more one">
		<a class="switch-button" data-list-type="zongyi"><img src="./static_sh/images/more_2.png" />换一换</a>
	</div>
</div>

<div class="clear" style="height:0.1rem"></div>

<div class="list">

	<h3 class="title">动漫热播<img src="./static_sh/images/icon_title.png" /><a href="./list/dongman/">更多</a></h3>

	<div class="items" id="dongmanList">
		<?php foreach($data['dongman'] as $k => $v){ ?>
		<a href="./play/?vid=<?php echo urlencode($v['id'])?>"<?php echo $k >= 18 ? ' style="display:none"' : '' ?>>
			<i style="background-image:url(<?php echo $v['pic']?>)"><b><?php echo $v['hint']?></b></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>

	<div class="more one">
		<a class="switch-button" data-list-type="dongman"><img src="./static_sh/images/more_2.png" />换一换</a>
	</div>
</div>

<div class="clear" style="height:1rem"></div>

<div class="copyright">


<a class="scroll-to-top" id="scrollToTop"></a>

<script src="./static_sh/js/jquery.min.js"></script>
<script src="./static_sh/js/common.js"></script>
<script src="./static_sh/js/index.js"></script>
</body>
</html>