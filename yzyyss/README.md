# 音乐搜索器

[![GitHub release](https://img.shields.io/github/release/maicong/music.svg?style=flat-square)](https://github.com/maicong/music/releases)
[![PHP version](https://img.shields.io/badge/php-%3E%205.4-orange.svg)](https://github.com/php-src/php)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](#LICENSE)

## 说明

麦葱特制多站合一音乐搜索解决方案，支持搜索试听以下网站音乐：

[网易云音乐](http://music.163.com) [QQ音乐](http://y.qq.com) [酷狗音乐](http://www.kugou.com) [酷我音乐](http://www.kuwo.cn) [虾米音乐](http://www.xiami.com) [百度音乐](http://music.baidu.com) [一听音乐](http://www.1ting.com) [咪咕音乐](http://music.migu.cn) [荔枝FM](http://www.lizhi.fm) [蜻蜓FM](http://www.qingting.fm) [喜马拉雅FM](http://www.ximalaya.com) [全民K歌](http://kg.qq.com) [5sing原创](http://5sing.kugou.com/yc) [5sing翻唱](http://5sing.kugou.com/fc)

数据调用的是各网站的 API 接口，有的接口并不是开放的，随时可能失效，本项目相关代码仅供参考。

## 演示

[http://music.2333.me/](http://music.2333.me/ "音乐搜索器")

如果获取有误或需要改进，欢迎提交 [Issues](https://github.com/maicong/music/issues)

## 下载

[📦 下载开发版](https://github.com/maicong/music/archive/master.zip) [📦 获取稳定版](https://github.com/maicong/music/releases)

## 解决方案

**1. 提示数据获取失败**

方案1：

```
修改 index.php 文件里的 MC_PROXY 为您的代理地址
将 core/music.php 里需要代理的 URL 'proxy' => false 改为 'proxy' => true
```

方案2：

```
在 core/music.php 里查找 setTimeout，将其后面的数值 20 改为更大。
在 static/js/music.js 里查找 `timeout`，将其数值 30000 改为更大。
```

方案3：

```
服务器要支持 curl。
更换服务器，选择延迟更低的服务器。
```

**2. 播放器显示 `Error happens ╥﹏╥`**

音乐链接为空

```
1. 音乐需要付费才能收听
2. 版权限制，外站无法获取
3. 服务器 IP 所在地不在源站允许的区域
4. 音乐下架了，链接被去除
```

音乐链接不为空

```
1. 当前 IP 所在地因版权限制而无法播放
2. 音乐格式浏览器无法正常解析
```

**3. 国内接口优化**

如果你的网站在国内，打开 [/index.php](index.php)，将 `define('MC_INTERNAL', 0);` 修改为 `define('MC_INTERNAL', 1);`，这样就可以取到咪咕和网易云音乐的 320k 音频了。

## 更新日志

请查看 [CHANGELOG.md](CHANGELOG.md)

## 免责声明

1. 本站音频文件来自各网站接口，本站不会修改任何音频文件
2. 音频版权来自各网站，本站只提供数据查询服务，不提供任何音频存储和贩卖服务

## 开源协议

The MIT License (MIT)

----------------------------------------------------

免责声明：

本站所发布的一切资源仅限用于学习和研究目的；不得将上述内容用于商业或者非法用途，否则，一切后果请用户自负。本站信息来自网络，版权争议与本站无关。您必须在下载后的24个小时之内，从您的电脑中彻底删除上述内容。如果您喜欢该程序，请支持正版软件，购买注册，得到更好的正版服务。

附: 二○○二年一月一日《计算机软件保护条例》第十七条规定：为了学习和研究软件内含的设计思想和原理，通过安装、显示、传输或者存储软件等方式使用软件的，可以不经软件著作权人许可，不向其支付报酬！鉴于此，也希望大家按此说明研究软件！

注：本站所有资源均来自网络转载，版权归原作者和公司所有，如果有侵犯到您的权益，请第一时间联系邮箱：tousu996@gmail.com 我们将配合处理！

----------------------------------------------------

版权声明：

一、本站致力于为软件爱好者提供国内外软件开发技术和软件共享，着力为用户提供优资资源。

二、本站提供的所有下载文件均为网络共享资源，请于下载后的24小时内删除。如需体验更多乐趣，还请支持正版。

三、我站提供用户下载的所有内容均转自互联网。如有内容侵犯您的版权或其他利益的，请编辑邮件并加以说明发送到站长邮箱。站长会进行审查之后，情况属实的会在三个工作日内为您删除。

----------------------------------------------------

网址总导航：www.xiaodao.biz（请添加到浏览器收藏夹）

小刀娱乐网：www.x6d.com（免费软件资源无偿分享）

找优惠券网：www.qsjsc.com（买买买之前进来查一查）

学习交流QQ群①：595526

学习交流QQ群②：1532276

学习交流QQ群③：1522533
