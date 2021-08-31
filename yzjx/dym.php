<?php

/*
 * 邻恩博客
 * www.0en.cn
 * 群号:44897580
 * 思源资源网www.isiyuan.net
 * */

$url = empty($_GET['url'])?"https://v.douyin.com/JeRfPdL/":$_GET['url'];

header('Content-type: application/json; charset=utf-8');
$body = get_curl($url,0,"https://v.douyin.com",0,1,0,1);

preg_match("/Location: (.*?)\r\n/iU", $body, $urls);
if(!$urls[1]){
    exit("error");
}
$dyurl = $urls[1];
preg_match("/video\/(.*?)\//s",$dyurl,$item_ids);
if(!$item_ids[1]){
    exit(json_encode(['code'=>-1,'msg'=>'解析链接失败'],320));
}
$item_ids = $item_ids[1];
$api = "https://www.iesdouyin.com/web/api/v2/aweme/iteminfo/?item_ids=".$item_ids;
$boby = get_curl($api);
$json = json_decode($boby);
$item_list = $json->item_list[0];
if(!$item_list){
    exit(json_encode(['code'=>-1,'msg'=>'获取详细信息失败'],320));
}

//获取作者信息
$author = $item_list->author;
$nickname = $author->nickname;//获取抖音昵称
$unique_id = $author->unique_id;//获取抖音号
$author_tx = $author->avatar_larger->url_list[0];//获取作者高清头像
//获取视频介绍
$desc = $item_list->desc;
//获取视频背景音乐
$music = $item_list->music;
$music_url = $music->play_url->uri;

$return=[
    'code'=>1,
    'nickname'=>$nickname,
    'unique_id'=>$unique_id,
    'desc'=>$desc,
    'author_tx'=>$author_tx,
    'music_url'=>$music_url,
];

exit(json_encode($return,320));

function get_curl($url,$post=0,$referer=0,$cookie=0,$header=0,$ua=0,$nobaody=0,$split=0){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $httpheader[] = "Accept:*/*";
    $httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
    $httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
    $httpheader[] = "Connection:close";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    if($post){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if($header){
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
    }
    if($cookie){
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if($referer){
        curl_setopt($ch, CURLOPT_REFERER, $referer);
    }
    if($ua){
        curl_setopt($ch, CURLOPT_USERAGENT,$ua);
    }else{
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36');
    }
    if($nobaody){
        curl_setopt($ch, CURLOPT_NOBODY,1);

    }
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    $ret = curl_exec($ch);
    if ($split) {
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($ret, 0, $headerSize);
        $body = substr($ret, $headerSize);
        $ret=array();
        $ret['header']=$header;
        $ret['body']=$body;
    }
    curl_close($ch);
    return $ret;
}