<?php
$f='dutang.txt';   //文件名
$a=file($f);  //把文件的所有内容获取到数组里面
$n=count($a); //获得总行数
$rnd=rand(0,$n);    //产生随机行号
$rnd_line=$a[$rnd]; //获得随机行
$tit = date('m 月 d 日')." - 小桃子工作室";
?>
<!DOCTYPE html>
<!-- saved from http://tantingfang.cn/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>随机一言-我在人间凑数的日子</title>
	<meta name="description" content="随机一言-我在人间凑数的日子">
	<meta name="keywords" content="随机一言，我在人间凑数的日子">
	<meta http-equiv="Cache-Control" content="no-siteapp">
	<meta name="author" content="loveu@tantingfang.cn" />
	<meta property="og:title" content="毒随机一言-我在人间凑数的日子" />
	<meta property="og:url" content="http://tantingfang.cn/" />
	<meta property="og:image" content="icon.png" />
	<meta property="og:site_name" content="随机一言-我在人间凑数的日子" />
	<meta property="og:description" content="随机一言-我在人间凑数的日子"/>
	<link rel="icon" href="/favicon.ico" type="image/x-icon" id="page_favionc">
	<link href="./img/min.css" rel="stylesheet">
	<link rel="alternate icon" type="image/png" href="icon.png">

</head>
<body>
<div class="top-wrap" style="position: absolute; top: 1vh;width: 100%;z-index: 999"> 
<div class="container">
	<div class="row" style="margin-top: 30px;">
	    <div class="col">
	    </div>
	    <div class="col">
	    	<div class="float-right" style="padding-top: 0px;">
	    		<a class="btn btn-primary btn-filled btn-xs" href="" >伤感语录</a>
	    	</div>
	    </div>
		</div>
</div>
</div>

<div class="main-wrapper" style="position: relative; top: -6vh;">
<div class="container main-sentence justify-content-center text-center">
		
        <div class="wrapper">				
		<span id="text" style="font-size: 2rem;"><?=$rnd_line;?></span>
        <textarea id="input">我才是幕后黑手,我在人间凑数的日子。</textarea>
        </div><br>
        <button class="btn btn-primary" onclick="copyText()">点我复制</button>
</div>
</div>

<div class="foot-1" style="position: absolute; bottom: 7vh;width: 100%;">
	<div class="container">
		<div class="row">
			<div class="col text-center">
	            <span class="btn btn-primary btn-filled btn-xs"><a class="btn btn-primary btn-filled btn-xs" href="javascript:location.reload()" >再来一句</a></span>
	    </div>
  		</div>
  		</div>
 <footer>
 <p class="text-center">© 2020 伤感语录All rights reserved</p>
</footer>
</div>

<style type="text/css">
  .wrapper {position: relative;}
  #input {position: absolute;top: 0;left: 0;opacity: 0;z-index: -10;}
</style>

<script type="text/javascript">
  function copyText() {
   var text = document.getElementById("text").innerText;
   var input = document.getElementById("input");
   input.value = text; // 修改文本框的内容
   input.select(); // 选中文本
   document.execCommand("copy"); // 执行浏览器复制命令
   alert("复制成功");
  }
 </script>

</body>
</html>