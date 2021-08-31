/**
* 接口配置文件
*
* ！！!视频能否正常播放和播放有无广告的关键在于使用稳定有效的解析接口
*
* 如何获取解析接口请自行百度,开放使用的很多,也可以看下其他影视网站使用什么接口
* 如希望播放时不呈现广告请自行寻找并使用无广告解析接口
*
* 接口不配置时会前往视频源站播放,如腾讯视频、爱奇艺等
**/

jsApiConfig([
    "http://max.vxac.cn/vipjx/?url=",
	"http://max.vxac.cn/svipjx/?url=",
	"http://max.vxac.cn/jiexi/?url=",
	"http://max.vxac.cn/sj/?url=",
	"https://wenhairu.com/static/api?url=",
	"https://jx.xiaolangyun.com/?url=",
]);