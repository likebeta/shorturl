<?php
require('config.inc.php');
require('shorturl.class.php');
if (isset($_GET['action']) && $_GET['action'] == 'short'){
	if (isset($_GET['srcurl'])){
		$srcurl = urldecode($_GET['srcurl']);
		// todo:验证url
		$jump = isset($_GET['jump']) ? $_GET['jump'] : 0;
		if (isset($_GET['token'])){
			if (isset($_GET['alias'])){
				$strsql = "insert into urlinfo()";
			}
		}
		
		$token = isset($_GET['token']) ? $_GET['token'] : "";
		$urls = shorturl::get_shorturl($srcurl,$token);
		
	}
}
else if (isset($_GET['action']) && $_GET['action'] == 'extend'){
	if (isset($_GET['shorturl'])){
		$shorturl = urldecode($_GET['shorturl']);
		// todo:验证url
		$srcurl = shorturl::get_srcurl($shorturl);
		if (!$srcurl){
			$arr = array('result'=>0, 'shorturl'=>null);
			$json_return = json_encode($arr);
			echo $json_return;
		}
		else{
			$arr = array('result'=>1, 'shorturl'=>$shorturl);
			$json_return = json_encode($arr);
			echo $json_return;
		}
	}
else{
}
?>