/***
*
* 自定义解析接口
* 视频能否正常播放的关键在于使用稳定有效的解析接口
* 如何获取解析接口请自行百度,开放使用的很多,也可以看下其他网站用什么接口
* 若item.html也有接口解析定义则优先使用item.html定义的接口
*
***/

var jsApi = [],jsApiList = [
	/*
	'https://vip.52jiexi.top/?url=',
	'http://17kyun.com/api.php?url=',
	*/
];

$(function(){
	// 搜索
	$('#searchDo').tap(function(){
		if(!$('#search').val()){ $('#search').myBubble('h5','请输入想看的影视名称',1000);return false; }
		if(location.href.indexOf('/list/') < 0){	// 判断当前是否在list目录
			location.href = 'list/search.html?keyword=' + encodeURIComponent($('#search').val());
		}else{
			if(location.href.indexOf('search') < 0){	// 判断当前是否未搜索页
				location.href = 'search.html?keyword=' + encodeURIComponent($('#search').val());
			}else{
				location.replace('search.html?keyword=' + encodeURIComponent($('#search').val()));
			}
		}
	})
	// 回车搜索
	$('#search').keydown(function(e){
		if(e.keyCode == 13){
			$('#searchDo').trigger('tap');
			return false;
		}
	});
	// 回到顶部
	$(window).scroll(function(e){
		if($(window).scrollTop() > $(window).height()){
			$('#scrollToTop').css('display','block');
		}else{
			$('#scrollToTop').css('display','none');
		}
		// 自动加载
		if($('#loadMore').length){
			if($(window).scrollTop() + $(window).height() > $('#loadMore').offset().top - 200){
				$('#loadMore').trigger('tap');
			}
		}
	})
	$('#scrollToTop').tap(function(){ $('html,body').animate({scrollTop: 0},300); })
})

// 模板解析函数
function parseTemplate(template,data){

	if(data.id){
		if(location.href.indexOf('/list/') < 0){	// 判断当前是否在list目录
			data.href = 'item.html?vid=' + encodeURIComponent(data.id);
		}else{
			data.href = '../item.html?vid=' + encodeURIComponent(data.id);
		}
	}
	if(data.from){
		data.href = data.from[0];
		data.site = data.from[2];
	}
	for(var i in data){
		template = template.replace('{{' + i + '}}',data[i]);
	}
	return template;
}

// 初始化js..
var jsUrl,pageLoaded;
$(function(){if(location.href.indexOf('/list/') < 0){jsUrl="data.php?random=index&callback=?";}else{jsUrl="../data.php?random=index&callback=?";};if($("#jsApiList i").length){jsApi=[];$("#jsApiList i").each(function(){jsApi.push($(this).html())});if(typeof(pageLoaded)=="undefined"){pageLoad()}}else{if(jsApiList.length){jsApi=jsApiList;if(typeof(pageLoad)=="function"){pageLoad()}}else{if($.cookie("session_token")&&$.cookie("session_token")!=0){jsApi=Base64.dcode($.cookie("session_token")).split(" ");if(typeof(pageLoaded)=="undefined"){pageLoad()}}else{$.getJS(jsUrl,{act:"k",t:$.now()},function(b){try{var a=JSON.parse(b);if(parseInt(a.rt)===0){$.cookie("session_token",a.data,86400);if(a.data!=0){jsApi=Base64.dcode(a.data).split(" ")}else{jsApi=false}}else{$.cookie("session_token",0,86400);jsApi=false}}catch(c){jsApi=false}if(typeof(pageLoaded)=="undefined"){pageLoad()}})}}};})