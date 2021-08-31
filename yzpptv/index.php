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
<link rel="stylesheet" type="text/css" href="./static_pp/css/jquery.mobile.min.css">
<link rel="stylesheet" type="text/css" href="./static_pp/css/common.css">
</head>

<body class="body">

<div class="header">
	<div class="navigate">
		<a href="./" class="current"><span>精选</span></a>
		<a href="./list/dianying/"><span>电影</span></a>
		<a href="./list/dianshi/" class="three"><span>电视剧</span></a>
		<a href="./list/zongyi/"><span>综艺</span></a>
		<a href="./list/dongman/"><span>动漫</span></a>
	</div>
	<div class="search">
		<input type="text" placeholder="输入你想看的" id="search" />
		<a id="searchDo"></a>
	</div>
</div>

<div class="s-slider">
	<ul id="bannerList">
		<?php foreach($data['banner'] as $v){ ?>
		<li><a href="./play/?vid=<?php echo urlencode($v['id'])?>"><i style="background-image:url(<?php echo $v['pic']?>)"></i><span><?php echo htmlspecialchars($v['title'])?></span></a></li>
		<?php } ?>
	</ul>
	<ol></ol>
	<div style="display:none"><span class="now"></span><span>/</span><span class="total"></span></div>
</div>

<div class="list">

	<h3 class="title"><span>热播电视剧</span><a href="./list/dianshi/">更多电视剧</a></h3>

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
		<a class="switch-button" data-list-type="dianshi">换一换<img src="./static_pp/images/more_2.png" /></a>
	</div>
</div>

<div class="clear" style="height:0.8rem"></div>

<div class="list">

	<h3 class="title h"><span>热播电影</span><a href="./list/dianying/">更多电影</a></h3>

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
		<a class="switch-button" data-list-type="dianying">换一换<img src="./static_pp/images/more_2.png" /></a>
	</div>
</div>

<div class="clear" style="height:0.8rem"></div>

<div class="list">

	<h3 class="title"><span>热播综艺</span><a href="./list/zongyi/">更多综艺</a></h3>

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
		<a class="switch-button" data-list-type="zongyi">换一换<img src="./static_pp/images/more_2.png" /></a>
	</div>
</div>

<div class="clear" style="height:0.8rem"></div>

<div class="list">

	<h3 class="title h"><span>热播动漫</span><a href="./list/dongman/">更多动漫</a></h3>

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
		<a class="switch-button" data-list-type="dongman">换一换<img src="./static_pp/images/more_2.png" /></a>
	</div>
</div>

<div class="clear" style="height:2rem"></div>

<div class="copyright">


<a class="scroll-to-top" id="scrollToTop"></a>

<script src="./static_pp/js/jquery.min.js"></script>
<script src="./static_pp/js/common.js"></script>
<script src="./static_pp/js/index.js"></script>
</body>
</html>