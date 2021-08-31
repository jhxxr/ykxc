<?php

/*****
 ** 历史缓存清理脚本(前端会自动触发运行)
 * 特别注意：如本脚本受服务器限制无法清理或无法完全清理缓存文件,则应定期手动清理删除cache文件夹下非当前日期文件夹
 *
*****/

header("Content-Type: application/javascript; charset=utf-8");

// 获取缓存标记
$cache_mark_file = dirname(__FILE__)."/../cache/cache.cache";
if(!is_file($cache_mark_file)){ file_put_contents($cache_mark_file,""); }
$cache_mark = file_get_contents($cache_mark_file);

// 缓存标记不同则执行清理
if($cache_mark != date("YmdH")){
	file_put_contents($cache_mark_file,date("YmdH"));

	// 不限制执行时间
	ignore_user_abort(true);
	set_time_limit(0);

	// 遍历cache目录删除历史缓存文件
	$clear_cache_dir = dirname(__FILE__)."/../cache";
	$clear_handle = opendir($clear_cache_dir);
	while(($clear_dir = readdir($clear_handle)) !== false){
		if($clear_dir != "." && $clear_dir != ".."){
			$this_clear_dir = $clear_cache_dir."/".$clear_dir;
			if($clear_dir != date("Ymd")){
				if(is_dir($this_clear_dir)){
					cache_clear($this_clear_dir);
				}
			}
		}
	}
	closedir($clear_handle);

	die("console.log('缓存清理成功')");
}else{
	die("console.log('缓存已清理')");
}


// 删除指定缓存文件夹及文件夹内所有文件
function cache_clear($cache_dir){

	$handle = opendir($cache_dir);
	while(($file = readdir($handle)) !== false){
		if($file != "." && $file != ".."){
			$this_file = $cache_dir."/" . $file;
			is_dir($this_file) ? cache_clear($this_file) : unlink($this_file);
		}
	}
	closedir($handle);
	rmdir($cache_dir);
}