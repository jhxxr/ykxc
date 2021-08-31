<?php

if(!isset($_GET["keyword"])){ header("Location: ../../");die(); }
if(!isset($_GET["page"]) || !is_numeric($_GET["page"]) || $_GET["page"] < 1){ $_GET["page"] = 1; }
require "../../data/index.php";
$data = data(array("act" => "search","word" => $_GET["keyword"],"page" => $_GET["page"]));

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta name="referrer" content="no-referrer">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<title>搜索结果 - <?php echo htmlspecialchars($_GET['keyword'])?></title>
<meta name="keywords" content="演示网站关键词<?php echo htmlspecialchars($_GET['keyword'])?>搜索页">
<meta name="description" content="这是一个演示网站的关键词<?php echo htmlspecialchars($_GET['keyword'])?>搜索页">
<link rel="stylesheet" type="text/css" href="../../static_pp/css/jquery.mobile.min.css">
<link rel="stylesheet" type="text/css" href="../../static_pp/css/common.css">
</head>

<body class="body">

<div class="header">
	<div class="navigate">
		<a href="../../"><span>精选</span></a>
		<a href="../dianying/"><span>电影</span></a>
		<a href="../dianshi/" class="three"><span>电视剧</span></a>
		<a href="../zongyi/"><span>综艺</span></a>
		<a href="../dongman/"><span>动漫</span></a>
	</div>
	<div class="search">
		<input type="text" placeholder="输入你想看的" id="search" value="<?php echo htmlspecialchars($_GET['keyword'])?>" />
		<a id="searchDo"></a>
	</div>
</div>

<div class="clear" style="height:0.5rem"></div>

<div class="keywords" id="keywordItem"><b>“<?php echo htmlspecialchars($_GET['keyword'])?>”</b> 的搜索结果：</div>

<div class="list">

	<?php if(!isset($data['list']) || count($data['list']) === 0){ ?>
	<div class="no-data" id="noDataBox" style="margin-top:1rem;background:none">没有找到相关影片，请尝试其他关键词！</div>

	<?php }else{ ?>
	<div class="items" id="listList">
		<?php foreach($data['list'] as $v){ ?>
		<a href="../../play/?vid=<?php echo urlencode($v['id'])?>">
			<i style="background-image:url(<?php echo $v['pic']?>)"><b><?php echo $v['hint']?></b></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>

	<div class="more">
		<a class="prev" href="./?keyword=<?php echo urlencode($_GET['keyword'])?>&page=<?php echo $_GET['page'] - 1?>"<?php echo $_GET['page'] <= 1 ? ' style="display:none"' : ''?>><img src="../../static_pp/images/more.png" />上一页</a>
		<a class="next" href="./?keyword=<?php echo urlencode($_GET['keyword'])?>&page=<?php echo $_GET['page'] + 1?>"<?php echo !$data['hasmore'] ? ' style="display:none"' : ''?>>下一页<img src="../../static_pp/images/more.png" /></a>
	</div>
	<?php } ?>
</div>

<div class="clear" style="height:2rem"></div>

<div class="copyright">
	<p>本站内容均来自于互联网资源实时采集</p>
	<p>本源码仅用做学习交流</p>
</div>

<a class="scroll-to-top" id="scrollToTop"></a>

<script src="../../static_pp/js/jquery.min.js"></script>
<script src="../../static_pp/js/common.js"></script>
</body>
</html>