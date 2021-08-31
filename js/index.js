function pageLoad(){

	var pageData = {};
	pageData.data = null;
	// 切换标记
	pageData.mark = {'dianshi': 0,'dianying': 0,'zongyi': 0,'dongman': 0};
	var template = {'dianshi': null,'dianying': null,'zongyi': null,'dongman': null,'banner': null};

	$(function(){

		// 初始化模板
		for(var i in template){
			if($('#' + i + 'List .template').length){
				template[i] = $('#' + i + 'List .template').html();
				$('#' + i + 'List .template').remove();
			}
		}

		// 记录浏览点
		$(window).scroll(function(){
			sessionStorage.setItem('indexPageCacheScrollTop',$(window).scrollTop());
		})
		// 数据载入或后退缓存数据载入
		if(performance.navigation.type == 2){
			var pageDataCache = JSON.parse(sessionStorage.getItem('indexPageCache'));
			if(pageDataCache){ pageData = pageDataCache;loadPageData(); }
			var pageDataCacheScrollTop = sessionStorage.getItem('indexPageCacheScrollTop');
			if(pageDataCacheScrollTop){ $('html,body').animate({scrollTop: pageDataCacheScrollTop},0,function(){ $(window).trigger('scroll'); }); }
		}else{
			loadData();
			$(window).trigger('scroll');
		}

		// 换一批
		$('.switch-button').tap(function(){ loadPageData($(this).attr('data-list-type')); })
	})


	function loadData(){

		$.getJS(jsUrl,{act: 'index'},function(rData){
			try{
				var rt = JSON.parse(rData);
				switch(parseInt(rt.rt)){
					case 0:

						pageData.data = rt.data;

						// 载入数据
						loadPageData();
					break;
					default:
						$.showError(rt);
				}
			}catch(e){
				$.showDataError();
			}
		})
	}


	var loadNum = 6,markMax = 3;	// 每次切换显示的数量和最大切换次数
	function loadPageData(listType){

		if(!pageData.data){ return false; }

		if(listType){	// 换一批

			if(template[listType]){
				++ pageData.mark[listType];
				if(pageData.mark[listType] > markMax){
					pageData.mark[listType] = 0;
				}
				var currentData = pageData.data[listType].slice(pageData.mark[listType] * loadNum,pageData.mark[listType] * loadNum + loadNum);
				$('#' + listType + 'List a').remove();
				for(var i in currentData){
					$(parseTemplate(template[listType],currentData[i])).insertBefore($('#' + listType + 'List .clear'));
				}
			}else{
				console.log('未知的列表模板');
			}
		}else{
			for(var i in pageData.data){
				if(template[i]){
					if(i == 'banner'){	// 轮播

						for(var j in pageData.data[i]){
							$(parseTemplate(template[i],pageData.data[i][j])).appendTo($('#' + i + 'List'));
						}

						// 初始化轮播
						$('.s-slider').mySlider({navAlign:'right'});
					}else{	// 列表

						var currentData = pageData.data[i].slice(pageData.mark[i] * loadNum,pageData.mark[i] * loadNum + loadNum);
						$('#' + i + 'List a').remove();
						for(var j in currentData){
							$(parseTemplate(template[i],currentData[j])).insertBefore($('#' + i + 'List .clear'));
						}
					}
				}
			}
		}

		$('#loadBox').hide();
		$('#dataBox').show();

		sessionStorage.setItem('indexPageCache',JSON.stringify(pageData));
	}

	pageLoaded = true;
}
if(typeof(pageLoaded) == 'undefined' && typeof(jsApi) != 'undefined'){ pageLoad(); }