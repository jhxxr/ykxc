function pageLoad(){

	var pageData = {};
	pageData.page = 1;
	pageData.data = {
		list: {},
		hasmore: 1,
	};
	var template = {'list': null};

	$(function(){
		if($.URI.keyword){
			$('#search').val($.URI.keyword);
			$('#keywordItem').html($('#keywordItem').html().replace('{{keyword}}',$.URI.keyword));

			// 初始化模板
			for(var i in template){
				if($('#' + i + 'List .template').length){
					template[i] = $('#' + i + 'List .template').html();
					$('#' + i + 'List .template').remove();
				}
			}

			$('#loadMore').tap(loadData);
			
			// 记录浏览点
			$(window).scroll(function(){
				sessionStorage.setItem('searchPageCacheScrollTop',$(window).scrollTop());
			})
			// 数据载入或后退缓存数据载入
			if(performance.navigation.type == 2){
				var pageDataCache = JSON.parse(sessionStorage.getItem('searchPageCache'));
				if(pageDataCache){ pageData = pageDataCache;loadPageData(); }
				var pageDataCacheScrollTop = sessionStorage.getItem('searchPageCacheScrollTop');
				if(pageDataCacheScrollTop){ $('html,body').animate({scrollTop: pageDataCacheScrollTop},0,function(){ $(window).trigger('scroll'); }); }
			}else{
				$(window).trigger('scroll');
			}
		}else{
			location.href = '../index.html';
		}
	})

	var loading = false;
	function loadData(){

		if(loading || pageData.data.hasmore == 0){ return false; }else{ loading = true; }

		$('#loadMore,#noDataBox').hide();
		$('#loading').css('display','block');
		$.getJS(jsUrl,{act: 'search',word: $.URI.keyword,page: pageData.page},function(rData){
			try{
				var rt = JSON.parse(rData);
				switch(parseInt(rt.rt)){
					case 0:
						
						if(rt.data.list){
							for(var i in rt.data.list){
								pageData.data.list[rt.data.list[i].id] = rt.data.list[i];
							}
						}
						pageData.data.hasmore = rt.data.hasmore;

						++ pageData.page;

						loadPageData();

						$('#loadMore').show();
						$('#loading').hide();
					break;
					default:
						$.showError(rt);
				}
			}catch(e){
				$.showDataError();
			}
			loading = false;
		})
	}

	function loadPageData(){

		// 载入数据
		if(template.list){
			if(Object.keys(pageData.data.list).length){
				for(var i in pageData.data.list){
					if(!$('[data-id="' + pageData.data.list[i].id + '"]').length){
						$(parseTemplate(template.list,pageData.data.list[i])).insertBefore($('#listList .clear'));
					}
				}
			}else{
				$('#noDataBox').show();
			}
		}else{
			console.log('未知的列表模板');
		}

		if(pageData.data.hasmore == 1){ $('#loadMore').parent().show(); }else{ $('#loadMore').parent().hide(); }

		$('#loadBox').hide();
		$('#dataBox').show();

		sessionStorage.setItem('searchPageCache',JSON.stringify(pageData));
	}

	pageLoaded = true;
}
if(typeof(pageLoaded) == 'undefined' && typeof(jsApi) != 'undefined'){ pageLoad(); }