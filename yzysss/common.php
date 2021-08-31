<?php
header('Content-Type: text/html; charset=utf-8');
const WEBSITE = 'http://www.okzyw.com/';
const PLAYER = './player/?play=';
$set = array(
    'title' => '全网极速搜索',
    'keywords' => '看视频,最新电影',
    'desc' => '看视频是一个轻量搜索。。',
    'bg' => 'https://cn.bing.com/th?id=OHR.QingmingBridge_ZH-CN3844222543_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp',
    'autokeywords'=>'1',
);

function curl_get($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $content = curl_exec($ch);
    curl_close($ch);
    return ($content);
}

function curl_post($url = '', $param = '')
{
    if (empty($url) || empty($param)) {
        return false;
    }
    $postUrl = $url;
    $curlPost = $param;
    $ch = curl_init(); //初始化curl
    curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页
    curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
    $content = curl_exec($ch); //运行curl
    curl_close($ch);
    return $content;
}

function get_word(){
    $url = "https://node.video.qq.com/x/api/vdefault_word";
    if($word=json_decode(curl_get($url),true)['data'][0]['title']){
        return $word;
    }
    else return "迪迦奥特曼";
}
