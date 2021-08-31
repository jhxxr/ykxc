function pageLoad(){

	// 初始化导航
	$('#conditionBox .s-slide-menu').mySlideMenu();

	$('#headBg').css('background-image',($('#listList a:eq(0) i').css('background-image')));

	pageLoaded = true;
}
if(typeof(pageLoaded) == 'undefined' && typeof(jsApi) != 'undefined'){ pageLoad(); }